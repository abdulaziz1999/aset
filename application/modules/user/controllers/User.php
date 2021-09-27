<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
	
        
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != "admin" || 
        $this->session->userdata('level') != "keuangan" || 
        $this->session->userdata('level') != "staff"){
        }else{
            redirect('login');
        }
		
    }

    public function index()
    {
        $data['title']		= "User";
        $data['user']     = $this->db->get('tb_user')->result();
        $this->template->load('template_back/template','user',$data);
    }

    function dataEdit(){
        $data['id']   = $this->input->post('id');
        $data['user'] = $this->db->get_where('tb_user',['id_user' => $data['id']])->row();
        $this->load->view('formEditUser',$data);
    }

    function create(){
          $x = [
            'cost' => 10
        ];
        $data = [
            'nama'          => $this->input->post('nama'),
            'email'         => $this->input->post('email'),
            'level'         => $this->input->post('level'),
            'status'        => $this->input->post('status'),
            'password'      => password_hash($this->input->post('password'),PASSWORD_DEFAULT,$x),
        ];

        $this->db->insert('tb_user',$data);
        $this->session->set_flashdata('sukses','sukses');
        redirect($_SERVER['HTTP_REFERER']);
    }

    function update($id){
        $data = [
            'nama'          => $this->input->post('nama'),
            'email'         => $this->input->post('email'),
            'level'         => $this->input->post('level'),
            'status'        => $this->input->post('status'),
        ];

        $this->db->update('tb_user',$data,['id_user' => $id]);
        $this->session->set_flashdata('update','update');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function setPswd($id){
      $x = [
        'cost' => 9
      ];
      $data = [
        'password'      => password_hash($this->input->post('password'),PASSWORD_DEFAULT,$x)
      ];
      $this->db->update('tb_user',$data,['id_user' => $id]);
      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('sukses', "Password Berhasil Diupdate");
        redirect($_SERVER['HTTP_REFERER']);
      }else{
        $this->session->set_flashdata('error', "Password Gagal Diupdate");
        redirect($_SERVER['HTTP_REFERER']);
      }
    }

    function delete($id){
        $this->db->delete('tb_user',['id_user' => $id]);
        $this->session->set_flashdata('hapus','hapus');
        redirect($_SERVER['HTTP_REFERER']);
    }


}
