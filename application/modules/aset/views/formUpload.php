<div class="card">
    <div class="card-body">
        <form method="POST" action="<?= base_url('aset/uploadFile/'.$id)?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="exampleDatepicker">Jenis Dokumen</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                            </div>
                            <select name="jenis_file" class="form-control" required>
                                <option disabled selected> --- Pilih Jenis  --- </option>
                                <option value="SHM">SHM</option>
                                <option value="SPPT/Pajak">SPPT/Pajak</option>
                                <option value="AJB">AJB</option>
                                <option value="Document_lain">Document Lain</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="exampleDatepicker">Upload File</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-upload"></i></span>
                            </div>
                            <input class="form-control" name="file" type="file" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label" for="exampleDatepicker">Link Drive</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                            </div>
                            <input class="form-control" name="link" type="text" autocomplete="off" >
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
                        <button type="submit" class="btn btn-block btn-success btn-md">Upload</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>