<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends Protected_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('kriteria_model');
    }

    public function index()
    {
        $per_page =5;
        $url = site_url('transaksi/index');

        if(getLevel() == 'rw')
        {
        	$total_rows = $this->transaksi_model->count_transaksi($this->session->userdata('id_user'));
        }
        else
        {
        	$total_rows = $this->transaksi_model->count_transaksi();
        }
       
        $uri_segment=3;

        $c = generate_paging($per_page,$total_rows,$url,$uri_segment);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['title'] = "Penerimaan Beras List";

        if(getLevel() == "rw")
        {
        	$data['transaksi'] = $this->transaksi_model->get_transaksi($per_page,$page,$this->session->userdata('id_user'));
        }
        else
        {
        	$data['transaksi'] = $this->transaksi_model->get_transaksi($per_page,$page);
        }
        
        $data["links"] = $c;

        echo blade()->render("transaksi.penerimaan.transaksi",$data);
    }


    public function transaksi_add()
    {
    	$data['kriteria'] = $this->kriteria_model->get_kriteria_all();
        $data['title'] = "Penerimaan Beras Add";
        echo blade()->render("transaksi.penerimaan.transaksi_add",$data);
    }

    public function do_add()
    {
        $this->form_validation->set_rules('no_kk','No KK','trim|required|max_length[20]');
        $this->form_validation->set_rules('nama_kk','Nama KK','trim|required|max_length[30]');
        $this->form_validation->set_rules('nik_kk','NIK KK','trim|required|max_length[20]');
        $this->form_validation->set_rules('alamat_kk','Alamat','trim|required');
        $this->form_validation->set_rules('kriteria[]','Kriteria','trim|required');
        $this->form_validation->set_rules('rw','RW','trim|required|max_length[3]');

        if(getLevel() != "rw") {
        	$this->form_validation->set_rules('status','Status','trim|required');
        	$this->form_validation->set_rules('keterangan','Keterangan','trim|required');
        	$status= $this->input->post('status');
        	$keterangan = $this->input->post('keterangan');
        }

        $no_kk = $this->input->post('no_kk');
        $nama_kk = $this->input->post('nama_kk');
        $nik_kk = $this->input->post('nik_kk');
        $alamat_kk = $this->input->post('alamat_kk');
        $kriteria = $this->input->post('kriteria');
        $rw = $this->input->post('rw');
 
        if ($this->form_validation->run() == FALSE)
        {
        	$data['kriteria'] = $this->kriteria_model->get_kriteria_all();
            $data['title'] = "Penerimaan Beras Add";

            echo blade()->render('transaksi.penerimaan.transaksi_add',$data);
        }
        else
        {
        	$cek1 = $this->transaksi_model->cek_no_kk($no_kk);
            $cek2 = $this->transaksi_model->cek_no_ktp($nik_kk);

                
        	if($cek1 >0 || $cek2 > 0)
            {
            	$this->session->set_flashdata('notif_error','NIK KK atau No KK sudah terdaftar');
            	redirect('transaksi');
            }
            else
            {
            	$data = [
                'no_kk' =>$no_kk,
                'nama_kk' => $nama_kk,
                'alamat' => $alamat_kk,
                'nik_kk' => $nik_kk,
                'no_kk' => $no_kk,
                'rw' =>$rw,
                'id_user'=>$this->session->userdata('id_user'),
                'status' => 2
	            ];

	            if(getLevel() != "rw") {
	            	$data['status'] = $status;
	            	$data['keterangan'] = $keterangan;
	            }
	           
	            $insert = $this->transaksi_model->insert_transaksi($data);

	        	foreach($kriteria as $c) 
	        	{
	        		$d = explode("_", $c);
	        		$dt[] = [
	        			'id_warga' => $insert,
	        			'kriteria' => $d[1],
	        			'value' => $d[0]
	        		];
	        	}

	            $insert_detail = $this->transaksi_model->insert_detail_warga($dt);

	           
	            $this->session->set_flashdata("notif","Sukses Tambah Data Penerima Beras");
	            redirect("transaksi");
            }
            
        }
    }

    public function transaksi_edit($id)
    {
        $data['title'] = "Penerimaan Beras Edit";
        $transaksi = $this->transaksi_model->gettransaksiById($id);
        $data['transaksi'] = $transaksi;
        $data['kriteria'] = $this->kriteria_model->get_kriteria_all();

        if(isset($_POST))
        {
            $this->form_validation->set_rules('no_kk','No KK','trim|required|max_length[20]');
	        $this->form_validation->set_rules('nama_kk','Nama KK','trim|required|max_length[30]');
	        $this->form_validation->set_rules('nik_kk','NIK KK','trim|required|max_length[20]');
	        $this->form_validation->set_rules('alamat_kk','Alamat','trim|required');
	        $this->form_validation->set_rules('kriteria[]','Kriteria','trim|required');
            $this->form_validation->set_rules('rw','RW','trim|required|max_length[3]');

	        if(getLevel() != "rw") {
	        	$this->form_validation->set_rules('status','Status','trim|required');
	        	$this->form_validation->set_rules('keterangan','Keterangan','trim|required');
	        	$status= $this->input->post('status');
	        	$keterangan = $this->input->post('keterangan');
	        }

	        $no_kk = $this->input->post('no_kk');
	        $nama_kk = $this->input->post('nama_kk');
	        $nik_kk = $this->input->post('nik_kk');
	        $alamat_kk = $this->input->post('alamat_kk');
	        $kriteria = $this->input->post('kriteria');
            $rw = $this->input->post('rw');

            if($this->form_validation->run() == TRUE)
            {
            	
                $data = [
	                'no_kk' =>$no_kk,
	                'nama_kk' => $nama_kk,
	                'alamat' => $alamat_kk,
	                'nik_kk' => $nik_kk,
	                'no_kk' => $no_kk,
                    'rw' => $rw,
	                'id_user'=>$this->session->userdata('id_user')
            	];

            	
	            if(getLevel() != "rw") {
	            	$data['status'] = $status;
	            	$data['keterangan'] = $keterangan;
	            }

                $update = $this->transaksi_model->update_transaksi($id,$data);

               	$this->transaksi_model->deletedetailwargamiskin($id);

	        	foreach($kriteria as $c) 
	        	{
	        		$d = explode("_", $c);
	        		$dt[] = [
	        			'id_warga' => $id,
	        			'kriteria' => $d[1],
	        			'value' => $d[0]
	        		];
	        	}

	        	$insert_detail = $this->transaksi_model->insert_detail_warga($dt);

                $this->session->set_flashdata("notif","Sukses Ubah Data Penerima Beras");
                redirect("transaksi/view/".$id);
                

            }
        }

        echo blade()->render('transaksi.penerimaan.transaksi_edit',$data);

    }

    public function transaksi_delete($id)
    {
        $delete = $this->transaksi_model->delete_transaksi($id);
        $this->transaksi_model->deletedetailwargamiskin($id);
        $this->session->set_flashdata("notif","Sukses Delete Data Penerima Beras");
        redirect('transaksi');
        
    }

    public function transaksi_view($id)
    {
        $data['title'] = "Penerimaan Beras View";
        $transaksi = $this->transaksi_model->gettransaksiById($id);
        $data['transaksi'] = $transaksi;
        $data['detail'] = $this->transaksi_model->getDetailWarga($id);
        echo blade()->render('transaksi.penerimaan.transaksi_view',$data);

    }

}