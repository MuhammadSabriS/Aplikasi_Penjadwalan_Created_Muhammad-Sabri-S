<style>
   body {
    background-image: url('color.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;

   }
 </style>
<h3 class='page-header'>DETAIL DAFTAR BAHAN TERSEDIA</h3>

    <div class='table-resfponsive'>
    <?php 
        if (isset($_GET['id_bahan'])) {
            if ($_GET['id_bahan']!=="") {
                $id_user=$_GET['id_bahan'];
                include './view/adm/edit_bahan.php';
            } else {
                header("location:detail_bahan_karyawan");
            }
        } else {
// $limit = 10;
// $start = 1;
// $slice = 9;
// $self_server = "./detail_bahan_karyawan";
// $q = "SELECT * FROM detail_bahan ORDER BY id_user ASC";
// $r = $conn->query($q);
// $totalrows = $r->num_rows;

// if(!isset($_GET['pn']) || !is_numeric($_GET['pn'])){
//     $page = 1;
// } else {
//     $page = $_GET['pn'];
// }

// $numofpages = ceil($totalrows / $limit);
// $limitvalue = $page * $limit - ($limit);

// $q = "SELECT*FROM detail_bahan ORDER BY id_user ASC LIMIT $limitvalue, $limit";
// //jika user nakal paging lebih dari data yg dimiliki
// $cek_page = $conn->query($q);
// if ($cek_page->num_rows != 0) {
//     if ($r = $conn->query($q)) {
   
//     if ($r->num_rows!==0) {
 $sql = "SELECT*FROM detail_bahan ORDER BY id_user ASC";
            $query = $conn->query($sql);
            if ($query->num_rows!==0) {
            echo "<table class='table table-striped' style='width:100%'>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA BAHAN</th>
                            <th><center>MERK BAHAN</center></th>
                            <th><center>KODE RAK</center></th>
                            <th><center>HARGA BELI</center></th>
                            <th><center>HARGA JUAL</center></th>
                            <th><center>KETERANGAN</center></th>
                        </tr>
                    </thead>
                    <tbody>";
                    $query_bahan = $conn->query($sql);
                    $no=0;
                    while ($get_bahan = $query_bahan->fetch_assoc()) {
                        $id_bahan = $get_bahan['id_user'];
                        $name = $get_bahan['nama_bahan'];
                        $merk = $get_bahan['merk_bahan'];
                        $kode = $get_bahan['kode_rak'];
                        $harga_beli = $get_bahan['harga_beli'];
                        $harga_jual = $get_bahan['harga_jual'];
                        $keterangan = $get_bahan['keterangan'];
                        $no++;
                        echo "<tr>
                                <td>$no</td>
                                <td>$name</td>
                                <td><center>$merk</center></td>
                                <td><center>$kode</center></td>
                                <td><center>$harga_beli</center></td>
                                <td><center>$harga_jual</center></td>
                                <td><center>$keterangan</center></td>

                             
                            </tr>";
                    }
                   // $conn->close();
                    echo "</tbody></table>";
                       
                //     } else {
                //         echo "<hr />";
                //     }

                // } else {
                //     echo "<div class='alert alert-danger'><strong>Terjadi kesalahan.</strong></div>";
                // }
                
                // $sql_cek_row = "SELECT*FROM detail_bahan";
                // $q_cek = $conn->query($sql_cek_row);
                // $hitung = $q_cek->num_rows;
                // if ($hitung >= $limit) {
                //     echo "<hr><ul class='pagination'>";
                //    if($page!= 1){
                //         $pageprev = $page - 1;
                //         echo '<li><a href="'.$self_server.'&pn='.$pageprev.'"><<</a></li>';
                //     }else{
                //         echo "<li><a><<</a></li>";
                //     }

                //     if (($page + $slice) < $numofpages) {
                //         $this_far = $page + $slice;
                //     } else {
                //         $this_far = $numofpages;
                //     }

                //     if (($start + $page) >= 10 && ($page - 10) > 0) {
                //         $start = $page - 10;
                //     }

                //     for ($i = $start; $i <= $this_far; $i++){
                //         if($i == $page){
                //             echo "<li class='active'><a>".$i."</a></li> ";
                //         }else{
                //             echo '<li><a href="'.$self_server.'&pn='.$i.'">'.$i.'</a></li> ';
                //         }
                //     }

                //     if(($totalrows - ($limit * $page)) > 0){
                //         $pagenext = $page + 1;
                //         echo '<li><a href="'.$self_server.'&pn='.$pagenext.'">>></a></li>';
                //     }else{
                //         echo "<li><li><a>>></a></li>";
                //     }
                //     echo "</ul>";
                // }
            } else {
                echo "<div class='alert alert-danger'><strong>Tidak ada data untuk ditampilkan</strong></div>";
            }
        }
     ?>
</div>
<script src="lib/js/sweetalert2.min.js"></script> <link rel="stylesheet" type="text/css" href="lib/js/sweetalert2.css">
    <script>
        function hapusBahan(id_bahan) {
            var id = id_bahan;
            swal({
                title: 'Anda Yakin?',
                text: 'Data Bahan akan dihapus!',type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                closeOnConfirm: true
            }, function() {
                    window.location.href="./model/proses.php?del_bahan="+id;
                });
        }
    </script>
