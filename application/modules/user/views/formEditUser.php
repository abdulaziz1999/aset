<div class="card">
    <div class="card-body">
        <form method="POST" action="<?= base_url('user/update/'.$id)?>">
            <!-- Input groups with icon -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="exampleDatepicker">Nama</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input class="form-control" name="nama" value="<?= $user->nama?>" placeholder="Nama"
                                type="text" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="exampleDatepicker">Email</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input class="form-control" name="email" value="<?= $user->email?>" placeholder="Email"
                                type="email" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="exampleDatepicker">Level</label>
                        <div class="input-group input-group-merge">
                            <select name="level" class="form-control">
                                <option disabled> --- Pilih Level --- </option>
                                <?php if($user->level == 'keuangan'):?>
                                <option value="admin">Admin</option>
                                <option value="keuangan" selected>Keuangan</option>
                                <option value="staff">Staff</option>
                                <?php elseif($user->level == 'admin'):?>
                                <option value="admin" selected>Admin</option>
                                <option value="keuangan">Keuangan</option>
                                <option value="staff">Staff</option>
                                <?php elseif($user->level == 'staff'):?>
                                <option value="admin">Admin</option>
                                <option value="keuangan">Keuangan</option>
                                <option value="staff" selected>Staff</option>
                                <?php else:?>
                                <option value="admin">Admin</option>
                                <option value="keuangan">Keuangan</option>
                                <option value="staff">Staff</option>
                                <?php endif;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="exampleDatepicker">Status</label>
                        <div class="input-group input-group-merge">
                            <select name="status" class="form-control">
                                <option disabled> --- Pilih Status --- </option>
                                <?php if($user->status == 'N'):?>
                                <option value="N" selected>inactive</option>
                                <option value="Y">active</option>
                                <?php elseif($user->status == 'Y'):?>
                                <option value="N">inactive</option>
                                <option value="Y" selected>active</option>
                                <?php else:?>
                                <option value="N">inactive</option>
                                <option value="Y">active</option>
                                <?php endif;?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary btn-md">Update</button>
        </form>
    </div>
</div>