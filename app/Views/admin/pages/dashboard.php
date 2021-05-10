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
                  <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
              </ol>
          </div>
        </div>

        <!-- Start Widget -->
        <div class="row">
          <div class="col-md-6 col-sm-6 col-lg-3">
              <div class="mini-stat clearfix bx-shadow">
                  <span class="mini-stat-icon bg-info"><i class="md md-home"></i></span>
                  <div class="mini-stat-info text-right text-muted">
                      <span class="counter"><?= $jumlah_cabang ?></span>
                      Jumlah Cabang
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-3">
              <div class="mini-stat clearfix bx-shadow">
                  <span class="mini-stat-icon bg-purple"><i class="md md-view-list"></i></span>
                  <div class="mini-stat-info text-right text-muted">
                      <span class="counter"><?= $jumlah_rute ?></span>
                      Jumlah Rute
                  </div>
              </div>
          </div>
          
          <div class="col-md-6 col-sm-6 col-lg-3">
              <div class="mini-stat clearfix bx-shadow">
                  <span class="mini-stat-icon bg-success"><i class="md md-event"></i></span>
                  <div class="mini-stat-info text-right text-muted">
                      <span class="counter"><?= $jumlah_jadwal ?></span>
                      Jumlah Jadwal
                  </div>
              </div>
          </div>

          <div class="col-md-6 col-sm-6 col-lg-3">
              <div class="mini-stat clearfix bx-shadow">
                  <span class="mini-stat-icon bg-primary"><i class="fa fa-users"></i></span>
                  <div class="mini-stat-info text-right text-muted">
                      <span class="counter"><?= $jumlah_users ?></span>
                      Jumlah Users
                  </div>
              </div>
          </div>
      </div> 
      <!-- End row-->

      <div class="panel panel-default">      
        <div class="panel-body" style="text-align: center;">
            <h2>Selamat Datang <?= session()->get('nama') ?> !</h2>
        </div>
        <!-- end: page -->
    </div> <!-- end Panel -->

    </div>
  </div>
</div>
<?= view('admin/layouts/footer'); ?>