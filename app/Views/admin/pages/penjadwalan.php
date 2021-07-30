<?= view('admin/layouts/header'); ?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="md md-alarm"></i> Penjadwalan</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?= site_url('admin')?>">Admin</a></li>
                        <li class="active">Penjadwalan</li>
                    </ol>
                </div>
            </div>

            <div class="panel">          
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form_cari" action="<?= site_url('admin/penjadwalan') ?>" method="post" class="form-inline" role="form">
                                <div class="form-group col-md-3">
                                    <center><label>Tanggal Berangkat</label></center>
                                    <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" value="<?= $tgl_berangkat ?>" onchange="getListTransaksi()" style="width: 100%;">
                                </div>
                                <div class="form-group col-md-4"">
                                    <center><label>Cabang Asal</label></center>
                                    <select class="form-control" id="cabang_asal" name="cabang_asal" onchange="getCabangTujuan()" style="width: 100%;" required>
                                        <option value="">--Pilih Cabang Asal--</option>           
                                        <?php foreach ($cabang as $c): ?>
                                        <?php $selected = ($cabang_asal == $c['id_cabang'])?"selected":"" ?>
                                        <option value="<?= $c['id_cabang']?>" <?= ($cabang_asal == $c['id_cabang'])?"selected":"" ?>><?= $c['nama_cabang']?></option> 
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4"">
                                    <center><label>Cabang Tujuan</label></center>
                                    <select class="form-control" id="rute" name="rute" style="width: 100%;" required>
                                        <option value="">--Pilih Cabang Tujuan--</option>
                                    </select>
                                    <input type="hidden" id="id_rute" name="id_rute" value="<?= $rute ?>">
                                </div>      
                                <button type="submit" class="btn btn-inverse waves-effect waves-light m-l-10" style="margin-top: 25px;"><i class="fa fa-search"> Cari</i></button>
                            </form>
                        </div>
                    </div>

                    <hr>

                    <span id="showdata" style="display: <?= $display_jadwal ?>;">
                        <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Rute</th>
                                <th>Jam Berangkat</th>
                                <th>Mobil</th>
                                <th>Sopir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($jadwal)): ?>
                                <?php foreach ($jadwal as $data): ?>
                                <tr class="gradeX" style="<?= $row_bg ?>">
                                    <td><?= $data['nama_rute'] ?></td>
                                    <td><?= $data['jam_berangkat'] ?></td>
                                    <td><?= !empty($data['mobil'])?$data['mobil']:"-BELUM DIATUR-" ?></td>
                                    <td><?= !empty($data['nama_sopir'])?$data['nama_sopir']:"-BELUM DIATUR-" ?></td>
                                    <td class="actions" width="10%">
                                        <button class="btn btn-sm btn-primary" onclick="showDialogPenjadwalan(<?= $data['id_jadwal'] ?>, '<?= $data['id_mobil'] ?>', '<?= $data['id_sopir'] ?>')"> Atur Mobil & Sopir </button> 
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>     
                        </table>
                    </span>
                    
                </div>
                <!-- end: page -->
            </div> <!-- end Panel -->
        </div>
    </div>
</div>

<div id="modal_penjadwalan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Atur Penjadwalan</h4> 
            </div> 
            
            <form id="form_input_penjadwalan" method="post" enctype="multipart/form-data">
                <input type="hidden" id="id_jadwal" name="id_jadwal">
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Mobil</label> 
                                <select class="form-control" id="id_mobil" name="id_mobil" required>
                                    <option value="">--Pilih Mobil--</option>           
                                    <?php foreach ($mobil as $m): ?>
                                    <option value="<?= $m['id_mobil']?>"><?= $m['nomor_plat'] . " ($m[merk])"?></option> 
                                    <?php endforeach; ?>
                                </select>    
                            </div> 
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Sopir</label> 
                                <select class="form-control" id="id_sopir" name="id_sopir" required>
                                    <option value="">--Pilih Sopir--</option>           
                                    <?php foreach ($sopir as $s): ?>   
                                    <option value="<?= $s['id_sopir'] ?>"><?= $s['nama'] ?></option> 
                                    <?php endforeach; ?>
                                </select>    
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button> 
                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="simpanPenjadwalan()">Simpan <i class="fa fa-save"></i></button> 
                </div> 
            </form>
        </div> 
    </div>
</div><!-- /.modal -->

<script>
    window.onload = function(e)
    {
        getCabangTujuan($("#id_rute").val());
    }

    function getCabangTujuan(id_rute = '')
    {
        $("#rute").html('');
        $("#jadwal").val('');
        
        $.ajax(
        {
            url:"<?= site_url('admin/transaksi/getCabangTujuan') ?>",
            type: "POST",
            data: {
                id: $("#cabang_asal").val()
            },
            dataType : 'json',
            success: function(result)
            {
                $("#rute").append('<option value="">--Pilih Cabang Tujuan--</option>');
                $.each(result,function(key,value)
                {
                    selected = (id_rute != "" && id_rute == value.id_rute)?"selected":"";

                    $("#rute").append('<option value="'+value.id_rute+'" '+selected+'>'+value.nama_cabang+'</option>');
                });
            }
        });
    }

    function showDialogPenjadwalan(id_jadwal, id_mobil, id_sopir)
    {
        $('#modal_penjadwalan').modal('show');
        $("#id_jadwal").val(id_jadwal);
        $("#id_mobil").val(id_mobil);
        $("#id_sopir").val(id_sopir);
    }

    function simpanPenjadwalan()
    {
        if($("#id_mobil").val() == "")
        {
            alert("Harap isi data mobil!");
            return false;
        }
        
        if($("#id_sopir").val() == "")
        {
            alert("Harap isi data sopir!");
            return false;
        }

        $.ajax(
        {
            url:"<?= site_url('admin/penjadwalan/save') ?>",
            type: "POST",
            data: {
                tgl_berangkat: $("#tgl_berangkat").val(),
                id_jadwal: $("#id_jadwal").val(),
                id_mobil: $("#id_mobil").val(),
                id_sopir: $("#id_sopir").val()
            },
            dataType : 'json',
            success: function(result)
            {
                if(result.status != "OK")
                {
                    alert(result.message);
                    return false;
                }
                else
                {
                    $('#modal_penjadwalan').modal('hide');
                    
                    swal({
                        title: "Berhasil!",
                        text: result.message,
                        type: "success"
                    }, function() {
                        $('#form_cari').submit();
                    });
                }
            }
        });
    }
</script>

<?= view('admin/layouts/footer'); ?>