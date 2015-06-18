<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Protected_Controller {


    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data['title'] = "Dashboard";
        echo blade()->render("dashboard.dashboard",$data);
    }
}