<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Seleksi extends Protected_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('seleksi_model');
        $this->load->model('transaksi_model');
        $this->load->model('sb_model');
    }

    public function seleksi_add()
    {
        $data['title'] = "seleksi Add";
        echo blade()->render("transaksi.seleksi.seleksi_add",$data);
    }

    public function do_add()
    {
        $this->form_validation->set_rules('bulan','Nama','trim|required');
        $this->form_validation->set_rules('tahun','Tahun','trim|required|numeric');

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
 
        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "seleksi Add";

            echo blade()->render('transaksi.seleksi.seleksi_add',$data);
        }
        else
        {
            $cek = $this->seleksi_model->cekseleksi($bulan,$tahun);
            if($cek == 0)
            {
                $bln = date("m");
                $year = date("Y");

                if($bulan < $bln || $tahun < $year) 
                {
                    $this->session->set_flashdata("notif_error","Waktu Seleksi Tidak Tepat");
                    redirect("seleksi");
                }
                else
                {
                    $cek_total_warga = $this->transaksi_model->count_transaksi();
                    $cek_total_stok = $this->sb_model->hitungstok($bulan,$tahun);

                    if($cek_total_stok->total_stok ==0)
                    {

                         $this->session->set_flashdata("notif_error","Stok Beras Kosong");
                         redirect("seleksi");
                    }
                    else
                    {
                        $warga = $this->transaksi_model->ambilwarga();
                        $terpakai = 0;
                        foreach ($warga as $key => $value) {

                            if($terpakai < $cek_total_stok->total_stok)
                            {
                                if($value->total_kriteria >= 9)
                                {
                                    $dt[] = [
                                        'id_warga' => $value->id_warga,
                                        'jml_beras_warga' => 1,
                                        'bulan' => $bulan,
                                        'tahun' =>$tahun,
                                        'status_pembagian' => 0,
                                        'id_user' => $this->session->userdata('id_user')

                                    ];

                                    $terpakai++;
                                }
                            }
                          
                        }

                        $this->seleksi_model->insert_batch($dt);
                        $this->session->set_flashdata("notif","Penyeleksian Selesai");
                        redirect("seleksi");
                    }
                }
                
            }

            else {
                $this->session->set_flashdata("notif_error","Data Seleksi Sudah Ada");
                redirect("seleksi");
            }
            
            
        }
    }

}