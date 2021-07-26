<?= view('admin/layouts/header'); ?>

  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="fa fa-car"></i> Mobil</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?= site_url('admin')?>">Admin</a></li>
                        <li class="active">Mobil</li>
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
                                <th>Nomor Plat</th>
                                <th>Merk</th>
                                <th>Tahun</th>
                                <th>Kapasitas</th>
                                <th>Aktifasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            <?php foreach ($mobil as $data): ?>
                            <?php
                                $aktifasi       = ($data['is_aktif'])?"AKTIF":"NON-AKTIF"; 
                                $aktifasi_btn   = ($data['is_aktif'])?"info":"danger";
                                $row_bg         = ($data['is_aktif'])?"":"background: red;color: white;";
                            ?>

                            <tr class="gradeX" style="<?= $row_bg ?>">
                                <td><?= $data['nomor_plat'] ?></td>
                                <td><?= $data['merk'] ?></td>
                                <td><?= $data['tahun'] ?></td>
                                <td><?= $data['kapasitas'] ?> Kursi</td>
                                <td>    
                                    <button class="btn btn-icon btn-sm btn-<?= $aktifasi_btn ?>" onclick="ubahAktifasi(<?= $data['id_mobil'] ?>)"> <?= $aktifasi ?> </button>
                                </td>
                                <td class="actions" width="10%">
                                    <button class="btn btn-icon btn-sm btn-success" onclick="edit(<?= $data['id_mobil'] ?>)"> <i class="fa fa-edit"></i> </button> 
                                    <button class="btn btn-icon btn-sm btn-danger" onclick="hapus(<?= $data['id_mobil'] ?>)"> <i class="fa fa-trash"></i> </button>
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
                <h4 class="modal-title">Mobil</h4> 
            </div> 
            
            <form id="form_input" action="<?= site_url('admin/mobil/save') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id"> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Nomor Plat</label>
                                <input type="text" class="form-control" id="nomor_plat" name="nomor_plat" placeholder="Nomor Plat" required> 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Merk</label> 
                                <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk" required> 
                            </div>
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Tahun Pembuatan</label>
                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun Pembuatan" data-mask="9999" required> 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Kapasitas (Kursi)</label> 
                                <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas" min="0" required> 
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
            url:"<?= site_url('admin/mobil/data') ?>",
            type: "POST",
            data: {
                id: id,
            },
            dataType : 'json',
            success: function(result)
            {
                value = result;

                $("#id").val(id);
                $("#nomor_plat").val(value.nomor_plat);
                $("#merk").val(value.merk);
                $("#tahun").val(value.tahun);
                $("#kapasitas").val(value.kapasitas);
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
            url: "<?= site_url('admin/mobil/delete') ?>",
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
            url: "<?= site_url('admin/mobil/aktivasi') ?>",
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