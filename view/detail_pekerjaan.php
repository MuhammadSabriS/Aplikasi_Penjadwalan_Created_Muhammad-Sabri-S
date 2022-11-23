<style>
   body {
    background-image: url('color.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;

   }
 </style>
<h3 class='page-header'>DATA MESIN PERUSAHAAN
    
</h3>

    <div class='table-responsive'>
    <?php 
        if (isset($_GET['merk_mesin'])) {
            if ($_GET['merk_mesin']!=="") {
                $id_user=$_GET['merk_mesin'];
                include './view/mesin.php';
            } else {
                header("location:mesin");
            }
        } else {
            $sql = "SELECT*FROM detail_mesin ORDER BY id_user ASC";
            $query = $conn->query($sql);
            if ($query->num_rows!==0) {
                echo "<table class='table table-striped' style='width:100%'>
                    <thead>
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Merk Mesin</center></th>
                            <th><center>Kode Mesin</center></th>
                            <th><center>Tahun Pembuatan</center></th>
                            <th><center>Status</center></th>
                            
                        </tr>
                    </thead>
                    <tbody>";
                $no=0;
                while ($get_mesin = $query->fetch_assoc()) {
                    $merk_mesin = $get_mesin['id_user'];
                    $merk_mesin = $get_mesin['merk_mesin'];
                    $kode_mesin = $get_mesin['kode_mesin'];
                    $tahun_pembuatan = $get_mesin['tahun_pembuatan'];
                    $status = $get_mesin['status'];
                    $no++;
                    echo "<tr>
                            
                            <td><center>$no</center></td>
                            <td><center>$merk_mesin</center></td>
                            <td><center>$kode_mesin</center></td>
                            <td><center>$tahun_pembuatan</center></td>
                            <td><center>$status</center></td>
                        </tr>";
                }
                echo "</tbody></table>";
                $conn->close();
            } else {
                echo "<div class='alert alert-danger'><strong>Tidak ada Mahasiswa untuk ditampilkan</strong></div>";
            }
        }
     ?>
</div>

