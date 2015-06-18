<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Protected_Controller extends MY_Controller {

	public function __construct() 
	{
		parent::__construct();

        if(!$this->isLogin()) {
            redirect("login");
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