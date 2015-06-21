<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends Protected_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kriteria_model');
    }

    public function index()
    {
        $per_page =5;
        $url = site_url('kriteria/index');
        $total_rows = $this->kriteria_model->count_kriteria();
        $uri_segment=3;

        $c = generate_paging($per_page,$total_rows,$url,$uri_segment);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['title'] = "Kriteria List";
        $data['kriteria'] = $this->kriteria_model->get_kriteria($per_page,$page);
        $data["links"] = $c;

        echo blade()->render("master.kriteria.kriteria",$data);
    }


    public function kriteria_add()
    {
        $data['title'] = "Kriteria Add";
        echo blade()->render("master.kriteria.kriteria_add",$data);
    }

    public function do_add()
    {
        $this->form_validation->set_rules('nama','Nama','trim|required');
        $this->form_validation->set_rules('score','Score','trim|required|numeric');

        $nama = $this->input->post('nama');
        $score = $this->input->post('score');
 
        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Kriteria Add";

            echo blade()->render('master.kriteria.kriteria_add',$data);
        }
        else
        {
            $data = [
                'nama' =>$nama,
                'score' => $score,
            
            ];

           
            $insert = $this->kriteria_model->insert_kriteria($data);

            if($insert)
            {
                $this->session->set_flashdata("notif","Sukses Tambah Kriteria");
                redirect("kriteria");
            }
            
        }
    }

    public function kriteria_edit($id)
    {
        $data['title'] = "Kriteria Edit";
        $kriteria = $this->kriteria_model->getkriteriaById($id);
        $data['kriteria'] = $kriteria;

        if(isset($_POST))
        {
            $this->form_validation->set_rules('nama','Nama','trim|required');
            $this->form_validation->set_rules('score','Score','trim|required|numeric');

            $nama = $this->input->post('nama');
            $score = $this->input->post('score');
 
            if($this->form_validation->run() == TRUE)
            {
                
                $data = [
                    'nama' =>$nama,
                    'score' => $score,
                
                ];

                $update = $this->kriteria_model->update_kriteria($id,$data);

                if($update)
                {
                    $this->session->set_flashdata("notif","Sukses Ubah Kriteria");
                    redirect("kriteria/view/".$id);
                }

            }
        }

        echo blade()->render('master.kriteria.kriteria_edit',$data);

    }

    public function kriteria_delete($id)
    {
        $delete = $this->kriteria_model->delete_kriteria($id);
        
        $this->session->set_flashdata("notif","Sukses Delete Kriteria");
        redirect('kriteria');
        
    }

    public function kriteria_view($id)
    {
        $data['title'] = "Kriteria View";
        $kriteria = $this->kriteria_model->getkriteriaById($id);
        $data['kriteria'] = $kriteria;
        echo blade()->render('master.kriteria.kriteria_view',$data);

    }

}