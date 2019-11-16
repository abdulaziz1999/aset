<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= base_url('admin'); ?>">Dashboard</a> 
				</li>
				<li class="active">Laporan</li>
				</ul>
		</div> 
<!-- Main content -->
        <section class='content'>
          <div class='row'>
                <div class='col-xs-12'>
                    <div class='box'>
                        <div class='box-header'>   
                            <h3 class='box-title'>Laporan</h3>
                            <div class='box box-primary'>
                                <form action="" method="get">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Tanggal Mulai</label>
                                                <input type="date" class="form-control form-control-sm form-control-alternative" name="s" value="<?= $this->input->get('s', TRUE) ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Tanggal Selesai</label>
                                                <input type="date" class="form-control form-control-sm form-control-alternative" name="e" value="<?= $this->input->get('e', TRUE) ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 text-left">
                                            <div class="form-group">
                                                <label style="color: white">-</label><br>
                                                <button type="submit" class="btn tampil btn-sm btn-primary">Tampil</button> 
                                                <a href="<?php echo site_url('laporan') ?>" class="btn btn-sm btn-default">Reset</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6"></div>
                                    </div>
                                </form>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div>
                
                <div class="col-xs-12" style="padding-top: 15px">
                    <div class="clearfix">
						<div class="table-header">
							Laporan Pengaduan : <?= $this->input->get('s') ." - ". $this->input->get('e')?>
						</div>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>isi</th> 
                                        <th>Klasifikasi</th>
                                        <th>Klasifikasi Khusus</th>
                                        <th>No Hp</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
					</div>
                </div>
            </div><!-- /.row -->
        </section><!-- /.content -->