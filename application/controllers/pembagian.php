<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembagian extends Protected_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('seleksi_model');
        $this->load->model('sb_model');
    }

    public function index()
    {
        $per_page =5;
        $url = site_url('pembagian/index');
        $total_rows = $this->seleksi_model->count_seleksi();
        $uri_segment=3;

        $c = generate_paging($per_page,$total_rows,$url,$uri_segment);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['title'] = "Pembagian List";
        $data['pembagian'] = $this->seleksi_model->get_seleksi($per_page,$page);
        $data["links"] = $c;

        echo blade()->render("transaksi.pembagian.pembagian",$data);
    }

    public function detail_pembagian($bulan,$tahun)
    {
        $per_page =5;
        $url = site_url('pembagian/detail_pembagian/'.$bulan.'/'.$tahun.'/');
        $total_rows = $this->seleksi_model->count_seleksi_detail($bulan,$tahun);
        $uri_segment=5;

        $c = generate_paging($per_page,$total_rows,$url,$uri_segment);

        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

        $data['title'] = "Pembagian List";
        $data['pembagian'] = $this->seleksi_model->getDetailSeleksi($bulan,$tahun,$per_page,$page);
        $data["links"] = $c;
        $data['bulan']=$bulan;
        $data['tahun']=$tahun;

        echo blade()->render("transaksi.pembagian.pembagian_detail",$data);
    }

    public function ambil($id,$bulan,$tahun)
    {
        $this->sb_model->update_stok($bulan,$tahun);
        $ambil = $this->seleksi_model->update_seleksi($id,array("status_pembagian"=>1,"tgl_pembagian"=>date('Y-m-d')));
        $this->session->set_flashdata("notif","Pengambilan Telah Diproses");
        redirect("pembagian");
    }

    public function batal($id,$bulan,$tahun)
    {

        $ambil = $this->seleksi_model->update_seleksi($id,array("status_pembagian"=>2,"tgl_pembagian"=>date('Y-m-d')));
        $this->session->set_flashdata("notif","Pengambilan Telah Dibatalkan");
        redirect("pembagian");
    }

}