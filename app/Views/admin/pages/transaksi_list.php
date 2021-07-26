<?= view('admin/layouts/header'); ?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="fa fa-cart-plus"></i> List Transaksi</h4>
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
                            <form action="<?= site_url('admin/transaksi/list') ?>" method="post" class="form-inline" role="form" style="float: right;">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="<?= $tgl_awal ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?= $tgl_akhir ?>">
                                </div>
                                <div class="form-group">
                                    <label>Filter</label>
                                    <select class="form-control" id="filter" name="filter">
                                        <option value="0" <?= ($filter==0)?"selected":"" ?>>Semua Transaksi</option>
                                        <option value="1" <?= ($filter==1)?"selected":"" ?>>Transaksi Dibayar</option>
                                        <option value="2" <?= ($filter==2)?"selected":"" ?>>Transaksi Belum Dibayar</option>
                                        <option value="3" <?= ($filter==3)?"selected":"" ?>>Transaksi Batal</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-search"> Cari</i></button>
                            </form>
                        </div>
                    </div>

                    <hr>

                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Waktu <br> Berangkat</th>
                                <th>Nomor <br> Transaksi</th>
                                <th>Rute</th>
                                <th>Nomor <br> Kursi</th>
                                <th>Telp <br> Pelanggan</th>
                                <th>Nama <br> Pelanggan</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                <td><?= date("d-m-Y H:i", strtotime($data['tgl_berangkat'] ." ". $data['jam_berangkat'])) ?></td>
                                <td><?= $data['nomor_transaksi'] ?></td>
                                <td><?= $data['nama_rute'] ?></td>
                                <td><?= $data['nomor_kursi'] ?></td>
                                <td><?= $data['telp'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><label class="label <?= $label_status ?>"><?= $data['status'] ?></label></td>
                                <td>
                                    <a href="#" class="btn btn-icon btn-sm btn-warning" onclick="showDetailTransaksi('<?= $data['nomor_transaksi'] ?>')"><i class="fa fa-eye"></i> Detail</a>
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
                        location.reload();
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