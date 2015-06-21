<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Public_Controller {

	public function __construct() 
	{
		parent::__construct();
        $this->load->model('user_model');
	}

	public function login()
	{
        $data['error'] ="";
		$data['title'] = "Login Page";
		echo blade()->render('auth.login',$data);
	}

    public function do_login()
    {
        $this->form_validation->set_rules('username','Username','trim|required|max_length[20]');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_error_delimiters("","");
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Login Page";

            echo blade()->render('auth.login',$data);
        }
        else
        {
            $check = $this->user_model->getUserByCredential($username,$password);
            if(!$check)
            {
                $error = "Username / Password Salah";
                $data['title'] = "Login Page";
                $data['error'] = $error;

                echo blade()->render('auth.login',$data);
            }
            else
            {
                $this->session->set_userdata("id_user",$check['id_user']);
                $this->session->set_userdata("username",$check['username']);
                $this->session->set_userdata("level",$check['level']);
                redirect("dashboard");
            }

        }

    }

}