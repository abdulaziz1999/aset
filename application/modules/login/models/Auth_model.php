<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Auth_model extends CI_Model{

    function pasUser($u){
      @$data = $this->db->get_where('tb_user',['email' => $u])->row()->password;
      if($data){
        return $data;
      }else{
        $this->session->set_flashdata('error', "gagal");
        redirect(base_url('login'));
      }
    }

    function userResult($u){
      $data = $this->db->get_where('tb_user',['email' => $u])->result();
      return $data;
    }

    function nama_user($u){
      $data = $this->db->get_where('tb_user',['email' => $u])->row()->nama;
      return $data;
    }

}
