<?= view('admin/layouts/header'); ?>

  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="md md-view-list"></i> Rute</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?= site_url('admin')?>">Admin</a></li>
                        <li class="active">Rute</li>
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
                                <th>Cabang Asal</th>
                                <th>Kota Asal</th>
                                <th>Cabang Tujuan</th>
                                <th>Kota Tujuan</th>
                                <th>Harga Tiket</th>
                                <th>Jarak Tempuh</th>
                                <th>Waktu Tempuh</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            <?php foreach ($rute as $data): ?>
                            <tr class="gradeX">
                                <td><?= $data['nama_cabang_asal'] ?></td>
                                <td><?= $data['kota_asal'] ?></td>
                                <td><?= $data['nama_cabang_tujuan'] ?></td>
                                <td><?= $data['kota_tujuan'] ?></td>
                                <td><?= "Rp " . number_format($data['harga_tiket']) ?></td>
                                <td><?= $data['jarak_tempuh'] ?> km</td>
                                <td><?= $data['waktu_tempuh'] ?> menit</td>
                                <td class="actions" width="10%">
                                    <button class="btn btn-icon btn-sm btn-success" onclick="edit(<?= $data['id_rute'] ?>)"> <i class="fa fa-edit"></i> </button> 
                                    <button class="btn btn-icon btn-sm btn-danger" onclick="hapus(<?= $data['id_rute'] ?>)"> <i class="fa fa-trash"></i> </button>
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
                <h4 class="modal-title">Rute</h4> 
            </div> 
            
            <form action="<?= site_url('admin/rute/save') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id"> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Cabang Asal</label>
                                <select class="form-control" id="cabang_asal" name="cabang_asal" onchange="getCabangTujuan(this.value)" required>
                                    <option value="">--Pilih Cabang--</option>           
                                    <?php foreach ($cabang as $c): ?>
                                    <option value="<?= $c['id_cabang']?>"><?= $c['nama_cabang']?></option> 
                                    <?php endforeach; ?>
                                </select>
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Cabang Tujuan</label> 
                                <select class="form-control" id="cabang_tujuan" name="cabang_tujuan" required>
                                    <option value="">--Pilih Cabang--</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Harga Tiket</label>
                                <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" placeholder="Harga Tiket" min="0" required> 
                            </div> 
                        </div>
                    </div> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label class="control-label">Jarak Tempuh (km)</label>
                                <input type="number" class="form-control" id="jarak_tempuh" name="jarak_tempuh" placeholder="Jarak Tempuh" required> 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Waktu Tempuh (menit)</label> 
                                <input type="number" class="form-control" id="waktu_tempuh" name="waktu_tempuh" placeholder="Waktu Tempuh" required> 
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
    function getCabangTujuan(id_cabang_asal, id_cabang_tujuan = '')
    {
        $("#cabang_tujuan").html('');
        $.ajax(
        {
            url:"<?= site_url('admin/cabang/getListCabang') ?>",
            type: "POST",
            data: {
                id: id_cabang_asal
            },
            dataType : 'json',
            success: function(result)
            {
                $("#cabang_tujuan").append('<option value="">--Pilih Cabang--</option>');
                $.each(result,function(key,value)
                {
                    selected = (id_cabang_tujuan != "" && id_cabang_tujuan == value.id_cabang)?"selected":"";

                    $("#cabang_tujuan").append('<option value="'+value.id_cabang+'" '+selected+'>'+value.nama_cabang+'</option>');
                });
            }
        });
    }

    function tambah()
    {
        $('#edit').modal('show');
        resetValue();
    }

    function edit(id)
    {
        $('#edit').modal('show');

        $.ajax(
        {
            url:"<?= site_url('admin/rute/data') ?>",
            type: "POST",
            data: {
                id: id,
            },
            dataType : 'json',
            success: function(result)
            {
                value = result;
                
                getCabangTujuan(value.id_cabang_asal, value.id_cabang_tujuan);
                $("#id").val(id);
                $("#cabang_asal").val(value.id_cabang_asal);
                $("#cabang_tujuan").val(value.id_cabang_tujuan);
                $("#harga_tiket").val(value.harga_tiket);
                $("#jarak_tempuh").val(value.jarak_tempuh);
                $("#waktu_tempuh").val(value.waktu_tempuh);
            }
        });
    }

    function resetValue()
    {
        $("#id").val("");
        $("#cabang_asal").val("");
        $("#cabang_tujuan").val("");
        $("#harga_tiket").val("");
        $("#jarak_tempuh").val("");
        $("#waktu_tempuh").val("");
    }

    function hapus(id)
    {
        if(!confirm("Apakah anda yakin?")) 
        {
            return false;
        }

        $.ajax(
        {
            url: "<?= site_url('admin/rute/delete') ?>",
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