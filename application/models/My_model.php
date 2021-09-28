<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class My_model extends CI_Model{

    function cek_login($u,$p){
        $pwd = md5($p);
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('username',$u);
        $this->db->where('password',$pwd);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows()==1) {
        	return $query->result();
        }else{
        	return false;
        }
        
    }

    function menu($level){
                $this->db->join('tb_group_akses ga','ga.menu_id = tb_menu.id_menu');
        $data = $this->db->get_where('tb_menu',['level' => $level]);
        return $data;
    }

    function menuChild($level,$idmenu){
        $this->db->join('tb_group_akses ga','ga.menu_id = tb_menu.id_menu');
        $data = $this->db->get_where('tb_menu',['level' => $level, 'type' => 'child', 'child' => $idmenu]);
        return $data;
    }

    function pembulatan($uang){
        $ratusan = substr($uang, -3);
        if($ratusan<500){
            $akhir = $uang - $ratusan;
        }else{
            $akhir = $uang + (1000-$ratusan);
            echo number_format($akhir, 2, ',', '.');;
        }
    }

}
