<div class="header bg-success pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Aset</li>
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
              <a href="<?= base_url('aset/excel')?>" class="btn btn-sm btn-success" ><i class="ni ni-single-copy-04"></i> Export Excel</a>
            </div>
            <div class="table-responsive py-4">
              <table class="table align-items-center table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Pemilik Sebelum</th>
                    <th>Jenis Dokumen</th>
                    <th>No Surat</th>
                    <th>Luas Tanah</th>
                    <th>Tahun Pembelian</th>
                    <th>Harga Pembelian</th>
                    <th>Lokasi</th>
                    <th>Batas Tanah</th>
                    <th>NIB</th>
                    <th>Nomor Persil</th>
                    <th>Nomor Kohir</th>
                    <th>Notaris / PPAT</th>
                    <th>Nomor SPPT</th>
                    <!-- <th>Upload Kwitansi</th>
                    <th>Upload SHM</th>
                    <th>Upload SPPT/Pajak</th>
                    <th>Upload AJB dan Dokumen lain</th> -->
                    <th>Pembelian Dalam Pelunasan</th>
                    <th>ACT</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach($aset as $row):?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?= $row->nm_pemilik?></td>
                      <td><?= $row->pemilik_before?></td>
                      <td><?= $row->js_document?></td>
                      <td><?= $row->no_surat?></td>
                      <td><?= $row->luas_tanah?></td>
                      <td><?= $row->thn_pembelian?></td>
                      <td><?= $row->harga_pembelian?></td>
                      <td><?= $row->lokasi?></td>
                      <td><?= $row->batas_tanah?></td>
                      <td><?= $row->nib?></td>
                      <td><?= $row->no_persil?></td>
                      <td><?= $row->no_kohir?></td>
                      <td><?= $row->notaris_ppat?></td>
                      <td><?= $row->no_sppt?></td>
                      <td><?= $row->status_pembelian?></td>
                      <!-- <td>
                        <a href="" class="btn btn-sm btn-warning ml-1">
                          <i class="fas fa-eye"></i>&nbsp;  <span>View</span>
                          <span class="badge badge-md badge-circle badge-floating badge-danger border-white"></span>
                        </a>
                      </td> -->
                      <td>
                          <button type="button" class="btn btn-sm btn-success ml-1" data-toggle="modal" data-target="#edit" onclick="showDataEdit()"><i class="ni ni-ruler-pencil"></i>&nbsp; Edit</button>
                          <button type="button" class="btn btn-sm btn-danger ml-1" onclick="deleteSeminar()"><i class="fas fa-trash"></i>&nbsp; Delete</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Form Asset</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
                  <div class="card-body">
                    <form method="POST" action="<?= base_url('aset/create')?>">
                          <!-- Input groups with icon -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Nama Pemilik</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                  <input class="form-control" name="nm_pemilik" placeholder="Nama Pemilik" type="text">
                                </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Pemilik Sebelum</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                  <input class="form-control" name="pemilik_before" placeholder="Pemilik Sebelum" type="text">
                                </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Jenis Dokumen</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                  <select name="js_document" class="form-control">
                                    <option disabled selected> --- Pilih Jenis SHM / SHGB --- </option>
                                    <option value="SHM">SHM</option>
                                    <option value="SHGM">SHGM</option>
                                  </select>
                                </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label" for="exampleDatepicker">Jenis Dokumen</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                  <select name="jd" class="form-control">
                                    <option disabled selected> --- Pilih PTSL / BPN --- </option>
                                    <option value="PTSL">PTSL</option>
                                    <option value="BPN">BPN</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">No Surat</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="no_surat" placeholder="Nomor Surat" type="text">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Luas Tanah</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="luas_tanah" placeholder="Luas Tanah" type="number">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Tahun Pembelian</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="thn_pembelian" placeholder="Tahun Pembelian" type="text">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Harga Pembelian</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="harga_pembelian" placeholder="Harga Pembelian" type="number">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Lokasi</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="lokasi" placeholder="Lokasi" type="text">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Batas Tanah</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="batas_tanah" placeholder="Batas Tanah" type="text">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">NIB</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="nib" placeholder="NIB" type="text">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Nomor Persil</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="no_persil" placeholder="Nomor Persil" type="text">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Nomor Kohir</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="no_kohir" placeholder="Nomor Kohir" type="text">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Notaris / PPAT</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="notaris_ppat" placeholder="Notaris / PPAT" type="text">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="exampleDatepicker">Nomor SPPT</label>
                                  <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                      </div>
                                      <input class="form-control" name="no_sppt" placeholder="Nomor SPPT" type="text">
                                  </div>
                              </div>
                            </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label class="form-control-label" for="exampleDatepicker">Pembelian dalam Pelunasan</label>
                                <div class="input-group input-group-merge">
                                  <select name="status_pembelian" class="form-control">
                                    <option disabled selected> --- Pilih Status --- </option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>                
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


