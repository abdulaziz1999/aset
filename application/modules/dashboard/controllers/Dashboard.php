<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
        
    function __construct()
    {
        parent::__construct();
		if($this->session->userdata('level') != "admin"){
            redirect('login');
        }
    }

    public function index()
    {
        $data['title']		= "Dashboard Aset";
        $this->template->load('template_back/template','dashboard',$data);
	}


}

