<?= view('admin/layouts/header'); ?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="fa fa-cart-plus"></i> Tambah Transaksi</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?= site_url('admin')?>">Admin</a></li>
                        <li class="active">Transaksi</li>
                    </ol>
                </div>
            </div>

            <div class="panel">          
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?= site_url('admin/transaksi/add') ?>" method="post" class="form-inline" role="form">
                                <div class="form-group col-md-2">
                                    <center><label>Tanggal Berangkat</label></center>
                                    <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat" value="<?= $tgl_berangkat ?>" onchange="getListTransaksi()" style="width: 100%;">
                                </div>
                                <div class="form-group col-md-3"">
                                    <center><label>Cabang Asal</label></center>
                                    <select class="form-control" id="cabang_asal" name="cabang_asal" onchange="getCabangTujuan()" style="width: 100%;" required>
                                        <option value="">--Pilih Cabang Asal--</option>           
                                        <?php foreach ($cabang as $c): ?>
                                        <?php $selected = ($cabang_asal == $c['id_cabang'])?"selected":"" ?>
                                        <option value="<?= $c['id_cabang']?>" <?= ($cabang_asal == $c['id_cabang'])?"selected":"" ?>><?= $c['nama_cabang']?></option> 
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3"">
                                    <center><label>Cabang Tujuan</label></center>
                                    <select class="form-control" id="rute" name="rute" onchange="getJadwal()" value="<?= $rute ?>" style="width: 100%;" required>
                                        <option value="">--Pilih Cabang Tujuan--</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3"">
                                    <center><label>Jadwal</label></center>
                                    <select class="form-control" id="jadwal" name="jadwal" value="<?= $jadwal ?>" onchange="getListTransaksi()" style="width: 100%;" required>
                                        <option value="">--Pilih Jadwal--</option>
                                    </select>
                                </div>
                                            
                                <button type="button" class="btn btn-inverse waves-effect waves-light m-l-10" style="margin-top: 25px;" onclick="getListTransaksi()"><i class="fa fa-search"> Cari</i></button>
                            </form>
                        </div>
                    </div>

                    <hr>

                    <span id="showdata" style="display: none;">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th width="15%">Rute</th>
                                        <td width="20%" id="ket_rute"></td>

                                        <th width="15%">Kapasitas</th>
                                        <td width="15%" id="ket_kapasitas"></td>

                                        <th width="15%">Mobil</th>
                                        <td width="20%" id="ket_mobil"></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Berangkat</th>
                                        <td id="ket_berangkat"></td>
                                        
                                        <th>Kursi Terisi</th>
                                        <td id="ket_kursi_terisi"></td>

                                        <th>Sopir</th>
                                        <td id="ket_sopir"></td>
                                    </tr>
                                    <tr>
                                        <th>Harga Tiket</th>
                                        <td id="ket_harga_tiket"></td>

                                        <th>Kursi Tersedia</th>
                                        <td id="ket_kursi_tersedia"></td>
                                        
                                        <td colspan="2" style="text-align: center;">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="align-text: center;">
                                <div class="m-b-10">
                                    <center>
                                        <button class="btn btn-primary" onclick="showDialogTambahTransaksi()">Tambah <i class="fa fa-plus"></i></button>
                                    </center>
                                </div>
                            </div>
                        </div>

                        <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Nomor<br>Kursi</th>
                                <th>Nomor<br>Transaksi</th>
                                <th>Nama</th>
                                <th>Telp</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>      
                        </table>
                    </span>
                    
                </div>
                <!-- end: page -->
            </div> <!-- end Panel -->
        </div>
    </div>
</div>

<div id="modal_transaksi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Tambah Transaksi</h4> 
            </div> 
            
            <form id="form_input_transaksi" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Telp Pelanggan</label> 
                                <input class="form-control" type="text" id="telp" name="telp" placeholder="Telp Pelanggan" onblur="getDataPelanggan()" required>
                            </div> 
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Nama Pelanggan</label> 
                                <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama Pelanggan" required>
                            </div> 
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Nomor Kursi</label> 
                                <select class="form-control" id="nomor_kursi" name="nomor_kursi" required>
                                    
                                </select>    
                            </div> 
                        </div> 
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button> 
                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="simpanTransaksi()">Simpan <i class="fa fa-save"></i></button> 
                </div> 
            </form>
        </div> 
    </div>
</div><!-- /.modal -->

