<?= view('admin/layouts/header'); ?>

  <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title"><i class="fa fa-users"></i> Users</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?= site_url('admin')?>">Admin</a></li>
                        <li class="active">Users</li>
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
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Cabang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            <?php foreach ($users as $data): ?>
                            <tr class="gradeX">
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['nama_cabang'] ?></td>
                                <td class="actions">
                                    <button class="btn btn-icon btn-sm btn-success" onclick="edit('<?= $data['username'] ?>')"> <i class="fa fa-edit"></i> </button> 
                                    <button class="btn btn-icon btn-sm btn-danger" onclick="hapus('<?= $data['username'] ?>')"> <i class="fa fa-trash"></i> </button>
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
                <h4 class="modal-title">Users</h4> 
            </div> 
            
            <form action="<?= site_url('admin/users/save') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="username_old" name="username_old" value="">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Username</label> 
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required> 
                            </div> 
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Nama</label> 
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required> 
                            </div> 
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Cabang</label> 
                                <select class="form-control" id="cabang" name="cabang" required>
                                    <option value="">--Pilih Cabang--</option>           
                                    <?php foreach ($cabang as $c): ?>
                                    <option value="<?= $c['id_cabang']?>"><?= $c['nama_cabang']?></option> 
                                    <?php endforeach; ?>
                                </select>    
                            </div> 
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Password</label> 
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required> 
                            </div> 
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label class="control-label">Konfirmasi Password</label> 
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password" required> 
                            </div> 
                        </div> 
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button> 
                    <button type="button" id="submit" class="btn btn-primary waves-effect waves-light" onclick="simpan()">Simpan <i class="fa fa-save"></i></button> 
                </div> 
            </form>
        </div> 
    </div>
</div><!-- /.modal -->

<script>
    function tambah()
    {
        $('#edit').modal('show');
        resetValue();
    }

    function edit(username)
    {
        $('#edit').modal('show');

        $.ajax(
        {
            url:"<?= site_url('admin/users/data') ?>",
            type: "POST",
            data: {
                username: username,
            },
            dataType : 'json',
            success: function(result)
            {
                value = result;

                $("#username_old").val(username);
                $("#username").val(username);
                $("#nama").val(value.nama);
                $("#cabang").val(value.id_cabang);
            }
        });
    }

    function simpan()
    {
        if($("#username").val() == "")
        {
            alert("Harap isi username!");
            return false;
        }
        
        if($("#nama").val() == "")
        {
            alert("Harap isi nama!");
            return false;
        }

        if($("#cabang").val() == "")
        {
            alert("Harap isi cabang!");
            return false;
        }

        if($("#username_old").val() == "" && $("#password").val() == "")
        {
            alert("Harap isi password!");
            return false;
        }
        
        if($("#password").val() != $("#confirm_password").val())
        {
            alert("Konfirmasi Password Tidak Sesuai!");
            return false;
        }

        $.ajax(
        {
            url: "<?= site_url('admin/users/save') ?>",
            type: 'POST',
            data: 
            {
                username_old: $("#username_old").val(),
                username: $("#username").val(),
                nama: $("#nama").val(),
                cabang: $("#cabang").val(),
                password: $("#password").val()
            },
            success: function (request)
            {
                response = JSON.parse(request);
                
                if(response.status != "OK")
                {
                    alert(response.pesan);
                    return false;
                }
                else
                {
                    location.reload();
                }
            }
        });
        
        return false;
    }

    function resetValue()
    {
        $("#username_old").val("");
        $("#username").val("");
        $("#nama").val("");
        $("#cabang").val("");
        $("#password").val("");
        $("#confirm_password").val("");
    }

    function hapus(username)
    {
        if(!confirm("Apakah anda yakin?")) 
        {
            return false;
        }

        $.ajax(
        {
            url: "<?= site_url('admin/users/delete') ?>",
            type: 'POST',
            data: 
            {
                username: username
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