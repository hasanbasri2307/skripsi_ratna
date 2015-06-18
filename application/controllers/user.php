<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Protected_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $per_page =20;

        $config['base_url'] = base_url().'user/';
        $config['total_rows'] = $this->user_model->count_users();
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

        $data['title'] = "User List";
        $data['users'] = $this->user_model->get_user($per_page,$page);
        $data["links"] = $this->pagination->create_links();

        echo blade()->render("master.user.users",$data);
    }

    public function do_logout()
    {
        $this->session->unset_userdata("id_user");
        $this->session->unset_userdata("username");
        redirect("login");
    }

    public function user_add()
    {
        $data['title'] = "User Add";
        echo blade()->render("master.user.users_add",$data);
    }

    public function do_add()
    {
        $this->form_validation->set_rules('username','Username','trim|required|max_length[20]|is_unique[user.username]');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('status','Status','required');
        $this->form_validation->set_rules('level','Level','required');


        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $status = $this->input->post('status');
        $level = $this->input->post('level');

        if($this->form_validation->run() == FALSE)
        {
            $data['title'] = "User Add";

            echo blade()->render('master.user.users_add',$data);
        }
        else
        {
            $data = [
                'username' =>$username,
                'password' => $password,
                'status' => $status,
                'level' => $level
            ];

            $insert = $this->user_model->insert_user($data);

            if($insert)
            {
                $this->session->set_flashdata("notif","Sukses Tambah User");
                redirect("user");
            }

        }
    }

    public function user_edit($id)
    {
        $data['title'] = "User Edit";
        $user = $this->user_model->getUserById($id);
        $data['user'] = $user;

        if(isset($_POST))
        {
            $this->form_validation->set_rules('status','Status','required');
            $this->form_validation->set_rules('level','Level','required');
            $status = $this->input->post('status');
            $level = $this->input->post('level');

            if($this->form_validation->run() == TRUE)
            {
                
                $data = [
                    'status' => $status,
                    'level' => $level
                ];

                $update = $this->user_model->update_user($id,$data);

                if($update)
                {
                    $this->session->set_flashdata("notif","Sukses Ubah User");
                    redirect("user/view/".$id);
                }

            }
        }

        echo blade()->render('master.user.users_edit',$data);

    }

    public function user_delete($id)
    {
        $delete = $this->user_model->delete_user($id);
        
        $this->session->set_flashdata("notif","Sukses Delete User");
        redirect('user');
        
    }

    public function user_view($id)
    {
        $data['title'] = "User View";
        $user = $this->user_model->getUserById($id);
        $data['user'] = $user;
        echo blade()->render('master.user.users_view',$data);

    }

}