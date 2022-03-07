<div class="header bg-success pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Aset Depersiasi</li>
                </ol>
              </nav>
            </div> 
            
          </div>
        </div>
      </div>
    </div>
  <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</button>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-buttons">
                <thead class="thead-light">
                  <tr class="text-center">
                    <th>No</th>
                    <th>Nama Aset</th>
                    <th>Spek/Merk</th>
                    <th>Tahun Pembelian</th>
                    <th>Harga Beli</th>
                    <th>Usia Depersiasi</th>
                    <th>Nilai Saat Ini</th>
                    <th>Lokasi/Unit Pengguna</th>
                    <th>Status Kepemilikan</th>
                    <th>Kode Akutansi</th>
                    <th>ACT</th>
                  </tr>
                </thead>
                <tbody class="text-center" >
                  <?php $no=1; foreach($aset as $row):?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?= $row->nm_aset?></td>
                      <td><?= $row->spek_merk?></td>
                      <td><?= $row->thn_pembelian?></td>
                      <td><?= $row->harga_beli?></td>
                      <td><?= $row->usia_depersiasi?></td>
                      <td><?= $row->nilai_now?></td>  <!-- harga beli - (thn now - thn beli / Usia depersiasi X harga beli)  -->
                      <td><?= $row->lokasi_unit_user?></td>
                      <td><?= $row->status_kepemilikan?></td>
                      <td><?= $row->kode_akutansi?></td>
                      <td>
                          <button type="button" class="btn btn-sm btn-info ml-1" data-toggle="modal"data-target="#upload" onclick="showUploadFile(<?= $row->id_aset_d?>)"><i class="fas fa-upload"></i>&nbsp; Upload File</button>
                          <button type="button" class="btn btn-sm btn-success ml-1" data-toggle="modal" data-target="#edit" onclick="showEditAsetDep(<?= $row->id_aset_d?>)"><i class="ni ni-ruler-pencil"></i>&nbsp; Edit</button>
                          <button type="button" class="btn btn-sm btn-danger ml-1" onclick="deleteAsetDep(<?= $row->id_aset_d?>)"><i class="fas fa-trash"></i>&nbsp; Delete</button>
                      </td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>

      <!-- Modal Tambah -->
      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Asset Depersiasi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
                  <div class="card-body">
                    <form method="POST" action="<?= base_url('aset_dep/create')?>" enctype="multipart/form-data">
                          <!-- Input groups with icon -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Nama Asset</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                  <input class="form-control" autocomplete="off" name="nm_aset" placeholder="Nama Aset" type="text">
                                </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Spek / Merk</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                  <input class="form-control" autocomplete="off" name="spek_merk" placeholder="Spek atau merk" type="text">
                                </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Tahun Pembelian</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                  <input class="form-control" autocomplete="off" name="thn_pembelian" placeholder="Tahun Pembelian" type="text">
                                </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Harga Beli</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" autocomplete="off" name="harga_beli" placeholder="Harga Beli" type="text">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Usia Depersiasi</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" autocomplete="off" name="usia_depersiasi" placeholder="Usia Depersiasi" type="number">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Nilai Sekarang</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" autocomplete="off" name="nilai_now" placeholder="Nilai Sekarang" type="text">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Lokasi Unit / Pengguna</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" autocomplete="off" name="lokasi_unit_user" placeholder="Lokasi Unit / Pengguna" type="number">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Status Kepemilikan</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <select name="status_kepemilikan" class="form-control">
                                        <option disabled selected> --- Pilih Status --- </option>
                                        <option value="BOS">BOS</option>
                                        <option value="Yayasan">Yayasan</option>
                                        <option value="Wakaf">Wakaf</option>
                                      </select>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Upload Kwitansi</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" autocomplete="off" name="u_kwitansi" placeholder="Upload Kwitansi" type="file">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Upload Kepemilikan</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" autocomplete="off" name="u_doc_milik" placeholder="Upload Kepemilikan" type="file">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Upload Pajak</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-file"></i></span>
                                      </div>
                                      <input class="form-control" autocomplete="off" name="u_pajak" placeholder="Upload Pajak" type="file">
                                  </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Kode Akutansi</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-list"></i></span>
                                      </div>
                                      <input class="form-control" autocomplete="off" name="kode_akutansi" placeholder="Kode Akutansi" type="text">
                                  </div>
                              </div>
                            </div>
                          </div>
                          <input type="hidden" name="id_seminar" value="<?= $this->uri->segment(3)?>">
                          
                          <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>

    <!-- Modal edit -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Edit Aset Depersiasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                  <div id="data_edit"></div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Upload File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                  <div id="data_upload"></div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>


    