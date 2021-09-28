<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
        
    function __construct()
    {
        parent::__construct();
		if($this->session->userdata('level')){
        }else{
          redirect('login');
        }	
    }

    public function index()
    {
        $data['title']		    = "Dashboard Aset";
        $data['jml_aset_tanah'] = $this->db->get('tb_aset_tanah')->num_rows();
        $data['jml_aset_dep']   = $this->db->get('tb_aset_depersiasi')->num_rows();
        $data['jml_document']   = $this->db->get('tb_file_aset')->num_rows();
        $this->template->load('template_back/template','dashboard',$data);
	}


}

