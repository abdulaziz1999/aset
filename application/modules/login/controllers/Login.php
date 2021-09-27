<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
	
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');		
    }

    function cek_login(){
        $u 		= $this->input->post('email');
        $p 		= $this->input->post('password');
        $nama   = $this->Auth_model->nama_user($u);
        $dbpas 	= $this->Auth_model->pasUser($u);
        $cek 	= password_verify($p,$dbpas); 
        if ($cek){
                $cek1 = $this->Auth_model->userResult($u);
                foreach ($cek1 as $row) {
                    $this->session->set_userdata('id_user',$row->id_user);
                    $this->session->set_userdata('nama',$row->nama);
                    $this->session->set_userdata('email',$row->email);
                    $this->session->set_userdata('level',$row->level);
                }
          	if($this->session->userdata('level') == 'admin'){
				$this->session->set_flashdata('sukses', "Selamat Datang $nama !!!");
                redirect('dashboard');
            }elseif($this->session->userdata('level') == 'staff'){
				$this->session->set_flashdata('sukses', "Selamat Datang $nama !!!");
                redirect('dashboard');
            }else{
                $this->session->set_flashdata('error', "gagal");
                redirect(base_url('login'));
            }

        } else{
            $this->session->set_flashdata('error', "gagal");
			redirect($_SERVER['HTTP_REFERER']);
        } 
	}

    public function index()
    {
		$data['title']		= "Login SISTA";
        $this->template->load('template_front/template_login','login',$data);
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }


}

