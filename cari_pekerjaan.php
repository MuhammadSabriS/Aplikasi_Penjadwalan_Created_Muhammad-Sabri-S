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
                WHERE detail_pesanan.mesin = '$name'
                ORDER BY id_user ASC");
             $index = 1;
?>
        <form action="" method="post" enctype="multipart/form-data">
            <h1 class="display-3 text-center my-4">TEMUKAN PESANAN DISINI</h1><hr>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="generate">Pilih Mesin Disini</label>
                        <select class="form-control" id="generate" name="generate" Required>
                        <option value="">---Pilih Mesin Disini---</option>
                        <?php
                            $sql = "SELECT DISTINCT(mesin) FROM `detail_pesanan`;";
                            $query = $conn->query($sql);
                            while ($dt = $query->fetch_array()) {
                        ?>
                            <option value="<?php echo $dt['mesin'] ?>" <?php if(isset($_POST['submit'])){if($dt['mesin']==$_POST['generate']){echo "selected";}} ?>>
                                <?php echo $dt['mesin'] ?></option>
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
                            <th>FILE</th>
                            <th><center>AKSI</center></th>

            </thead>
            <?php 
             

             // menampilkan data pegawai
             
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
                  

                    <td><a class="label label-primary" style="padding: 10px; border-radius: 3px; font-size: 12px" href="model/berkas/<?php echo $d['file']; ?>" download >Download</a></td>
                     <td>
                         <?php
                         // if($d['status']==1) {
                         //    echo '<p><a href="status.php?id_user='.$d['id_user'].'&status=0">Enable</a></p>';
                         // }else{
                         //    echo '<p><a href="status.php?id_user='.$d['id_user'].'&status=1">Disable</a></p>';
                         // }

                         if($d['status']=='Selesai') {
                            // echo '<p><a href="status.php?id='.$d['id'].'&status=Dikerja" class="label label-success" style="padding: 10px; border-radius: 3px; font-size: 12px">PESANAN SELESAI</a></p>';
                            echo '<p><b>PESANAN SELESAI</b></p>';
                         }else if ($d['status']=='Dikerja'){

                            echo '<p><a href="status.php?id='.$d['id'].'&status=Selesai" class="label label-success" style="padding: 10px; border-radius: 3px; font-size: 12px">SELESAIKAN</a></p>';

                            // echo '<p><a href="status.php?id='.$d['id'].'&status=Selesai" class="label label-danger" style="padding: 10px; border-radius: 3px; font-size: 12px" >SEDANG DI KERJA</a></p>';
                         }else{

                            echo '<p><a href="status.php?id='.$d['id'].'&status=Dikerja" class="label label-danger" style="padding: 10px; border-radius: 3px; font-size: 12px">KERJAKAN</a></p>';

                            // echo '<p><a href="status.php?id='.$d['id'].'&status=Selesai" class="label label-danger" style="padding: 10px; border-radius: 3px; font-size: 12px" >SEDANG DI KERJA</a></p>';
                         }


                         // if($d['status']==0) {
                         //    echo '<p><a href="status.php?id_user='.$d['id_user'].'&status=1" class="label label-success">PESANAN SELESAI</a></p>';
                         // }else{
                         //    echo '<p><a href="status.php?id_user='.$d['id_user'].'&status=0" class="label label-danger" >SEDANG DI KERJA</a></p>';
                         // }


                         // if($d['status']==1) {
                         //    echo '<form action="status.php" method="POST">
                         //            <input type="hidden" value="1">
                         //            <p>
                         //                <button type="submit" name="submit">Enable</button>
                         //            </p>
                         //        </form>';
                         // }else{
                         //    echo '<form action="status.php" method="POST">
                         //            <input type="hidden" value="1">
                         //            <p>
                         //                <button type="submit" name="submit">Enable</button>
                         //            </p>
                         //        </form>';
                         // }
                         ?>
                     </td>

                </tr>
                <?php 
                }
                ?>
             </tbody>
        </table>
