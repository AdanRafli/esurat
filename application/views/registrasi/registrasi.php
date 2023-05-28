<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Data User Index</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="">
        <?php if ($this->session->flashdata('success')) { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil</strong> <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

          <div class="col-sm-6">
            <h2><b>Data User</b></h2>
          </div>
          <div class="col-sm-7,5">
            <a type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#addUserModal"><i class="material-icons">&#xE147;</i> <span>Add User</span></a>
                  
          </div>
          <br>
        </div>
      </div>
      <table id="example" class="display table table-bordered" style="width:100%">
        <thead>
          <tr class="table-secondary">
            <th class="text-center">No</th>
            <th>Username</th>
            <!-- <th>Password</th> -->
            <th>Nama</th>
            <th>Akses</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no = 1;
          foreach ($user as $usr) {
        ?>
          <tr>  
            <td class="text-center"><?=$no++ ;?></td>
            <td><?= $usr['username']; ?></td>
            <!-- <td><?= $usr['password']; ?></td> -->
            <td><?= $usr['nama']; ?></td>
            <td><?= $usr['akses']; ?></td>
            <td><?= $usr['email']; ?></td>
            <td>
              <a type="button" class="btn btn-success" data-toggle="modal" data-target="#editmodal<?= $usr['id_user']; ?> ">Edit</a>
              <a onclick="return confirm('apakah anda yakin ingin menghapus data?')" href="<?= base_url(); ?>Registrasi/hapus_user/<?= $usr['id_user']; ?>" type="button" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
      </script>
    </div>
  </div>        
</div>
<!-- ADD Modal HTML -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url(); ?>registrasi/tambah_user" method="POST">          
        <div class="form-group">
          <label for="username">Username</label>
          <input class="form-control form-control-sm" type="text" id="username" name="username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control form-control-sm" type="password" id="password" name="password">
        </div>
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control form-control-sm" type="text" id="nama" name="nama">
          </div>
          <div class="form-group">
            <label for="akses">Hak Akses</label>
            <select name="akses" class="form-control" id="akses">
            <option value="Admin">Admin</option>
            <option value="User">User</option>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control form-control-sm" type="text" id="email" name="email">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal" value="Cancel">Cancel</button>
          <button type="reset" class="btn btn-danger" >Reset</button>
          <button type="submit" class="btn btn-success" name="save">Tambah</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->
<?php 
$no=0;
foreach ($user as $usr) { $no++;
?>
<div class="modal fade" id="editmodal<?= $usr['id_user'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url(); ?>registrasi/edit_user" method="POST">
      <input type="hidden" name="id_user" id="user" value="<?= $usr['id_user']?>">      
        <div class="form-group">
          <label>Username</label>
          <input class="form-control form-control-sm" value="<?php echo $usr['username'];?>" type="text" id="username" name="username">
          </div>
        <div class="form-group">
          <label>Password</label>
          <input class="form-control form-control-sm" value="<?php echo $usr['password'];?>" type="password" id="password" name="password">
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control form-control-sm" value="<?php echo $usr['nama'];?>" type="text" id="nama" name="nama">
          </div>
          <div class="form-group">
            <label for="akses">Akses</label>
            <select name="akses" class="form-control" id="akses">
            <option><?= $usr['akses'];?></option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control form-control-sm" value="<?php echo $usr['email'];?>" type="text" id="email" name="email">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal" value="">Cancel</button>
          <button type="submit" class="btn btn-success" name="submit">Edit</buttom>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

</body>
</html>