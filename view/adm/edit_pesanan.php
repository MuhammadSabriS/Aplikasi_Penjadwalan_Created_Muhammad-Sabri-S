<?php 
    $id_pesanan = mysqli_real_escape_string($conn, $_GET['id_pesanan']);
    $sql_sw = "SELECT*FROM detail_pesanan NATURAL LEFT JOIN user WHERE id = '$id_pesanan'";
    if ($get_sw = $conn->query($sql_sw)->fetch_assoc()) {
    extract($get_sw);
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
             

              $data = mysqli_query($koneksi,"SELECT * FROM detail_pesanan
                INNER JOIN detail_user
                ON data_absen.id_user=detail_user.id_user
                INNER JOIN bulan
                ON data_absen.id_bln = bulan.id_bln
                INNER JOIN tanggal
                ON data_absen.id_tgl=tanggal.id_tgl
                INNER JOIN hari
                ON data_absen.id_hri=hari.id_hri
                INNER JOIN detail_bahan
                ON data_absen.nama_bahan=detail_bahan.nama_bahan
                WHERE detail_mesin.merk_mesin = '$mesin'");
             $index = 1;
?>

    
    <form class="form-horizontal" role="form" style="width:80%" onSubmit="return validasi()" name="formulir" method="post" action="./model/proses.php">
  <input type="hidden" name="id" value="<?php echo $id_pesanan; ?>" />

  <div class="form-group">
    <label class="control-label col-sm-2" for="tgl_jatuh_tempo">Tanggal Jatuh Tempo:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $tgl_jatuh_tempo; ?>" class="form-control" name="tgl_jatuh_tempo" placeholder="Masukan Nama Customer Disini" required>
    </div>    
<!--     <div class="col-sm-10">
      <input type="datetime-local" value="<?php echo $tgl_jatuh_tempo; ?>" class="form-control" name="tgl_jatuh_tempo" placeholder="Masukkan Tanggal Jatuh Tempo Disini"required>
    </div> -->
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="nama_customer">Nama Customer:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $nama_customer; ?>" class="form-control" name="nama_customer" placeholder="Masukan Nama Customer Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="isi_pesanan">Nama Pesanan:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $isi_pesanan; ?>" class="form-control" name="isi_pesanan" placeholder="Masukan Nama Pesanan Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="ukuran">Ukuran :</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $ukuran; ?>" class="form-control" name="ukuran" placeholder="Masukan Ukuran Pesanan Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="banyaknya">Banyaknya :</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $banyaknya; ?>" class="form-control" name="banyaknya" placeholder="Masukan Banyaknya Pesanan Disini" required>
    </div>
  </div>
<div class="form-group">

  

                        <label class="control-label col-sm-2" for="mesin">Pilih Mesin :</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="mesin" name="mesin" Required>
                        <option value="" >---Pilih Mesin Yang Akan Dipakai---</option>
                        <?php
                          $sql = "SELECT DISTINCT(merk_mesin) FROM `detail_mesin`;";
                          $sqlcount = "SELECT t1.mesin, COUNT(*) as 'jumlah' FROM detail_pesanan as t1 GROUP BY t1.mesin";
              $querycount = $conn->query($sqlcount);

              $i = 0;
              $query = $conn->query($sql);
                            while ($dt = $query->fetch_array()) {
                        ?>
                            <option value="<?php echo $dt['merk_mesin'] ?>" <?php if($dt['merk_mesin']==$get_sw['mesin']){echo "selected";} ?>>
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


       <!--    <div class="form-group">
                        <label class="control-label col-sm-2" for="bahan">Pilih Bahan :</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="bahan" name="bahan" Required>
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
                    </div>
 -->
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
                        ?>
                            <option value="<?php echo $dt['name_user'] ?>" <?php {if($dt['name_user']==$karyawan){echo "selected";}} ?>>
                                <?php echo $dt['name_user'];
                                foreach ($querycountkaryawan as $item) {
                                  if($item['karyawan'] == $dt['name_user']){
                                        echo(' ['.$item['jumlah'].']'); 
                                  }
                                }

                                 ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="handphone">Nomor HP :</label>
    <div class="col-sm-10">
      <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" value="<?php echo $handphone; ?>" class="form-control" name="handphone" placeholder="Masukan Nomor Handphone Customer Disini" required>
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="keterangan">Keterangan :</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $keterangan; ?>" class="form-control" name="keterangan" placeholder="Masukan keterangan lengkap Pesanan Disini" required>
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="harga">Harga :</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $harga; ?>" class="form-control" name="harga" placeholder="Masukan Jumlah Harga Disini" required>
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="panjar">Panjar :</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $panjar; ?>" class="form-control" name="panjar" placeholder="Masukan Keterangan Panjar Disini" required>
    </div>
  </div>


  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" onclick="hapusPesanan(<?php echo $id_user; ?>)" class="btn btn-danger" name="">Hapus</button>
      <button type="submit" class="btn btn-success" name="edit_pesanan">Simpan</button>
      
    </div>
  </div>
</form>
<?php
} else {
    echo "Data tidak ditemukan";
}
 ?>
 