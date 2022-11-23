<style>
   body {
    background-image: url('color.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;

   }
 </style>
<h3 class="page-header">TAMBAHKAN BAHAN BARU</h3>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php 
  if (isset($_GET['st'])) {
    if ($_GET['st']==1) {
      echo "<div class='alert alert-warning'><strong>Berhasil Ditambahkan.</strong></div>";
    } elseif ($_GET['st']==2) {
      echo "<div class='alert alert-danger'><strong>Gagal Menambahkan.</strong></div>";
    } elseif ($_GET['st']==4) {
      echo "<div class='alert alert-danger'><strong>Semua kolom wajib di isi.</strong></div>";
    }
  }

 ?>
<form class="form-horizontal" role="form" style="width:80%" onSubmit="return validasi()" name="formulir" method="post" action="./model/proses.php">

  
  <div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama Bahan:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Bahan Disini" required>
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="merk">Merk Bahan :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="merk" placeholder="Masukkan Merk Bahan Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="kode_rak">Kode Rak :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kode_rak" placeholder="Masukkan Kode Rak Penyimpanan Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="harga_beli">Harga Beli :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="harga_beli" placeholder="Masukkan Harga Beli Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="harga_jual">Harga Jual :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="harga_jual" placeholder="Masukkan Harga Jual Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="keterangan">Keterangan :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan lebih lengkap Disini" required>
    </div>
  </div>
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
     
     <button type="reset" class="btn btn-danger" name="add_bahan"><i class="fa fa-repeat"> Ulangi</i></button> &nbsp&nbsp&nbsp
     <button type="submit" class="btn btn-success" name="add_bahan"><i class="fa fa-floppy-o"> Simpan</i></button>

    </div>

  </div>
</form>
