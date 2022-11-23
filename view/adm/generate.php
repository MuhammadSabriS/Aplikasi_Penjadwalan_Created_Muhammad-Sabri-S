<style>
   body {
    background-image: url('color.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;

   }
 </style>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
 // koneksi database
             $koneksi = mysqli_connect("localhost","root","","scheduling");
if(isset($_POST['submit']))
             {
                $name = $_POST['generate'] ;
             }else
             {
                $name = null;
             }
             
         
             $data = mysqli_query($koneksi,"SELECT * FROM detail_pesanan
                INNER JOIN bulan
                ON detail_pesanan.id_bln = bulan.id_bln
                INNER JOIN tanggal
                ON detail_pesanan.id_tgl=tanggal.id_tgl
                WHERE detail_pesanan.nama_customer = '$name'
                ORDER BY id_user ASC");
             $index = 1;
?>
		<form action="" method="post" enctype="multipart/form-data">
            <h1 class="display-3 text-center my-4">Generate Pesanan Disini</h1><hr>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="generate">Pilih Nama Customer</label>
                        <select class="form-control" id="generate" name="generate" Required>
                        <option value="">---Pilih Customer Disini---</option>
                        <?php
                        	$sql = "SELECT DISTINCT(nama_customer) FROM `detail_pesanan`;";
							$query = $conn->query($sql);
                            while ($dt = $query->fetch_array()) {
                        ?>
                            <option value="<?php echo $dt['nama_customer'] ?>" <?php if(isset($_POST['submit'])){if($dt['nama_customer']==$_POST['generate']){echo "selected";}} ?>>
                                <?php echo $dt['nama_customer'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group"><br>&nbsp
                    <button class="btn btn-primary" type="submit" id="submit" name="submit"><i class="fa fa-search"> CARI </i></button>
                    </div>
                </div>
            </div><br>
        </form>
<?php
if(isset($_POST['submit']))
{
?>

    <a href="/scheduling/view/adm/cetak_generate.php?generate=<?= $name?>" class='btn btn-success'><i class="fa fa-print">  PRINT</i> </a> 
    

<?php
}
?>


        <table class="table table-responsive">
            <thead>
                            <th>NO</th>
                            <th>TANGGAL MASUK</th>
                            <th>JATUH TEMPO</th>
                            <th>CUSTOMER</th>
                            <th>PESANAN</th>
                            <th>UKURAN</th>
                            <th>MESIN</th>
                            <th>BERTUGAS</th>
                            <th><center>NOMOR HP</center></th>
                            <th>KETERANGAN</th>
                            <th>HARGA</th>
                            <th>PANJAR</th>

            </thead>
            <?php 
             

             // menampilkan data 
             
             while($d = mysqli_fetch_array($data)){
            
             ?> 
             <tbody>
                <tr>
                     <td style='text-align: center;'><?php echo $index++ ?></td>

                    <td><?php echo $d['tgl_masuk']; ?></td>
                    <td><?php echo $d['tgl_jatuh_tempo']; ?></td>
                    <td><?php echo $d['nama_customer']; ?></td>
                    <td><?php echo $d['isi_pesanan']; ?></td>
                    <td><?php echo $d['ukuran']; ?></td>
                    <td><?php echo $d['mesin']; ?></td>
                    <td><?php echo $d['karyawan']; ?></td>
                    <td><?php echo $d['handphone']; ?></td>
                    <td><?php echo $d['keterangan']; ?></td>
                    <td><?php echo $d['harga']; ?></td>
                    <td><?php echo $d['panjar']; ?></td>

                </tr>
                <?php 
                }
                ?>
             </tbody>
        </table>
