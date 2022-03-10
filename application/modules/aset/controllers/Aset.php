<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aset extends CI_Controller
{
	
        
    function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        if($this->session->userdata('level')){
        }else{
          redirect('login');
        }		
    }

    public function index()
    {
        $data['title'] = "Asset";   
        $data['aset'] = $this->db->get('tb_aset_tanah')->result();
        $this->template->load('template_back/template','v_aset',$data);
    }

    function dataEdit(){
        $data['id'] = $this->input->post('id');
        $data['aset'] = $this->db->get_where('tb_aset_tanah',['id_asett' => $data['id']])->row();
        $data['batas'] = $this->db->get_where('tb_batas_tanah',['id_aset' => $data['id']])->row();
        $this->load->view('formEditAset',$data);
    }
    
    function dataUpload(){
        $data['id'] = $this->input->post('id');
        $this->load->view('formUpload',$data);
    }

    function uploadFile($id){
          $config['upload_path'] 		= './assets/img/file/'; 
          $config['allowed_types'] 		= 'gif|jpg|png|jpeg|bmp|pdf'; 
          $config['encrypt_name'] 		= false;
        
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            // $this->session->set_flashdata('error', "File file Gagal Diupdate");
            $data = array(
                'aset_tanah_id' => $id,
                'jenis_file'    => $this->input->post('jenis_file'),
                'link_drive'    => $this->input->post('link'),
              );
              $this->db->insert('tb_file_aset',$data);
            redirect($_SERVER['HTTP_REFERER']);
          }else{
            $gbr = $this->upload->data();
            $data = array(
              'nama_file'     => $gbr['file_name'],
              'aset_tanah_id' => $id,
              'jenis_file'    => $this->input->post('jenis_file'),
              'link_drive'    => $this->input->post('link'),
            );
            $this->db->insert('tb_file_aset',$data);

                if($this->db->affected_rows() > 0){
                  $this->session->set_flashdata('sukses', "File file Berhasil Diupdate");
                  redirect($_SERVER['HTTP_REFERER']);
                }else{
                  $this->session->set_flashdata('error', "File file Gagal Diupdate");
                  redirect($_SERVER['HTTP_REFERER']);
                }
          }
    }
    
    function create(){      
      $data = [
          'nm_pemilik'      => $this->input->post('nm_pemilik'),
          'pemilik_before'  => $this->input->post('pemilik_before'),
          'js_document'     => $this->input->post('js_document'),
          'jd'              => $this->input->post('jd'),
          'validasi_denah'  => $this->input->post('validasi_denah') ? $this->input->post('validasi_denah') : 0,
          'validasi_dokumen'=> $this->input->post('validasi_dokumen') ? $this->input->post('validasi_dokumen') : 0,
          'no_surat'        => $this->input->post('no_surat'),
          'luas_tanah'      => $this->input->post('luas_tanah'),
          'thn_pembelian'   => $this->input->post('thn_pembelian'),
          'harga_pembelian' => $this->input->post('harga_pembelian'),
          'lokasi'          => $this->input->post('lokasi'),
          'nib'             => $this->input->post('nib'),
          'no_persil'       => $this->input->post('no_persil'),
          'no_kohir'        => $this->input->post('no_kohir'),
          'notaris_ppat'    => $this->input->post('notaris_ppat'),
          'no_sppt'         => $this->input->post('no_sppt'),
          'status_pembelian'=> $this->input->post('status_pembelian'),
        ];
        $this->db->insert('tb_aset_tanah',$data);
        $idlast = $this->db->insert_id();

        $batasTanah = [
          'bu'      => $this->input->post('bu'),
          'bt'      => $this->input->post('bt'),
          'bb'      => $this->input->post('bb'),
          'bs'      => $this->input->post('bs'),
          'id_aset' => $idlast
        ];
        $this->db->insert('tb_batas_tanah',$batasTanah);
        $idbts = $this->db->insert_id();

        $idbstanah = [
          'batas_tanah' => $idbts
        ];
        $this->db->update('tb_aset_tanah',$idbstanah,['id_asett' => $idlast]);

        redirect($_SERVER['HTTP_REFERER']);
    }

    function update($id){
        $data = [
          'nm_pemilik'      => $this->input->post('nm_pemilik'),
          'pemilik_before'  => $this->input->post('pemilik_before'),
          'js_document'     => $this->input->post('js_document'),
          'no_surat'        => $this->input->post('no_surat'),
          'luas_tanah'      => $this->input->post('luas_tanah'),
          'thn_pembelian'   => $this->input->post('thn_pembelian'),
          'harga_pembelian' => $this->input->post('harga_pembelian'),
          'lokasi'          => $this->input->post('lokasi'),
          'nib'             => $this->input->post('nib'),
          'no_persil'       => $this->input->post('no_persil'),
          'no_kohir'        => $this->input->post('no_kohir'),
          'notaris_ppat'    => $this->input->post('notaris_ppat'),
          'no_sppt'         => $this->input->post('no_sppt'),
          'u_kwitansi'      => $this->input->post('u_kwitansi'),
          'u_shm'           => $this->input->post('u_shm'),
          'up_sppt_pajak'   => $this->input->post('up_sppt_pajak'),
          'u_ajb_doc_other' => $this->input->post('u_ajb_doc_other'),
          'status_pembelian'=> $this->input->post('status_pembelian'),
        ];
        $this->db->update('tb_aset_tanah',$data,['id_asett' => $id]);

        $batasTanah = [
          'bu'      => $this->input->post('bu'),
          'bt'      => $this->input->post('bt'),
          'bb'      => $this->input->post('bb'),
          'bs'      => $this->input->post('bs'),
        ];
        $this->db->update('tb_batas_tanah',$batasTanah,['id_aset' => $id]);

        redirect($_SERVER['HTTP_REFERER']);
    }

    function delete($id){
        $this->db->delete('tb_aset_tanah',['id_asett' => $id]);
        $this->db->delete('tb_batas_tanah',['id_aset' => $id]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "Data_Asset_Tanah.xlsx";
        $judul = "klasifikasi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        $getData = $this->db->get('tb_aset_tanah')->result();
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pemilik");
        xlsWriteLabel($tablehead, $kolomhead++, "Pemilik Sebelum");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Dokumen Kepemilikan");
        xlsWriteLabel($tablehead, $kolomhead++, "No Surat");
        xlsWriteLabel($tablehead, $kolomhead++, "Luas Tanah");
        xlsWriteLabel($tablehead, $kolomhead++, "Tahun Pembelian");
        xlsWriteLabel($tablehead, $kolomhead++, "Harga Pembelian");
        xlsWriteLabel($tablehead, $kolomhead++, "Lokasi");
        xlsWriteLabel($tablehead, $kolomhead++, "Batas Tanah");
        xlsWriteLabel($tablehead, $kolomhead++, "NIB");
        xlsWriteLabel($tablehead, $kolomhead++, "Nomor Persil");
        xlsWriteLabel($tablehead, $kolomhead++, "Nomor Kohir");
        xlsWriteLabel($tablehead, $kolomhead++, "Notaris / PPAT");
        xlsWriteLabel($tablehead, $kolomhead++, "Nomor SPPT");
        xlsWriteLabel($tablehead, $kolomhead++, "Status Pelunasan");
	      foreach ($getData as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_pemilik);
            xlsWriteLabel($tablebody, $kolombody++, $data->pemilik_before);
            xlsWriteLabel($tablebody, $kolombody++, $data->js_document);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_surat);
            xlsWriteLabel($tablebody, $kolombody++, $data->luas_tanah);
            xlsWriteLabel($tablebody, $kolombody++, $data->thn_pembelian);
            xlsWriteLabel($tablebody, $kolombody++, $data->harga_pembelian);
            xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
            xlsWriteLabel($tablebody, $kolombody++, $data->batas_tanah);
            xlsWriteLabel($tablebody, $kolombody++, $data->nib);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_persil);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_kohir);
            xlsWriteLabel($tablebody, $kolombody++, $data->notaris_ppat);
            xlsWriteNumber($tablebody, $kolombody++, $data->no_sppt);
            xlsWriteLabel($tablebody, $kolombody++, $data->status_pembelian);
            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function vDenah(){
      $id = $this->input->post('id');
      $idaset = $this->input->post('idaset');
      if($id == '1'){
        $this->db->update('tb_aset_tanah',['validasi_denah' => '0'],['id_asett' => $idaset]);
      }else{
        $this->db->update('tb_aset_tanah',['validasi_denah' => '1'],['id_asett' => $idaset]);
      }
    }

    function vDokumen(){
      $id = $this->input->post('id');
      $idaset = $this->input->post('idaset');
      if($id == '1'){
        $this->db->update('tb_aset_tanah',['validasi_dokumen' => '0'],['id_asett' => $idaset]);
      }else{
        $this->db->update('tb_aset_tanah',['validasi_dokumen' => '1'],['id_asett' => $idaset]);
      }
    }


}

