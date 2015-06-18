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
        $per_page =20;

        $config['base_url'] = base_url().'stok_beras/';
        $config['total_rows'] = $this->sb_model->count_stok_beras();
        $config['per_page'] = $per_page;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';


        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['title'] = "Stok Beras List";
        $data['sb'] = $this->sb_model->get_stok_beras($per_page,$page);
        $data["links"] = $this->pagination->create_links();

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
            $data = [
                'bulan' =>$bulan,
                'tahun' => $tahun,
                'jml_stock' => $jml_stok
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