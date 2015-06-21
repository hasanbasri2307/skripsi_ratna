<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Protected_Controller {

	public function __construct() 
	{
		parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('sb_model');
        $this->load->model('seleksi_model');
	}

	public function data_warga()
    {
        $data['title'] = "Laporan Data Warga";
        echo blade()->render("laporan.data_warga.index",$data);
    }

    public function data_warga_all()
    {
        $data['title'] = "Hasil Laporan Data Warga";
        $data['warga'] = $this->transaksi_model->getWargaAll();
        echo blade()->render("laporan.data_warga.data_warga_all",$data);
    }

    public function data_warga_rw()
    {
        $rw = $this->input->post('rw');
        $data['title'] = "Hasil Laporan Data Warga Per RW";
        $data['rw'] =  $rw;
        $data['warga'] = $this->transaksi_model->getWargaPerRw($rw);
        echo blade()->render("laporan.data_warga.data_warga_rw",$data);
    }

    public function stok_beras()
    {
        $data['title'] = "Laporan Data Stok Beras";
        echo blade()->render("laporan.stok_beras.index",$data);
    }

    public function stok_beras_all()
    {
        $data['title'] = "Hasil Laporan Data Warga";
        $data['stok_beras'] = $this->sb_model->getAllStok();
        echo blade()->render("laporan.stok_beras.stok_beras_all",$data);
    }

    public function stok_beras_periode()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data['title'] = "Hasil Laporan Data Stok Beras Per Periode";
        $data['bulan'] =  $bulan;
        $data['tahun'] = $tahun;
        $data['stok_beras'] = $this->sb_model->getAllStokFilter($bulan,$tahun);
        echo blade()->render("laporan.stok_beras.stok_beras_periode",$data);
    }

    public function penerimaan_beras()
    {
        $data['title'] = "Laporan Data Penerimaan Beras";
        echo blade()->render("laporan.hasil_seleksi.index",$data);
    }

    public function penerimaan_beras_all()
    {
        $data['title'] = "Hasil Laporan Data Penerimaan Beras";
        $data['penerimaan_beras'] = $this->seleksi_model->get_seleksi_all2();
        echo blade()->render("laporan.hasil_seleksi.penerimaan_beras_all",$data);
    }

    public function penerimaan_beras_periode()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data['title'] = "Hasil Laporan Data Penerimaan Beras Per Periode";
        $data['bulan'] =  $bulan;
        $data['tahun'] = $tahun;
        $data['penerimaan_beras'] = $this->seleksi_model->getDetailSeleksiPeriode($bulan,$tahun);
        echo blade()->render("laporan.hasil_seleksi.penerimaan_beras_periode",$data);
    } 
}