<?php 
    $id_mesin = mysqli_real_escape_string($conn, $_GET['id_mesin']);
    $sql_sw = "SELECT*FROM detail_mesin NATURAL LEFT JOIN user WHERE id_user= '$id_mesin'";
    if ($get_sw = $conn->query($sql_sw)->fetch_assoc()) {
    extract($get_sw);
    ?>
    <form class="form-horizontal" role="form" style="width:80%" onSubmit="return validasi()" name="formulir" method="post" action="./model/proses.php">
  <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />

  
  <div class="form-group">
    <label class="control-label col-sm-2" for="merk_mesin">Merk Mesin:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $merk_mesin; ?>" class="form-control" name="merk_mesin" placeholder="Masukan Merk Mesin Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="kode_mesin">Kode Mesin:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $kode_mesin; ?>" class="form-control" name="kode_mesin" placeholder="Masukan Kode Mesin Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="tahun_pembuatan">Tahun Pembuatan:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $tahun_pembuatan; ?>" class="form-control" name="tahun_pembuatan" placeholder="Masukan Tahun Pembuatan Disini" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="fungsi">Fungsi Mesin:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $fungsi; ?>" class="form-control" name="fungsi" placeholder="Masukan Tahun Pembuatan Disini" required>
    </div>
  </div>


<div class="form-group">
                        <label class="control-label col-sm-2" for="status">Pilih Status :</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="status" name="status" Required>
                        <option value="" >---Pilih Status Mesin---</option>
                        <?php
                          $sql = "SELECT DISTINCT(status) FROM `status_mesin`;";
              $query = $conn->query($sql);
                            while ($dt = $query->fetch_array()) {
                        ?>
                            <option value="<?php echo $dt['status'] ?>" <?php if($dt['status']==$get_sw['status']){echo "selected";} ?>>
                                <?php echo $dt['status'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" onclick="hapusMesin(<?php echo $id_user; ?>)" class="btn btn-danger" name="">Hapus</button>
      <button type="submit" class="btn btn-success" name="edit_mesin">Simpan</button>
      
    </div>
  </div>
</form>
<?php
} else {
    echo "Data tidak ditemukan";
}
 ?>
 