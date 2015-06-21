<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_beras extends Protected_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sb_model');
    }

    public function index()
    {
        $per_page =5;
        $url = site_url('stok_beras/index');
        $total_rows = $this->sb_model->count_stok_beras();
        $uri_segment=3;

        $c = generate_paging($per_page,$total_rows,$url,$uri_segment);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['title'] = "Stok Beras List";
        $data['sb'] = $this->sb_model->get_stok_beras($per_page,$page);
        $data["links"] = $c;

        echo blade()->render("master.stok_beras.sb",$data);
    }


    public function stok_beras_add()
    {
        $data['title'] = "Stok Beras Add";
        echo blade()->render("master.stok_beras.sb_add",$data);
    }

    public function do_add()
    {
        $this->form_validation->set_rules('bulan','Bulan','trim|required');
        $this->form_validation->set_rules('tahun','Tahun','trim|required');
        $this->form_validation->set_rules('jml_stok','Jumlah Stok','trim|required');

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $jml_stok = $this->input->post('jml_stok');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Stok Beras Add";

            echo blade()->render('master.stok_beras.sb_add',$data);
        }
        else
        {
            $tambahan_stock=0;
            $cek_stok_sebelumnya = $this->sb_model->cek_stok_sebelumnya($bulan,$tahun);
            if($cek_stok_sebelumnya->total >0 )
            {
                $tambahan_stock = $cek_stok_sebelumnya->total;
            }

            $data = [
                'bulan' =>$bulan,
                'tahun' => $tahun,
                'jml_stock' => $jml_stok + $tambahan_stock,
                'tambahan_stock' =>$tambahan_stock
            ];

            $check = $this->sb_model->cek_stok($bulan,$tahun);

            if($check > 0)
            {
                $this->session->set_flashdata("notif_error","Stok Beras Sudah Ada");
                redirect("stok_beras");
            }
            else 
            {
                $insert = $this->sb_model->insert_stok_beras($data);

                if($insert)
                {
                    
                    $this->session->set_flashdata("notif","Sukses Tambah Stok Beras");
                    redirect("stok_beras");
                }
            }

        }
    }

    public function stok_beras_edit($id)
    {
        $data['title'] = "Stok Beras Edit";
        $stok_beras = $this->sb_model->getstok_berasById($id);
        $data['stok_beras'] = $stok_beras;

        if(isset($_POST))
        {
            $this->form_validation->set_rules('bulan','Bulan','trim|required');
            $this->form_validation->set_rules('tahun','Tahun','trim|required');
            $this->form_validation->set_rules('jml_stok','Jumlah Stok','trim|required');

            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $jml_stok = $this->input->post('jml_stok');

            if($this->form_validation->run() == TRUE)
            {
                
                $data = [
                    'bulan' =>$bulan,
                    'tahun' => $tahun,
                    'jml_stock' => $jml_stok
                ];

                $update = $this->sb_model->update_stok_beras($id,$data);

                if($update)
                {
                    $this->session->set_flashdata("notif","Sukses Ubah Stok Beras");
                    redirect("stok_beras/view/".$id);
                }

            }
        }

        echo blade()->render('master.stok_beras.sb_edit',$data);

    }

    public function stok_beras_delete($id)
    {
        $delete = $this->sb_model->delete_stok_beras($id);
        
        $this->session->set_flashdata("notif","Sukses Delete Stok Beras");
        redirect('stok_beras');
        
    }

    public function stok_beras_view($id)
    {
        $data['title'] = "Stok Beras View";
        $stok_beras = $this->sb_model->getstok_berasById($id);
        $data['stok_beras'] = $stok_beras;
        echo blade()->render('master.stok_beras.sb_view',$data);

    }

}