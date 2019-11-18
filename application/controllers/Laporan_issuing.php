<?php
class Laporan_issuing extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('My_model');
        $this->load->library('session');
      
    }

    function index(){
        // $data['status'] = $this->Pengaduan2_model->get_st()->s;

        $start = $this->input->get('s', TRUE);
        $end = $this->input->get('e', TRUE);

        if($start && $end != NULL){

        }else{
            $start = date('Y-m-d h:i:s');
            $end = date('Y-m-d h:i:s');
        }

        $this->template->load('template', 'laporan/laporan_issuing');
    }

    function ajax($s, $e){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
               
        $this->db->join('tb_issuing_item i','tb_barang.id_barang = i.id_barang');
         $this->db->join('tb_issuing i2','i.id_issuing = i2.id_issuing');
        $this->db->where('tgl >=', $s);
		$this->db->where('tgl <=', $e);
        // $this->db->order_by('id','desc');
        $get =	$this->db->get('tb_barang');

        $data = array();
        $no = 1;

        foreach($get->result() as $row){
            $data[] = [
                $no++,
                $row->tgl,
                $row->no_ref,
                $row->nama_barang,
                $row->remarks,
                $row->jumlah,
                $row->picker
            ];
        }

        $output = [
            "draw"              => $draw,
            "recordsTotal"      => $get->num_rows(),
            "recordsFiltered"   => $get->num_rows(),
            "data"              => $data
		];
		
		echo json_encode($output);
        exit();
    }

}