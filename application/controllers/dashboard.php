<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Protected_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
    }

    public function index()
    {

        $data['title'] = "Dashboard";
        if(getLevel() == 'admin') {
        	echo blade()->render("dashboard.dashboard_admin",$data);
        }
        elseif (getLevel() == 'rw') {
            $data['warga'] = $this->transaksi_model->getWargaStatus(0);
        	echo blade()->render("dashboard.dashboard_rw",$data);
        }
        elseif (getLevel() == 'staff_kelurahan') {
            $data['warga_1'] = $this->transaksi_model->getWargaStatus(0);
            $data['warga_2'] = $this->transaksi_model->getWargaStatus(2);
        	echo blade()->render("dashboard.dashboard_kelurahan",$data);
        }
        
    }
}