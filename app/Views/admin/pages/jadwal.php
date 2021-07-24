<?= view('admin/layouts/header'); ?>

  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="md md-event"></i> Jadwal</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?= site_url('admin')?>">Admin</a></li>
                        <li class="active">Jadwal</li>
                    </ol>
                </div>
            </div>

            <div class="panel">          
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="m-b-30">
                                <button class="btn btn-primary" onclick="tambah()">Tambah <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Rute</th>
                                <th>Jam Berangkat</th>
                                <th>Aktifasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            <?php foreach ($jadwal as $data): ?>
                            <?php
                                $aktifasi       = ($data['is_aktif'])?"AKTIF":"NON-AKTIF"; 
                                $aktifasi_btn   = ($data['is_aktif'])?"info":"danger";
                                $row_bg         = ($data['is_aktif'])?"":"background: red;color: white;";
                            ?>

                            <tr class="gradeX" style="<?= $row_bg ?>">
                                <td><?= $data['nama_rute'] ?></td>
                                <td><?= $data['jam_berangkat'] ?></td>
                                <td>    
                                    <button class="btn btn-icon btn-sm btn-<?= $aktifasi_btn ?>" onclick="ubahAktifasi(<?= $data['id_jadwal'] ?>)"> <?= $aktifasi ?> </button>
                                </td>
                                <td class="actions">
                                    <button class="btn btn-icon btn-sm btn-success" onclick="edit(<?= $data['id_jadwal'] ?>)"> <i class="fa fa-edit"></i> </button> 
                                    <button class="btn btn-icon btn-sm btn-danger" onclick="hapus(<?= $data['id_jadwal'] ?>)"> <i class="fa fa-trash"></i> </button>
                                </td>
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
  
  <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Jadwal</h4> 
            </div> 
            
            <form id="form_input" action="<?= site_url('admin/jadwal/save') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id"> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Rute</label>
                                <select class="form-control" id="rute" name="rute" required>
                                    <option value="">--Pilih Rute--</option>           
                                    <?php foreach ($rute as $r): ?>
                                    <option value="<?= $r['id_rute']?>"><?= $r['nama_rute']?></option> 
                                    <?php endforeach; ?>
                                </select>
                            </div> 
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Jam Berangkat</label>
                                <input type="text" class="form-control" id="jam_berangkat" name="jam_berangkat" placeholder="Jam Berangkat" data-mask="99:99" required> 
                            </div>
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Aktifasi</label>
                                <select class="form-control" id="is_aktif" name="is_aktif" required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Non-Aktif</option>
                                </select>
                            </div> 
                        </div>
                    </div> 
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button> 
                    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">Simpan <i class="fa fa-save"></i></button> 
                </div> 
            </form>
        </div> 
    </div>
</div><!-- /.modal -->

<script>
    function tambah()
    {
        $('#edit').modal('show');
        $('#form_input').trigger('reset');
    }

    function edit(id)
    {
        $('#edit').modal('show');

        $.ajax(
        {
            url:"<?= site_url('admin/jadwal/data') ?>",
            type: "POST",
            data: {
                id: id,
            },
            dataType : 'json',
            success: function(result)
            {
                value = result;

                $("#id").val(id);
                $("#rute").val(value.id_rute);
                $("#jam_berangkat").val(value.jam_berangkat);
                $("#is_aktif").val(value.is_aktif);
            }
        });
    }

    function hapus(id)
    {
        if(!confirm("Apakah anda yakin?")) 
        {
            return false;
        }

        $.ajax(
        {
            url: "<?= site_url('admin/jadwal/delete') ?>",
            type: 'POST',
            data: 
            {
                id: id
            },
            success: function (response)
            {
                location.reload();
            }
        });
        
        return false;
    }
    
    function ubahAktifasi(id)
    {
        $.ajax(
        {
            url: "<?= site_url('admin/jadwal/aktivasi') ?>",
            type: 'POST',
            data: 
            {
                id: id
            },
            success: function (response)
            {
                location.reload();
            }
        });
        
        return false;
    }
</script>

<?= view('admin/layouts/footer'); ?>