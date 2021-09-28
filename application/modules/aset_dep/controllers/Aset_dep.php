<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aset_dep extends CI_Controller
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
        $data['title']  = "Asset";   
        $data['aset']   = $this->db->get('tb_aset_depersiasi')->result();
        $this->template->load('template_back/template','v_aset_dep',$data);
    }

    function dataEdit(){
      $data['id'] = $this->input->post('id');
      $data['aset'] = $this->db->get_where('tb_aset_depersiasi',['id_aset_d' => $data['id']])->row();
      $this->load->view('formEditAset',$data);
  }
  
  function dataUpload(){
      $data['id'] = $this->input->post('id');
      $this->load->view('formUpload',$data);
  }
    
    function create(){
        $data = [
          'nm_aset'           => $this->input->post('nm_aset'),
          'spek_merk'         => $this->input->post('spek_merk'),
          'thn_pembelian'     => $this->input->post('thn_pembelian'),
          'harga_beli'        => $this->input->post('harga_beli'),
          'usia_depersiasi'   => $this->input->post('usia_depersiasi'),
          'nilai_now'         => $this->input->post('nilai_now'),
          'lokasi_unit_user'  => $this->input->post('lokasi_unit_user'),
          'status_kepemilikan'=> $this->input->post('status_kepemilikan'),
          'kode_akutansi'     => $this->input->post('kode_akutansi'),
        ];
        $this->db->insert('tb_aset_depersiasi',$data);
        $lastid = $this->db->insert_id();

        $config['upload_path'] 			= './assets/img/file/'; 
        $config['allowed_types'] 		= 'gif|jpg|png|jpeg|bmp|pdf'; 
        $config['encrypt_name'] 		= false;
        
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('u_kwitansi')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', "File Invoice Gagal Diupdate");
            redirect($_SERVER['HTTP_REFERER']);
          }else{
            $gbr = $this->upload->data();
            $data1 = array(
              'nama_file'     => $gbr['file_name'],
              'aset_tanah_id' => $lastid,
              'jenis_file'    => 'kwitansi'
            );
            $this->db->insert('tb_file_aset',$data1);

                if($this->db->affected_rows() > 0){
                  $this->session->set_flashdata('sukses', "File Invoice Berhasil Diupdate");
                  redirect($_SERVER['HTTP_REFERER']);
                }else{
                  $this->session->set_flashdata('error', "File Invoice Gagal Diupdate");
                  redirect($_SERVER['HTTP_REFERER']);
                }
          }

          $config['upload_path'] 			= './assets/img/file/'; 
          $config['allowed_types'] 		= 'gif|jpg|png|jpeg|bmp|pdf'; 
          $config['encrypt_name'] 		= false;
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('u_doc_milik')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', "File Invoice Gagal Diupdate");
            redirect($_SERVER['HTTP_REFERER']);
          }else{
            $gbr = $this->upload->data();
            $data2 = array(
              'nama_file'     => $gbr['file_name'],
              'aset_tanah_id' => $lastid,
              'jenis_file'    => 'doc_milik'
            );
            $this->db->insert('tb_file_aset',$data2);

                if($this->db->affected_rows() > 0){
                  $this->session->set_flashdata('sukses', "File Invoice Berhasil Diupdate");
                  redirect($_SERVER['HTTP_REFERER']);
                }else{
                  $this->session->set_flashdata('error', "File Invoice Gagal Diupdate");
                  redirect($_SERVER['HTTP_REFERER']);
                }
          }
          
          $config['upload_path'] 			= './assets/img/file/'; 
          $config['allowed_types'] 		= 'gif|jpg|png|jpeg|bmp|pdf'; 
          $config['encrypt_name'] 		= false;
          if (!$this->upload->do_upload('u_pajak')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', "File Invoice Gagal Diupdate");
            redirect($_SERVER['HTTP_REFERER']);
          }else{
            $gbr = $this->upload->data();
            $data3 = array(
              'nama_file'     => $gbr['file_name'],
              'aset_tanah_id' => $lastid,
              'jenis_file'    => 'pajak'
            );
            $this->db->insert('tb_file_aset',$data3);

                if($this->db->affected_rows() > 0){
                  $this->session->set_flashdata('sukses', "File Invoice Berhasil Diupdate");
                  redirect($_SERVER['HTTP_REFERER']);
                }else{
                  $this->session->set_flashdata('error', "File Invoice Gagal Diupdate");
                  redirect($_SERVER['HTTP_REFERER']);
                }
          }

    }

    function update($id){
        $data = [
          'nm_aset'           => $this->input->post('nm_aset'),
          'spek_merk'         => $this->input->post('spek_merk'),
          'thn_pembelian'     => $this->input->post('thn_pembelian'),
          'harga_beli'        => $this->input->post('harga_beli'),
          'usia_depersiasi'   => $this->input->post('usia_depersiasi'),
          'nilai_now'         => $this->input->post('nilai_now'),
          'lokasi_unit_user'  => $this->input->post('lokasi_unit_user'),
          'status_kepemilikan'=> $this->input->post('status_kepemilikan'),
          'u_kwitansi'        => $this->input->post('u_kwitansi'),
          'u_doc_milik'       => $this->input->post('u_doc_milik'),
          'u_pajak'           => $this->input->post('u_pajak'),
          'kode_akutansi'     => $this->input->post('kode_akutansi'),
        ];
        $this->db->update('tb_aset_depersiasi',$data,['id_aset_d' => $id]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    function delete($id){
        $this->db->delete('tb_aset_depersiasi',['id_aset_d' => $id]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    function upload_file(){
          $config['upload_path'] 			= './assets/img/file/'; 
          $config['allowed_types'] 		= 'gif|jpg|png|jpeg|bmp|pdf'; 
          $config['encrypt_name'] 		= false;
          $config['max_size']         = 10000;
          $config['max_width']        = 10240;
          $config['max_height']       = 76800;
  
        $this->upload->initialize($config);
          if (!$this->upload->do_upload('invoice')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', "File Invoice Gagal Diupdate");
            redirect($_SERVER['HTTP_REFERER']);
          }else{
            $gbr = $this->upload->data();
            $data = array(
              'nama_file'     => $gbr['file_name'],
              'pengajuan_id' 	=> $id 
            );
            $this->db->insert('tb_file_aset',$data);

                if($this->db->affected_rows() > 0){
                  $this->session->set_flashdata('sukses', "File Invoice Berhasil Diupdate");
                  redirect($_SERVER['HTTP_REFERER']);
                }else{
                  $this->session->set_flashdata('error', "File Invoice Gagal Diupdate");
                  redirect($_SERVER['HTTP_REFERER']);
                }
          }
    }

    function viewPerserta($id){
      $data['title']		      = "Daftar Peserta Seminar Tugas Akhir";
                                $this->db->join('tb_prodi p','p.id_prodi = s.prodi_id');
      $data['peserta']        = $this->db->get_where('tb_peserta_seminar s',['id_seminar' => $id])->result();
      $data['prodi']          = $this->db->get('tb_prodi')->result();
      $this->template->load('template_back/template','peserta_seminar',$data);
      
    }

    function dataEditPeserta(){
      $id = $this->input->post('id');
      $this->db->join('tb_prodi p','p.id_prodi = s.prodi_id');
      $peserta  = $this->db->select('s.*,p.nama_prodi')->get_where('tb_peserta_seminar s',['id_peserta' => $id])->row();
      $prodi    = $this->db->get('tb_prodi')->result();
      
      ?>  
            <div class="card">
              <div class="card-body">
                  <form method="POST" action="<?= base_url('df_seminar/updatePeserta/'.$peserta->id_peserta)?>">
                        <!-- Input groups with icon -->
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                            <label class="form-control-label" for="exampleDatepicker">NIM</label>
                              <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input class="form-control" name="nim" placeholder="NIM" value="<?= $peserta->nim?>" type="number">
                              </div>
                            </div>
                            
                          </div> 
                          <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleDatepicker">Nama</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input class="form-control" name="nama" placeholder="Nama" value="<?= $peserta->nama?>" type="text">
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Prodi</label>
                              <div class="input-group input-group-merge">
                                <select name="prodi_id" class="form-control">
                                  <option disabled > --- Pilih Prodi --- </option>
                                  <?php foreach($prodi as $row):?>
                                    <option <?php $peserta->prodi_id == $row->id_prodi ? 'selected' : ''?> value="<?=$row->id_prodi?>"><?= $row->nama_prodi?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Input groups with icon -->
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline5" name="program" <?= $peserta->program == 'D3' ? 'checked' : ''?> value="D3" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline5">D3</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline6" name="program" <?= $peserta->program == 'S1 Reguler' ? 'checked' : ''?> value="S1 Reguler" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline6">S1 Reguler</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline7" name="program" <?= $peserta->program == 'S1 Fast Trackt' ? 'checked' : ''?> value="S1 Fast Trackt" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline7">S1 Fast Trackt</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline8" name="program" <?= $peserta->program == 'S2' ? 'checked' : ''?> value="S2" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline8">S2</label>
                                </div>
                                <input type="hidden" name="id_seminar" value="<?= $peserta->id_seminar?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Status</label>
                              <div class="input-group input-group-merge">
                                <select name="status" class="form-control">
                                  <option disabled> --- Pilih Status --- </option>
                                  <?php  if($peserta->status == 'Diterima'):?>
                                    <option value="Diterima" selected>Diterima</option>
                                    <option value="Ditolak">Ditolak</option>
                                    <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                  <?php elseif($peserta->status == 'Ditolak'):?>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Ditolak" selected>Ditolak</option>
                                    <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                  <?php elseif($peserta->status == 'Menunggu Verifikasi'):?>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Ditolak">Ditolak</option>
                                    <option value="Menunggu Verifikasi" selected>Menunggu Verifikasi</option>
                                  <?php else:?>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Ditolak">Ditolak</option>
                                    <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                  <?php endif;?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </form>
              </div>
           </div>
      <?php
  }

    function createPeserta(){
      $data = [
        'nim'           => $this->input->post('nim'),
        'nama'          => $this->input->post('nama'),
        'prodi_id'      => $this->input->post('prodi_id'),       
        'program'       => $this->input->post('program'),       
        'id_seminar'    => $this->input->post('id_seminar'),       
        'status'        => $this->input->post('id_seminar'),       
      ];
      $this->db->insert('tb_peserta_seminar',$data);
      redirect($_SERVER['HTTP_REFERER']);
    }

    function updatePeserta($id){
      $data = [
        'nim'           => $this->input->post('nim'),
        'nama'          => $this->input->post('nama'),
        'prodi_id'      => $this->input->post('prodi_id'),       
        'program'       => $this->input->post('program'),       
        'id_seminar'    => $this->input->post('id_seminar'),
        'status'        => $this->input->post('id_seminar'),       
      ];
      $this->db->update('tb_peserta_seminar',$data,['id_peserta' => $id]);
      redirect($_SERVER['HTTP_REFERER']);
    }

    function deletePeserta($id){
      $this->db->delete('tb_peserta_seminar',['id_peserta' => $id]);
      redirect($_SERVER['HTTP_REFERER']);
    }



}

