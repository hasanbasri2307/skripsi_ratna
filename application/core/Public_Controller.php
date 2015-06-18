<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();

        if($this->isLogin())
        {
            redirect("dashboard");
        }
	}

    private function isLogin()
    {
        $id_user = $this->session->userdata('id_user');
        if(!empty($id_user))
            return true;

        return false;
    }


}