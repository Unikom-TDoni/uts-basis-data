<?= view('admin/layouts/header'); ?>

  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="fa fa-user"></i> Pelanggan</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?= site_url('admin')?>">Admin</a></li>
                        <li class="active">Pelanggan</li>
                    </ol>
                </div>
            </div>

            <div class="panel">          
                <div class="panel-body">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No. Telp</th>
                                <th>Nama</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            <?php foreach ($pelanggan as $data): ?>
                            <tr class="gradeX">
                                <td><?= $data['telp'] ?></td>
                                <td><?= $data['nama'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- end: page -->
            </div> <!-- end Panel -->
        </div>
    </div>
  </div> 

<?= view('admin/layouts/footer'); ?>