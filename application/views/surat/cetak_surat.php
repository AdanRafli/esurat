<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Kelas Index</title>
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
            <h2>Cetak Surat</b></h2>
          </div>
          <div class="col-sm-7,5">
            <a type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#addSuratModal"><i class="material-icons">&#xE147;</i> <span>Add Surat</span></a>
                  
          </div>
          <br>
        </div>
      </div>
      <table id="example" class="display table table-bordered" style="width:100%">
        <thead>
          <tr class="table-warning">
            <th class="text-center">No</th>
            <th>Nomor Surat</th>
            <th>Lampiran</th>
            <th>Perihal</th>
            <th>Tanggal Surat</th>
            <th>Perusahaan</th>
            <th>Alamat Perusahaan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no = 1;
          foreach ($surat as $srt) {
        ?>
          <tr>  
            <td class="text-center"><?= $no++ ;?></td>
            <td><?= $srt['nomor'];?></td>
            <td><?= $srt['lampiran']; ?></td>
            <td><?= $srt['perihal']; ?></td>
            <td><?= $srt['tgl_surat']; ?></td>
            <td><?= $srt['perusahaan']; ?>
            <td><?= $srt['almt_perusahaan']; ?></td>
            <td>
              <a type="button" class="btn btn-secondary" href="">Cetak</a>
              <br>
              <a type="button" class="btn btn-success" data-toggle="modal" data-target="#editModalSurat<?= $srt['IdCetak']; ?> ">Edit</a>
              &nbsp;
              <a onclick="return confirm('apakah anda yakin ingin menghapus data?')" href="<?= base_url(); ?>cetak_surat/hapus_surat/<?= $srt['IdCetak']; ?>" type="button" class="btn btn-danger">Hapus</a>
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
<div class="modal fade" id="addSuratModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url(); ?>Surat/tambah_surat" method="POST">          
      <div class="form-group">
      <div class="row">
        <div class="col">
        <label>Nomor</label>
        <input name="nomor" type="text" class="form-control" placeholder="Nomor" id="nomor">
        </div>
        <div class="col">
        <label>Lampiran</label>
        <input name="lampiran" type="text" class="form-control" placeholder="Lampiran" id="lampiran">
        </div>
        <div>
        <label>Perihal</label>
        <input name="perihal" type="text" class="form-control" placeholder="Perihal" id="perihal">
        </div>    
        <div class="col">
        <label>Tanggal</label>
        <input name="tgl_surat" type="date" class="form-control" id="tgl_surat">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal" value="Cancel">Cancel</button>
          <button type="reset" class="btn btn-danger">Reset</button>
          <button type="submit" class="btn btn-success" name="save">Tambah</button>
        </div>
        </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->
<?php 
$no=0;
foreach ($surat as $srt) { $no++;
?>
<div class="modal fade" id="editModalSurat<?= $srt['IdCetak'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url(); ?>Cetak_surat/edit_surat" method="POST">
      <input type="hidden" name="IdCetak" id="IdCetak" value="<?= $srt['IdCetak']?>">
      <div class="form-group">
      <div class="row">
        <div class="col">
        <label>Lampiran</label>
        <input name="lampiran" type="text" value="<?= $srt['lampiran']; ?>" class="form-control" placeholder="Lampiran" id="lampiran">
        </div>
        <div class="col">
        <label>Perihal</label>
        <input name="perihal" type="text" value="<?= $srt['perihal']; ?>" class="form-control" placceholder="Perihal" id="perihal" >
        </div>
        </div>                
        <div class="row">
        <div class="col">
        <label>Tanggal Surat</label>
        <input name="tgl_surat" type="date" value="<?= $srt['tgl_surat']; ?>" class="form-control" placeholder="" id="tgl_surat">
        </div>
        <div class="col">
        <label>Perusahaan</label>
        <input name="perusahaan" type="text" value="<?= $srt['perusahaan']; ?>" class="form-control" placceholder="Nama Perusahaan" id="perusahaan" >
        </div>
        </div> 
        <div class="col">
        <label>Alamat Perusahaan</label>
        <input name="almt_perusahaan" type="text" value="<?= $srt['almt_perusahaan']; ?>" class="form-control" placeholder="Alamat Perusahaan" id="almt_perusahaan">
        </div>
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal" value="Cancel">Cancel</button>
          <button type="submit" class="btn btn-success" name="save">Edit</button>
        </div>
        </div>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

</body>
</html>