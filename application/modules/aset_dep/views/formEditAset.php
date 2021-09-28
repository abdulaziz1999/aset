<div class="card">
    <div class="card-body">
        <form method="POST" action="<?= base_url('aset_dep/update/'.$id)?>">
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
            <div class="text-right">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-success btn-md">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>