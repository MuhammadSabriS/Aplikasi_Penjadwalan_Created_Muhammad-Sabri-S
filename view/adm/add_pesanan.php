<style>
   body {
    background-image: url('color.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;

   }
 </style>
<h3 class="page-header">FORM PESANAN CUSTOMER</h3>
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

<?php
 // koneksi database
             $koneksi = mysqli_connect("localhost","root","","scheduling");
if(isset($_POST['submit']))
             {
                $mesin = $_POST['add_pesanan'] ;
             }else
             {
                $mesin = null;
             }
             

            //   $data = mysqli_query($koneksi,"SELECT * FROM data_absen
            //     INNER JOIN detail_user
            //     ON data_absen.id_user=detail_user.id_user
            //     INNER JOIN bulan
            //     ON data_absen.id_bln = bulan.id_bln
            //     INNER JOIN tanggal
            //     ON data_absen.id_tgl=tanggal.id_tgl
            //     INNER JOIN hari
            //     ON data_absen.id_hri=hari.id_hri
            //     INNER JOIN detail_bahan
            //     ON data_absen.nama_bahan=detail_bahan.nama_bahan
            //     WHERE detail_mesin.merk_mesin = '$mesin'");
            //  $index = 1;
?>

<!-- <form class="form-horizontal" role="form" style="width:80%" onSubmit="return validasi()" name="formulir" method="post" action="./model/proses.php" enctype="multipart/form-data"> -->
  <form class="form-horizontal" role="form" style="width:80%" onSubmit="return validasi()" name="formulir" method="post" action="./model/proses.php" enctype="multipart/form-data">

<div class="form-group">
    <label class="control-label col-sm-2" for="nama_customer">Nama Customer:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama_customer" placeholder="Masukkan Nama Customer Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="handphone">Nomor HP:</label>
    <div class="col-sm-10">
      <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" name="handphone" placeholder="Masukkan Nomor Handphone Customer Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="tgl_jatuh_tempo">Tanggal Jatuh Tempo:</label>
    <div class="col-sm-10">
      <input type="datetime-local" class="form-control" name="tgl_jatuh_tempo" placeholder="Masukkan Tanggal Jatuh Tempo Disini">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="isi_pesanan">Nama Pesanan:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="isi_pesanan" placeholder="Masukkan Nama Pesanan Disini" required>
    </div>
  </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="ukuran">Ukuran:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ukuran" placeholder="Masukkan Ukuran Pesanan Disini" required>
    </div>
  </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="banyaknya">Banyaknya:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="banyaknya" placeholder="Masukkan Banyaknya Pesanan Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="kategori">Kategori :</label>
    <div class="col-sm-10">
      <label class="radio-inline"><input type="radio" name="kategori" id="kategori" value="berat">Berat</label>
    <label class="radio-inline"><input type="radio" name="kategori" id="kategori" value="ringan" >Ringan</label>
    </div>
  </div>

					<div class="form-group">
                        <label class="control-label col-sm-2" for="mesin">Pilih Mesin :</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="mesin" name="mesin" Required>
                        <option value="" >---Pilih Mesin Yang Akan Dipakai---</option>
                        <?php
                        	$sql = "SELECT DISTINCT(merk_mesin) FROM `detail_mesin` ORDER BY merk_mesin;";
              $sqlcount = "SELECT t1.mesin, COUNT(*) as 'jumlah' FROM detail_pesanan as t1 GROUP BY t1.mesin";
              $querycount = $conn->query($sqlcount);

              $i = 0;
							$query = $conn->query($sql);
                            while ($dt = $query->fetch_array()) {
                        ?>
                            <option value="<?php echo $dt['merk_mesin'] ?>" <?php if(isset($_POST['submit'])){if($dt['merk_mesin']==$_POST['add_pesanan']){echo "selected";}} ?>>

                                <?php echo $dt['merk_mesin']; 

                                    foreach ($querycount as $item) {
                                      if($item['mesin'] == $dt['merk_mesin']){
                                        echo(' ['.$item['jumlah'].']'); 
                                      }
                                    }
                                ?></option>
                                <?php $i++; ?>
                        <?php } ?>
                        </select>
                    </div>
                    </div>

<!-- 					<div class="form-group">
                        <label class="control-label col-sm-2" for="bahan">Pilih Bahan :</label>
                        <div class="col-sm-10">
                        <select class="form-control"  id="bahan" name="bahan" Required>
                        <option value="" >---Pilih Bahan Yang Akan Dipakai---</option>
                        <?php
                        	$sql = "SELECT DISTINCT(nama_bahan) FROM `detail_bahan`;";
							$query = $conn->query($sql);
                            while ($dt = $query->fetch_array()) {
                        ?>
                            <option value="<?php echo $dt['nama_bahan'] ?>" <?php if(isset($_POST['submit'])){if($dt['nama_bahan']==$_POST['add_pesanan']){echo "selected";}} ?>>
                                <?php echo $dt['nama_bahan'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    </div> -->

          <div class="form-group">
                        <label class="control-label col-sm-2" for="karyawan">Pilih Karyawan :</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="karyawan" name="karyawan" Required>
                        <option value="" >---Pilih Karyawan Yang Bertugas---</option>
                        <?php
                          $sql = "SELECT DISTINCT(name_user) FROM `detail_user`;";
              $sqlcountkaryawan = "SELECT t1.karyawan, COUNT(*) as 'jumlah' FROM detail_pesanan as t1 GROUP BY t1.karyawan";
              $querycountkaryawan = $conn->query($sqlcountkaryawan);
              $query = $conn->query($sql);
                            while ($dt = $query->fetch_array()) {
                              // dd($sqlcountkaryawan);
                        ?>
                         <!--  dd($sqlcountkaryawan); -->
                            <option value="<?php echo $dt['name_user'] ?>" <?php if(isset($_POST['submit'])){if($dt['name_user']==$_POST['add_pesanan']){echo "selected";}} ?>>
                                <?php echo $dt['name_user'];
                                foreach ($querycountkaryawan as $item) {
                                  if($item['karyawan'] == $dt['name_user']){
                                        echo(' ['.$item['jumlah'].']');

                                        
                                  }
                                }
                                $user = $dt['name_user'];
                                $sqlLevel = "SELECT * FROM detail_pesanan WHERE karyawan = '$user' AND kategori = 'berat';";
                                        $array = [];
                                        $datalevel = $conn->query($sqlLevel);
                                        $data = $datalevel->fetch_array(); 
                                        if(!empty($data)){
                                          echo('berat');
                                        }

                                 ?></option>

                        <?php } ?>
                        </select>
                    </div>
                    </div>

      

<div class="form-group">
    <label class="control-label col-sm-2" for="estimasi">Keterangan :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan Lengkap Pesanan Disini" required>
    </div>
  </div>



<div class="form-group">
    <label class="control-label col-sm-2" for="harga">Harga :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga Pesanan Disini" required>
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="panjar">Panjar :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="panjar" placeholder="Masukkan Panjar Customer Disini" required>
    </div>
  </div>

<!-- <div class="form-group">
<label class="control-label col-sm-2" for="estimasi">File Desain :</label>
  <form action="proses.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
  </form>
</div> -->




<!-- link select multiple -->
<!-- https://www.w3schools.com/tags/tryit.asp?filename=tryhtml_select_multiple -->





    <div class="form-group">
    <label class="control-label col-sm-2" for="upload_berkas" >File Desain :</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" name="upload_berkas" required>
      </div>
    </div>


<!-- <form class="form-horizontal" role="form" style="width:80%" onSubmit="return validasi()" name="formulir" method="post" action="./model/proses.php"> -->

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
     
     <button type="reset" class="btn btn-danger" name="add_pesanan"><i class="fa fa-repeat"> Ulangi</i></button> &nbsp&nbsp&nbsp
     <button type="submit" class="btn btn-success" name="add_pesanan"  ><i class="fa fa-floppy-o"> Simpan</i></button> &nbsp&nbsp&nbsp
    <a href="/scheduling/view/adm/cetak_pesanan.php" class='btn btn-success'><i class="fa fa-print">  PRINT</i> </a>
    </div>

  </div>
</form>
