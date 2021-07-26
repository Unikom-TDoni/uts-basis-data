<?= view('admin/layouts/header'); ?>
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title"><i class="md md-dashboard"></i> Dashboard</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="<?= site_url('admin')?>">Dashboard</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <?php if($level == 0 || $level == 2): ?>
            <div class="col-md-6 col-sm-6 col-lg-<?= $width_lg ?>">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-info"><i class="md md-home"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter"><?= $jumlah_cabang ?></span>
                        Jumlah Cabang
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-<?= $width_lg ?>">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-purple"><i class="md md-view-list"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter"><?= $jumlah_rute ?></span>
                        Jumlah Rute
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6 col-lg-<?= $width_lg ?>">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-success"><i class="md md-event"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter"><?= $jumlah_jadwal ?></span>
                        Jumlah Jadwal
                    </div>
                </div>
            </div>
            <?php endif ?>

            <?php if($level == 0): ?>
            <div class="col-md-6 col-sm-6 col-lg-<?= $width_lg ?>">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter"><?= $jumlah_users ?></span>
                        Jumlah Users
                    </div>
                </div>
            </div>
            <?php endif ?>
            
            <?php if($level == 0 || $level == 1): ?>
            <div class="col-md-6 col-sm-6 col-lg-<?= $width_lg ?>">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-inverse"><i class="fa fa-car"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter"><?= $jumlah_mobil ?></span>
                        Jumlah Mobil
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-<?= $width_lg ?>">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-danger"><i class="fa fa-user-secret"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter"><?= $jumlah_sopir ?></span>
                        Jumlah Sopir
                    </div>
                </div>
            </div>
            <?php endif ?>

            <?php if($level == 0 || $level == 3): ?>
            <div class="col-md-6 col-sm-6 col-lg-<?= $width_lg ?>">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-warning"><i class="fa fa-user"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter"><?= $jumlah_pelanggan ?></span>
                        Jumlah Pelanggan
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-<?= $width_lg ?>">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary"><i class="fa fa-cart-plus"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter"><?= $jumlah_transaksi ?></span>
                        Transaksi Hari Ini
                    </div>
                </div>
            </div>
            <?php endif ?>
        </div> 
        <!-- End row-->

        <div class="panel panel-default">      
            <div class="panel-body" style="text-align: center;">
                <h2>Selamat Datang <?= session()->get('nama') ?> !</h2>
            </div>
        </div> <!-- end Panel -->

        <?php if($level == 0 || $level == 3): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-cart-plus"></i></span> Transaksi Keberangkatan Hari Ini</h3>
            </div>    
            <div class="panel-body">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>Nomor <br> Transaksi</th>
                            <th>Rute</th>
                            <th>Jam <br> Berangkat</th>
                            <th>Nomor <br> Kursi</th>
                            <th>Telp <br> Pelanggan</th>
                            <th>Nama <br> Pelanggan</th>
                            <th>Status</th>
                        </tr>
                    </thead>                  
                    <tbody>
                        <?php foreach ($transaksi as $data): ?>
                        <?php 
                            if($data['is_batal'])
                            {
                                $status         = "CANCELLED";
                                $label_status   = "label-danger";
                            }
                            elseif ($data['is_lunas']) 
                            {
                                $status         = "PAID";   
                                $label_status   = "label-success";
                            }
                            else
                            {
                                $status         = "BOOKED";
                                $label_status   = "label-info";
                            }
                        ?>

                        <tr class="gradeX">
                            <td><?= $data['nomor_transaksi'] ?></td>
                            <td><?= $data['nama_rute'] ?></td>
                            <td><?= $data['jam_berangkat'] ?></td>
                            <td><?= $data['nomor_kursi'] ?></td>
                            <td><?= $data['telp'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><label class="label <?= $label_status ?>"><?= $data['status'] ?></label></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <div style="float: right">
                    <a href="<?= site_url('admin/transaksi/list') ?>" class="btn btn-icon btn-sm btn-primary">LIHAT SEMUA TRANSAKSI <i class="fa fa-arrow-right"></i></i></a>
                </div>
            </div>
        </div> <!-- end Panel -->
        <?php endif ?>
    </div>
  </div>
</div>

<?= view('admin/layouts/footer'); ?>