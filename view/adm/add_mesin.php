<style>
   body {
    background-image: url('color.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;

   }
 </style>
<h3 class="page-header">TAMBAHKAN MESIN BARU</h3>
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
    <label class="control-label col-sm-2" for="merk_mesin">Merk Mesin:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="merk_mesin" placeholder="Masukkan Merk Mesin Disini" required>
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="kode_mesin">Kode Mesin :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kode_mesin" placeholder="Masukkan Kode Mesin Disini" required>
    </div>
  </div>


<div class="form-group">
    <label class="control-label col-sm-2" for="tahun_pembuatan">Tahun Pembuatan:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tahun_pembuatan" placeholder="Masukkan Tahun Pembuatan Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="fungsi">Fungsi :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="fungsi" placeholder="Masukkan Fungsi Mesin Disini" required>
    </div>
  </div>

  <div class="form-group">
                        <label class="control-label col-sm-2" for="status">Pilih Status :</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="status" name="status" Required>
                        <option value="" >---Status Mesin Baru---</option>
                        <?php
                          $sql = "SELECT DISTINCT(status) FROM `status_mesin`;";
              $query = $conn->query($sql);
                            while ($dt = $query->fetch_array()) {
                        ?>
                            <option value="<?php echo $dt['status'] ?>" <?php if(isset($_POST['submit'])){if($dt['status']==$_POST['add_mesin']){echo "selected";}} ?>>
                                <?php echo $dt['status'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    </div>

  
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
     
     <button type="reset" class="btn btn-danger" name="add_mesin"><i class="fa fa-repeat"> Ulangi</i></button> &nbsp&nbsp&nbsp
     <button type="submit" class="btn btn-success" name="add_mesin"><i class="fa fa-floppy-o"> Simpan</i></button>

    </div>

  </div>
</form>
