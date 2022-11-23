<?php 
    $id_bahan = mysqli_real_escape_string($conn, $_GET['id_bahan']);
    $sql_sw = "SELECT*FROM detail_bahan NATURAL LEFT JOIN user WHERE id_user= '$id_bahan'";
    if ($get_sw = $conn->query($sql_sw)->fetch_assoc()) {
    extract($get_sw);
    ?>
    <form class="form-horizontal" role="form" style="width:80%" onSubmit="return validasi()" name="formulir" method="post" action="./model/proses.php">
  <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />

  
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Nama Bahan:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $nama_bahan; ?>" class="form-control" name="nama_bahan" placeholder="Masukan Nama Bahan Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="merk_bahan">Merk Bahan:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $merk_bahan; ?>" class="form-control" name="merk_bahan" placeholder="Masukan Merk Bahan Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="kode_rak">Kode Rak:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $kode_rak; ?>" class="form-control" name="kode_rak" placeholder="Masukan Kode Rak Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="harga_beli">Harga Beli:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $harga_beli; ?>" class="form-control" name="harga_beli" placeholder="Masukan Harga Beli Disini" required>
    </div>
  </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="harga_jual">Harga Jual:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $harga_jual; ?>" class="form-control" name="harga_jual" placeholder="Masukan Harga Jual Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="keterangan">Keteragan:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $keterangan; ?>" class="form-control" name="keterangan" placeholder="Masukan keterangan Tambahan Disini" required>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" onclick="hapusBahan(<?php echo $id_user; ?>)" class="btn btn-danger" name="">Hapus</button>
      <button type="submit" class="btn btn-success" name="edit_bahan">Simpan</button>
      
    </div>
  </div>
</form>
<?php
} else {
    echo "Data tidak ditemukan";
}
 ?>
 