<div id="modal_detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Transaksi</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal row" role="form">        
                    <div class="col-md-6">                                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nomor Transaksi : </label>
                            <div class="col-md-8 form-control-static">
                                <span id="d_nomor_transaksi"></span>
                                <input type="hidden" id="nomor_transaksi" name="nomor_transaksi">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tgl Berangkat : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_tgl_berangkat"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Jam Berangkat : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_jam_berangkat"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Rute : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_rute"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cabang Asal : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_cabang_asal"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cabang Tujuan : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_cabang_tujuan"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Mobil : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_mobil"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sopir : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_sopir"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Telp Pelanggan : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_telp"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Pelanggan : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_nama"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nomor Kursi : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_nomor_kursi"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Harga Tiket : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_harga_tiket"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status : </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_status"></span>
                            </div>
                        </div>
                        <div class="form-group" id="show_waktu" style="display: none;">
                            <label class="col-md-4 control-label">Waktu <span id="d_status2"></span>: </label>
                            <div class="col-md-8 form-control-static">    
                                <span id="d_waktu"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button id="btn_cetak" type="button" class="btn btn-primary waves-effect waves-light" onclick="cetak()"><i class="fa fa-ticket"></i> Cetak Transaksi</button>
                <button id="btn_lunas" type="button" class="btn btn-success waves-effect waves-light" onclick="ubahStatus('lunas')"><i class="fa fa-money"></i> Lunasi Transaksi</button>
                <button id="btn_batal" type="button" class="btn btn-danger waves-effect waves-light" onclick="ubahStatus('batal')"><i class="fa fa-times"></i> Batalkan Transaksi</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    var kapasitas           = 0;
    var list_kursi_terisi   = [];

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

    function getJadwal(id_jadwal = '')
    {
        $("#jadwal").html('');
        $.ajax(
        {
            url:"<?= site_url('admin/transaksi/getJadwal') ?>",
            type: "POST",
            data: {
                tgl_berangkat: $("#tgl_berangkat").val(),
                id: $("#rute").val()
            },
            dataType : 'json',
            success: function(result)
            {
                $("#jadwal").append('<option value="">--Pilih Jadwal--</option>');
                
                $.each(result.jadwal,function(key,value)
                {
                    $("#jadwal").append('<option value="'+value.id_jadwal+'" '+selected+'>'+value.jam_berangkat+'</option>');
                });
            }
        });
    }

    function getListTransaksi()
    {
        if(!$("#jadwal").val())
        {
            $('#showdata').hide();
            return false;
        }

        $('#showdata').show();
        $('#datatable').dataTable().fnClearTable();
        list_kursi_terisi = [];

        $.ajax(
        {
            url:"<?= site_url('admin/transaksi/getTransaksi') ?>",
            type: "POST",
            data: {
                tgl_berangkat: $("#tgl_berangkat").val(),
                id_jadwal: $("#jadwal").val()
            },
            dataType : 'json',
            success: function(result)
            {
                data_penjadwalan    = result.penjadwalan;
  
                $('#ket_rute').html(data_penjadwalan.rute);
                $('#ket_berangkat').html(data_penjadwalan.waktu_berangkat);
                $('#ket_harga_tiket').html(data_penjadwalan.harga_tiket);
                $('#ket_kapasitas').html(data_penjadwalan.kapasitas + ' Kursi');
                $('#ket_kursi_terisi').html(data_penjadwalan.kursi_terisi + ' Kursi');
                $('#ket_kursi_tersedia').html((data_penjadwalan.kursi_tersedia)  + ' Kursi');
                $('#ket_mobil').html(data_penjadwalan.mobil);
                $('#ket_sopir').html(data_penjadwalan.sopir);

                $('#id_mobil').val(data_penjadwalan.id_mobil);
                $('#id_sopir').val(data_penjadwalan.id_sopir);
                kapasitas = data_penjadwalan.kapasitas;

                $i=0;
                $.each(result.transaksi,function(key,value)
                {
                    list_kursi_terisi[$i] = value.nomor_kursi;
                    $i++;

                    if(value.status=="BOOKED")
                    {
                        label_status = "info";
                    }
                    else if(value.status=="PAID")
                    {
                        label_status = "success";
                    }
                    else if(value.status=="CANCELLED")
                    {
                        label_status = "danger";
                    }
                    else
                    {
                        label_status = "";
                    }

                    status  = '<label class="label label-'+label_status+'">'+value.status+'</label>';
                    detail  = '<a href="#" class="btn btn-icon btn-sm btn-warning" onclick="showDetailTransaksi(\''+value.nomor_transaksi+'\')"><i class="fa fa-eye"></i> Detail</a>';
                    data    = [value.nomor_kursi, value.nomor_transaksi, value.nama, value.telp, status, detail];
                    $('#datatable').dataTable().fnAddData(data);
                });
            }
        });
    }

    function showDialogTambahTransaksi()
    {
        if(kapasitas == list_kursi_terisi.length)
        {
            alert('Gagal! Semua Kursi sudah terisi!');
            return false;
        }

        $('#modal_transaksi').modal('show');
        $('#form_input_transaksi').trigger('reset');
        $("#nomor_kursi").html('');
        
        for (var i = 1; i <= kapasitas; i++) 
        {
            if(!list_kursi_terisi.includes(i.toString()))
            {
                $("#nomor_kursi").append('<option value="'+i+'">'+i+'</option>');
            }
        }
    }

    function getDataPelanggan()
    {
        $.ajax(
        {
            url:"<?= site_url('admin/pelanggan/data') ?>",
            type: "POST",
            data: {
                telp: $("#telp").val()
            },
            dataType : 'json',
            success: function(value)
            {
                $("#nama").val(value.nama);
            }
        });
    }

    function simpanTransaksi()
    {
        if($("#telp").val() == "")
        {
            alert("Harap isi Telp Pelanggan!");
            return false;
        }
        
        if($("#nama").val() == "")
        {
            alert("Harap isi Nama Pelanggan!");
            return false;
        }

        $.ajax(
        {
            url:"<?= site_url('admin/transaksi/save') ?>",
            type: "POST",
            data: {
                tgl_berangkat: $("#tgl_berangkat").val(),
                id_jadwal: $("#jadwal").val(),
                telp: $("#telp").val(),
                nama: $("#nama").val(),
                nomor_kursi: $("#nomor_kursi").val()
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
                    $('#modal_transaksi').modal('hide');
                    
                    swal({
                        title: "Berhasil!",
                        text: result.message,
                        type: "success"
                    }, function() {
                        getListTransaksi();
                    });
                }
            }
        });
    }

    function showDetailTransaksi(nomor_transaksi)
    {
        $('#modal_detail').modal('show');

        $.ajax(
        {
            url:"<?= site_url('admin/transaksi/data') ?>",
            type: "POST",
            data: {
                nomor_transaksi: nomor_transaksi
            },
            dataType : 'json',
            success: function(data)
            {
                $('#nomor_transaksi').val(data.nomor_transaksi);
                $('#d_nomor_transaksi').html(data.nomor_transaksi);
                $('#d_tgl_berangkat').html(data.tgl_berangkat);
                $('#d_jam_berangkat').html(data.jam_berangkat);
                $('#d_rute').html(data.nama_rute);
                $('#d_cabang_asal').html(data.cabang_asal);
                $('#d_cabang_tujuan').html(data.cabang_tujuan);

                $('#d_mobil').html(data.mobil);
                $('#d_sopir').html(data.nama_sopir);

                $('#d_telp').html(data.telp);
                $('#d_nama').html(data.nama);
                $('#d_nomor_kursi').html(data.nomor_kursi);
                $('#d_harga_tiket').html(data.harga_tiket);

                show_btn_cetak  = true;
                show_btn_lunas  = true;
                show_btn_batal  = true;

                if(data.status=="BOOKED")
                {
                    label_status    = "info";
                    show_waktu      = false;
                    status2         = "";
                    waktu           = "";
                    
                    $('#show_waktu').hide();
                }
                else if(data.status=="PAID")
                {
                    label_status    = "success";
                    show_waktu      = true;
                    status2         = "Lunas";
                    waktu           = data.waktu_lunas;
                    show_btn_lunas  = false;
                }
                else
                {
                    label_status    = "danger";
                    show_waktu      = true;
                    status2         = "Batal";
                    waktu           = data.waktu_batal;
                    show_btn_cetak  = false;
                    show_btn_lunas  = false;
                    show_btn_batal  = false;
                }

                status  = '<label class="label label-'+label_status+'">'+data.status+'</label>';

                $('#d_status').html(status);
                $('#d_status2').html(status2);
                $('#d_waktu').html(waktu);

                (show_waktu)?$('#show_waktu').show():$('#show_waktu').hide();
                (show_btn_cetak)?$('#btn_cetak').show():$('#btn_cetak').hide();
                (show_btn_lunas)?$('#btn_lunas').show():$('#btn_lunas').hide();
                (show_btn_batal)?$('#btn_batal').show():$('#btn_batal').hide();
            }
        });
    }
    
    function ubahStatus(jenis)
    {
        if(!confirm("Apakah anda yakin??"))
        {
            return false;
        }

        $.ajax(
        {
            url:"<?= site_url('admin/transaksi/status') ?>",
            type: "POST",
            data: {
                nomor_transaksi: $("#nomor_transaksi").val(),
                jenis: jenis
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
                    swal({
                        title: "Berhasil!",
                        text: result.message,
                        type: "success"
                    }, function() {
                        getListTransaksi();
                        showDetailTransaksi($("#nomor_transaksi").val());
                    });
                }
            }
        });
    }

    function cetak()
    {
        _formcetak          = document.createElement("form");
        _formcetak.method   = "post";
        _formcetak.action   = "<?= site_url('admin/transaksi/print') ?>";
        _formcetak.target   = "_blank";

        _nomor_transaksi       = document.createElement("input");
        _nomor_transaksi.type  = "hidden";
        _nomor_transaksi.name  = "nomor_transaksi";
        _nomor_transaksi.value = $("#nomor_transaksi").val();
        _formcetak.appendChild(_nomor_transaksi);

        document.body.appendChild(_formcetak);
        _formcetak.submit();
    }
</script>

<?= view('admin/layouts/footer'); ?>