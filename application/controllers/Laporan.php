<?php
class Laporan extends CI_Controller{

    function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('My_model');
            $this->load->library('session');
        }
    

    function index(){
        $start = $this->input->get('s', TRUE);
        $end = $this->input->get('e', TRUE);

        if($start && $end != NULL){

        }else{
            $start = date('Y-m-d h:i:s');
            $end = date('Y-m-d h:i:s');
        }

        $this->output->enable_profiler(true);
        $this->template->load('template', 'laporan/laporan');
    }

    function ajax($s, $e){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
               
        $this->db->join('tb_receiving_item r','tb_barang.id_barang = r.id_barang');
        $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
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
                $row->supplier
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

     function data(){
         $this->db->select('*');
         $this->db->from('tb_barang b');
         $this->db->join('tb_issuing_item i','b.id_barang = i.id_barang');
         $this->db->join('tb_issuing i2','i.id_issuing = i2.id_issuing');
         $data = $this->db->get()->result();
         echo "<pre>"; print_r($data); echo "</pre>";
         $this->output->enable_profiler(true);
     }

     function data2($s,$e){
        // $this->db->select('*');
        // $this->db->from('tb_barang b');
        // $this->db->join('tb_receiving_item r','b.id_barang = r.id_barang');
        // $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
        $this->db->select('*');
        $this->db->from('tb_barang b');
        $this->db->join('tb_receiving_item r','b.id_barang = r.id_barang');
        $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
        $this->db->where('tgl >=',date('Y-m-d h:i:s', $s->getTimestamp()));
		$this->db->where('tgl <=',date('Y-m-d h:i:s', $e->getTimestamp()));
        $data = $this->db->get()->result();
        echo "<pre>"; print_r($data); echo "</pre>";
        $this->output->enable_profiler(true);
    }
}