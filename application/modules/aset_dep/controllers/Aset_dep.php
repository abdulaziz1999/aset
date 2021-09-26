<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aset_dep extends CI_Controller
{        
    function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        if($this->session->userdata('level') != "admin"){
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
        $id = $this->input->post('id');
        $this->db->join('tb_seminar sm','sm.id_seminar = s.seminar_id');
        $dataSeminar = $this->db->get_where('tb_daftar_seminar s',['id_df_seminar' => $id])->row();
        $dosen = $this->db->get('tb_dosen')->result();
        $seminar = $this->db->get('tb_seminar')->result();
        $prodi = $this->db->get('tb_prodi')->result();
        ?>
        <div class="card">
                <div class="card-body">
                  <form method="POST" action="<?= base_url('df_seminar/update/'.$id)?>">
                        <!-- Input groups with icon -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                            <label class="form-control-label" for="exampleDatepicker">NIM</label>
                              <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input class="form-control" name="nim" placeholder="NIM" value="<?= $dataSeminar->nim?>" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                            <label class="form-control-label" for="exampleDatepicker">Nama</label>
                              <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input class="form-control" name="nama" placeholder="Nama" value="<?= $dataSeminar->nama?>" type="text">
                              </div>
                            </div>
                          </div> 
                          <div class="col-md-6">
                            <div class="form-group">
                            <label class="form-control-label" for="exampleDatepicker">Judul Tugas Akhir</label>
                              <div class="input-group input-group-merge">
                                <textarea class="form-control" name="judul_ta" placeholder="Judul Tugas Akhir" value="<?= $dataSeminar->judul_ta?>" id="" cols="30" rows="6"><?= $dataSeminar->judul_ta?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Prodi</label>
                              <div class="input-group input-group-merge">
                                <select name="prodi_id" class="form-control">
                                    <option disabled> --- Pilih Prodi --- </option>
                                  <?php foreach($prodi as $row):?>
                                    <option <?php $dataSeminar->prodi_id == $row->id_prodi ? 'selected' : ''?> value="<?=$row->id_prodi?>"><?= $row->nama_prodi?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Seminar</label>
                              <div class="input-group input-group-merge">
                                <select name="seminar_id" class="form-control" >
                                  <option disabled> --- Pilih Seminar --- </option>
                                  <?php foreach($seminar as $row):?>
                                    <option <?php $dataSeminar->seminar_id == $row->id_seminar ? 'selected' : ''?> value="<?=$row->id_seminar?>"><?= $row->nama_seminar?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                            </div>
                            </div>
                          </div>
                        </div>
                        <!-- Input groups with icon -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Tanggal Seminar</label>
                              <div class="input-group input-group-merge">
                              <input class="form-control" name="tgl_seminar" placeholder="Nama" value="<?= $dataSeminar->tgl_seminar?>" type="date">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Pembimbing</label>
                              <div class="input-group input-group-merge">
                                <select name="pembimbing" class="form-control" >
                                  <option disabled > --- Pilih Pembimbing --- </option>
                                  <?php foreach($dosen as $row):?>
                                    <option <?php $dataSeminar->pembimbing == $row->id_dosen ? 'selected' : ''?> value="<?=$row->id_dosen?>"><?= $row->nama_dosen?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Jam Seminar</label>
                              <div class="input-group input-group-merge">
                              <input class="form-control" name="jam_seminar" placeholder="Nama" value="<?= $dataSeminar->jam_seminar?>" type="time">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Penguji 1</label>
                              <div class="input-group input-group-merge">
                                <select class="form-control" name="penguji1" >
                                <option disabled > --- Pilih Penguji 1 --- </option>
                                  <?php foreach($dosen as $row):?>
                                    <option <?php $dataSeminar->penguji1 == $row->id_dosen ? 'selected' : ''?> value="<?=$row->id_dosen?>"><?= $row->nama_dosen?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Ruangan</label>
                              <div class="input-group input-group-merge">
                              <input class="form-control" name="ruang" placeholder="Ruangan" value="<?= $dataSeminar->ruang?>" type="text">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Penguji 2</label>
                              <div class="input-group input-group-merge">
                                <select class="form-control" name="penguji2" >
                                  <option disabled > --- Pilih Penguji 2 --- </option>
                                  <?php foreach($dosen as $row):?>
                                    <option <?php $dataSeminar->penguji2 == $row->id_dosen ? 'selected' : ''?> value="<?=$row->id_dosen?>"><?= $row->nama_dosen?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
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

