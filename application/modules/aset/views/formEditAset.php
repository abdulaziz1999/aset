<div class="card">
    <div class="card-body">
        <form method="POST" action="<?= base_url('aset/update/'.$id)?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="exampleDatepicker">Nama Pemilik</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input class="form-control" name="nm_pemilik" placeholder="Nama Pemilik" type="text" value="<?= $aset->nm_pemilik?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="pemilik_before" placeholder="Pemilik Sebelum" type="text" value="<?= $aset->pemilik_before?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="no_surat" placeholder="Nomor Surat" type="text" value="<?= $aset->no_surat?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="luas_tanah" placeholder="Luas Tanah" type="number" value="<?= $aset->luas_tanah?>"
                                autocomplete="off" required>
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
                                <option value="<?php echo $x ?>"><?php echo $x ?></option>
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
                            <input class="form-control" name="harga_pembelian" placeholder="Harga Pembelian" value="<?= $aset->harga_pembelian?>"
                                type="number" autocomplete="off" required>
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
                            <input class="form-control" name="lokasi" placeholder="Lokasi" type="text" value="<?= $aset->lokasi?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="bu" placeholder="Batas Utara" type="text" value="<?= $batas->bu?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="bb" placeholder="Batas Barat" type="text" value="<?= $batas->bb?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="bt" placeholder="Batas Timur" type="text" value="<?= $batas->bt?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="bs" placeholder="Batas Selatan" type="text" value="<?= $batas->bs?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="nib" placeholder="NIB" type="number" autocomplete="off" value="<?= $aset->nib?>"
                                required>
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
                            <input class="form-control" name="no_persil" placeholder="Nomor Persil" type="text" value="<?= $aset->no_persil?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="no_kohir" placeholder="Nomor Kohir" type="text" value="<?= $aset->no_kohir?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="notaris_ppat" placeholder="Notaris / PPAT" type="text" value="<?= $aset->notaris_ppat?>"
                                autocomplete="off" required>
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
                            <input class="form-control" name="no_sppt" placeholder="Nomor SPPT" type="text" value="<?= $aset->no_sppt?>"
                                autocomplete="off" required>
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
                        <button type="submit" class="btn btn-block btn-success btn-md">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>