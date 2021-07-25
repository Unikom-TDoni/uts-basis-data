<?= view('admin/layouts/header'); ?>

  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="md md-home"></i> Cabang</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?= site_url('admin')?>">Admin</a></li>
                        <li class="active">Cabang</li>
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
                                <th>Nama Cabang</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Provinsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            <?php foreach ($cabang as $data): ?>
                            <tr class="gradeX">
                                <td><?= $data['nama_cabang'] ?></td>
                                <td><?= $data['telp'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['nama_kota'] ?></td>
                                <td><?= $data['nama_provinsi'] ?></td>
                                <td class="actions">
                                    <button class="btn btn-icon btn-sm btn-success" onclick="edit(<?= $data['id_cabang'] ?>)"> <i class="fa fa-edit"></i> </button> 
                                    <button class="btn btn-icon btn-sm btn-danger" onclick="hapus(<?= $data['id_cabang'] ?>)"> <i class="fa fa-trash"></i> </button>
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
                <h4 class="modal-title">Cabang</h4> 
            </div> 
            
            <form id="form_input" action="<?= site_url('admin/cabang/save') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id"> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Nama Cabang</label> 
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Cabang" required> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Provinsi</label>
                                <select class="form-control" id="provinsi" name="provinsi" onchange="getKota(this.value)" required>
                                    <option value="">--Pilih Provinsi--</option>
                                    <?php foreach ($provinsi as $p): ?>
                                        <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Kota</label> 
                                <select class="form-control" id="kota" name="kota" required>
                                    <option value="">--Pilih Kota--</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">No. Telp</label> 
                                <input type="text" class="form-control" id="telp" name="telp" placeholder="No. Telp Cabang" required> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-7" class="control-label">Alamat</label> 
                                <textarea class="form-control autogrow" id="alamat" name="alamat" placeholder="Alamat Cabang" rows="4" required></textarea>
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
    function getKota(id_provinsi, id_kota = '')
    {
        $("#kota").html('');
        $.ajax(
        {
            url:"<?= site_url('admin/cabang/getKota') ?>",
            type: "POST",
            data: {
                id_provinsi: id_provinsi
            },
            dataType : 'json',
            success: function(result)
            {
                $("#kota").append('<option value="">--Pilih Kota--</option>');
                $.each(result,function(key,value)
                {
                    selected = (id_kota != "" && id_kota == value.id)?"selected":"";

                    $("#kota").append('<option value="'+value.id+'" '+selected+'>'+value.nama+'</option>');
                });
            }
        });
    }

    function tambah()
    {
        $('#edit').modal('show');
        $('#form_input').trigger('reset');
    }

    function edit(id_cabang)
    {
        $('#edit').modal('show');

        $.ajax(
        {
            url:"<?= site_url('admin/cabang/data') ?>",
            type: "POST",
            data: {
                id: id_cabang,
            },
            dataType : 'json',
            success: function(result)
            {
                value = result;
                
                getKota(value.id_provinsi, value.id_kota);
                $("#id").val(id_cabang);
                $("#nama").val(value.nama_cabang);
                $("#telp").val(value.telp);
                $("#provinsi").val(value.id_provinsi);
                $("#kota").val(value.id_kota);
                $("#alamat").val(value.alamat);
            }
        });
    }

    function hapus(id_cabang)
    {
        if(!confirm("Apakah anda yakin?")) 
        {
            return false;
        }

        $.ajax(
        {
            url: "<?= site_url('admin/cabang/delete') ?>",
            type: 'POST',
            data: 
            {
                id: id_cabang
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