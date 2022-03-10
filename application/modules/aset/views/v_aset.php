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
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah"><i
                            class="fas fa-plus"></i> Tambah</button>
                    <a href="<?= base_url('aset/excel')?>" class="btn btn-sm btn-success"><i
                            class="ni ni-single-copy-04"></i> Export Excel</a>
                </div>
                <div class="table-responsive py-4">
                    <!-- <div class="ml-2">
               Column: 
               <a class="toggle-vis" data-column="1">Nama Pemilik</a> - 
               <a class="toggle-vis" data-column="2">Pemilik Sebelum</a> - 
               <a class="toggle-vis" data-column="3">Jenis Dokumen</a> - 
               <a class="toggle-vis" data-column="4">Validasi Denah</a> - 
               <a class="toggle-vis" data-column="5">Validasi Document</a> - 
               <a class="toggle-vis" data-column="6">No Surat</a>
               <a class="toggle-vis" data-column="7">No Surat</a>
               <a class="toggle-vis" data-column="8">No Surat</a>
               <a class="toggle-vis" data-column="9">No Surat</a>
               <a class="toggle-vis" data-column="10">No Surat</a>
            </div> -->
                    <table class="table align-items-center table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Pemilik</th>
                                <th>Pemilik Sebelum</th>
                                <th>Jenis Dokumen</th>
                                <th>Validasi Denah</th>
                                <th>Validasi Document</th>
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
                                <th>Status Pembelian</th>
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
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox custom-checkbox-success">
                                        <input type="checkbox" onclick="vDenah(<?=$row->validasi_denah?>,<?= $row->id_asett?>)" <?= $row->validasi_denah == 1 ? 'checked' : ''?>
                                            class="custom-control-input" id="customCheckVde<?= $row->id_asett?>">
                                        <label class="custom-control-label" for="customCheckVde<?= $row->id_asett?>"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox custom-checkbox-success">
                                        <input type="checkbox" onchange="vDocument(<?=$row->validasi_dokumen?>,<?= $row->id_asett?>)" <?= $row->validasi_dokumen == 1 ? 'checked' : ''?>
                                            class="custom-control-input" id="customCheckVdo<?= $row->id_asett?>">
                                        <label class="custom-control-label" for="customCheckVdo<?= $row->id_asett?>"></label>
                                    </div>
                                </td>
                                <td><?= $row->no_surat?></td>
                                <td><?= $row->luas_tanah?></td>
                                <td><?= $row->thn_pembelian?></td>
                                <td><?= $row->harga_pembelian?></td>
                                <td><?= $row->lokasi?></td>
                                <td> 
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Details</button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">BU : <?= $this->my_model->_batasTanah($row->batas_tanah)->bu?></a>
                                        <a class="dropdown-item" href="#">BB : <?= $this->my_model->_batasTanah($row->batas_tanah)->bb?></a>
                                        <a class="dropdown-item" href="#">BT : <?= $this->my_model->_batasTanah($row->batas_tanah)->bt?></a>
                                        <a class="dropdown-item" href="#">BS : <?= $this->my_model->_batasTanah($row->batas_tanah)->bs?></a>
                                    </div>
                                </td>
                                <td><?= $row->nib?></td>
                                <td><?= $row->no_persil?></td>
                                <td><?= $row->no_kohir?></td>
                                <td><?= $row->notaris_ppat?></td>
                                <td><?= $row->no_sppt?></td>
                                <td>
                                    <?= $row->status_pembelian == 'Lunas' ? '<span class="badge badge-lg badge-success">Lunas</span>' : '<span class="badge badge-lg badge-danger">Belum</span>' ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info ml-1" data-toggle="modal"data-target="#upload" onclick="showUploadFile(<?= $row->id_asett?>)"><i class="fas fa-upload"></i>&nbsp; Upload File</button>
                                    <button type="button" class="btn btn-sm btn-success ml-1" data-toggle="modal"data-target="#edit" onclick="showAsetEdit(<?= $row->id_asett?>)"><i class="ni ni-ruler-pencil"></i>&nbsp; Edit</button>
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
                                            <input class="form-control" name="nm_pemilik" placeholder="Nama Pemilik" type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Pemilik
                                            Sebelum</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input class="form-control" name="pemilik_before" placeholder="Pemilik Sebelum" type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Jenis Dokumen</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                            </div>
                                            <select name="js_document" class="form-control" required>
                                                <option disabled selected> --- Pilih SHM / SHGB --- </option>
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
                                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                            </div>
                                            <select name="jd" class="form-control" required>
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
                                            <input class="form-control" name="no_surat" placeholder="Nomor Surat" type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Luas Tanah</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-bandcamp"></i></span>
                                            </div>
                                            <input class="form-control" name="luas_tanah" placeholder="Luas Tanah"
                                                type="number" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Tahun
                                            Pembelian</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <!-- <input class="form-control" name="thn_pembelian" placeholder="Tahun Pembelian" type="text" autocomplete="off"> -->
                                            <select name="thn_pembelian" class="form-control" required>
                                                <option disabled selected> --- Pilih Tahun --- </option>
                                                <?php
                                                $thn_skr = date('Y');
                                                for ($x = $thn_skr; $x >= 1900; $x--) {
                                                ?>
                                                    <option value="<?= $x ?>"><?= $x ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Harga
                                            Pembelian</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                                            </div>
                                            <input class="form-control" name="harga_pembelian"
                                                placeholder="Harga Pembelian" type="number" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Lokasi</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                            </div>
                                            <input class="form-control" name="lokasi" placeholder="Lokasi" type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Batas Utara</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-bandcamp"></i></span>
                                            </div>
                                            <input class="form-control" name="bu" placeholder="Batas Utara"
                                                type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Batas Barat</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-bandcamp"></i></span>
                                            </div>
                                            <input class="form-control" name="bb" placeholder="Batas Barat"
                                                type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Batas Timur</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-bandcamp"></i></span>
                                            </div>
                                            <input class="form-control" name="bt" placeholder="Batas Timur"
                                                type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Batas Selatan</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-bandcamp"></i></span>
                                            </div>
                                            <input class="form-control" name="bs" placeholder="Batas Selatan"
                                                type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">NIB</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-archway"></i></span>
                                            </div>
                                            <input class="form-control" name="nib" placeholder="NIB" type="number" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Nomor Persil</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-archway"></i></span>
                                            </div>
                                            <input class="form-control" name="no_persil" placeholder="Nomor Persil" type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Nomor Kohir</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-archway"></i></span>
                                            </div>
                                            <input class="form-control" name="no_kohir" placeholder="Nomor Kohir" type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Notaris / PPAT</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-archway"></i></span>
                                            </div>
                                            <input class="form-control" name="notaris_ppat" placeholder="Notaris / PPAT" type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Nomor SPPT</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-archway"></i></span>
                                            </div>
                                            <input class="form-control" name="no_sppt" placeholder="Nomor SPPT" type="text" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleDatepicker">Status
                                            Pembelian</label>
                                        <div class="input-group input-group-merge">
                                            <select name="status_pembelian" class="form-control" required>
                                                <option disabled selected> --- Pilih Status --- </option>
                                                <option value="Lunas">Lunas</option>
                                                <option value="Belum Lunas">Belum Lunas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                              <div class="row">
                                <div class="col-md-6">
                                  <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                <div class="col-md-6">
                                  <button type="submit" class="btn btn-block btn-success btn-md">Simpan</button>
                                </div>
                              </div>
                            </div>
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
            <h5 class="modal-title" id="exampleModalLabel">Form Edit Aset</h5>
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

