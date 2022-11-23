<style>
   body {
    background-image: url('color.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;

   }
 </style>
<h3 class="page-header">BUAT AKUN PENGGUNA</h3>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php 
  if (isset($_GET['st'])) {
    if ($_GET['st']==1) {
      echo "<div class='alert alert-warning'><strong>Berhasil Ditambahkan.</strong></div>";
    } elseif ($_GET['st']==2) {
      echo "<div class='alert alert-danger'><strong>Gagal Menambahkan.</strong></div>";
    } elseif ($_GET['st']==3) {
      echo "<div class='alert alert-danger'><strong>Maaf Email sudah digunakan.</strong></div>";
    } elseif ($_GET['st']==4) {
      echo "<div class='alert alert-danger'><strong>Semua kolom wajib di isi.</strong></div>";
    } elseif ($_GET['st']==5) {
      echo "<div class='alert alert-danger'><strong>Katasandi tidak cocok!</strong></div>";
    } elseif ($_GET['st']==6) {
      echo "<div class='alert alert-danger'><strong>Kode Mahasiswa sudah terdaftar!</strong></div>";
    }
  }

 ?>
<form class="form-horizontal" role="form" style="width:80%" onSubmit="return validasi()" name="formulir" method="post" action="./model/proses.php">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Nik :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nis" placeholder="Masukkan NIK Disini" required>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Nama :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Disini" required>
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="pendidikan">Pendidikan :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="pendidikan" placeholder="Masukkan Pendidikan Terakhir Karyawan Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="jk">Jenis Kelamin :</label>
    <div class="col-sm-10">
      <label class="radio-inline"><input type="radio" name="jk" id="jk" value="L">Laki-Laki</label>
    <label class="radio-inline"><input type="radio" name="jk" id="jk" value="P" >Perempuan</label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="sekolah">Alamat :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Disini" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email :</label>
    <div class="col-sm-10">
      <input type="email" class="form-control"  name="email" placeholder="Masukkan Email Disini" required>
    </div>
  </div>
  <div class="form-group">
  <fieldset>
    <label class="control-label col-sm-2">Katasandi:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" name="pwd" placeholder="Masukkan Katasandi" id="password" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2"></label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" name="pwd_cek" placeholder="Ulangi Katasandi"  id="confirm_password" required>
    </div>
    </fieldset>
  </div>
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
     
     <button type="reset" class="btn btn-danger" name="add_user"><i class="fa fa-repeat"> Ulangi</i></button> &nbsp&nbsp&nbsp
     <button type="submit" class="btn btn-success" name="add_user"><i class="fa fa-floppy-o"> Simpan</i></button>

    </div>

  </div>
</form>
