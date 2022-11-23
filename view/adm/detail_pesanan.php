<style>
   body {
    background-image: url('color.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;

   }
 </style>

<h3 class='page-header'>DETAIL PESANAN CUSTOMER</h3>
<?php 

if (isset($_GET['st'])) {
        if ($_GET['st']==1) {
            echo "<div class='alert alert-warning'><strong>Berhasil Disimpan.</strong></div>";
        } elseif ($_GET['st']==2) {
            echo "<div class='alert alert-danger'><strong>Gagal Menyimpan.</strong></div>";
        } elseif ($_GET['st']==3) {
            echo "<div class='alert alert-success'><strong>Berhasil dihapus.</strong></div>";
        } elseif ($_GET['st']==4) {
            echo "<div class='alert alert-danger'><strong>Data tidak boleh kosong.</strong></div>";
        } elseif ($_GET['st']==5) {
            echo "<div class='alert alert-danger'><strong>Gagal dihapus.</strong></div>";
        }
    }
 ?>
    <div class='table-resfponsive'>
    <?php 
        if (isset($_GET['id_pesanan'])) {
            if ($_GET['id_pesanan']!=="") {
                $id_user=$_GET['id_pesanan'];
                include './view/adm/edit_pesanan.php';
            } else {
                header("location:detail_pesanan");
            }
        } else {
$limit = 10;
$start = 1;
$slice = 9;
$self_server = "./detail_pesanan";
$q = "SELECT * FROM detail_pesanan ORDER BY id ASC";
$r = $conn->query($q);
$totalrows = $r->num_rows;

if(!isset($_GET['pn']) || !is_numeric($_GET['pn'])){
    $page = 1;
} else {
    $page = $_GET['pn'];
}

$numofpages = ceil($totalrows / $limit);
$limitvalue = $page * $limit - ($limit);

$q = "SELECT*FROM detail_pesanan NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal  ORDER BY id ASC";
//jika user nakal paging lebih dari data yg dimiliki
$cek_page = $conn->query($q);
if ($cek_page->num_rows != 0) {
    if ($r = $conn->query($q)) {
   
    if ($r->num_rows!==0) {
            echo "<table class='table table-striped' style='width:200%'>
                    <thead>
                        <tr> <center>
                            <th>NO</th>
                            <th>TANGGAL MASUK</th>
                            <th>JATUH TEMPO</th>
                            <th>CUSTOMER</th>
                            <th>PESANAN</th>
                            <th>UKURAN</th>
                            <th>BANYAKNYA</th>
                            <th>MESIN</th>
                            <th>BERTUGAS</th>
                            <th><center>NOMOR HP</center></th>
                            <th>KETERANGAN</th>
                            <th>HARGA</th>
                            <th>PANJAR</th>
                            <th>STATUS</th>
                            <th><center>AKSI</center></th>
                        </tr>
                    </thead>
                    <tbody>";
                    $query_pesanan = $conn->query($q);
                    $no=0;
                    while ($get_pesanan = $query_pesanan->fetch_assoc()) {
                        $id_pesanan = $get_pesanan['id'];
                        $id_hapus = $get_pesanan['id'];
                        $waktu = "$get_pesanan[tgl_masuk]";
                        $tgl_jatuh_tempo = "$get_pesanan[tgl_jatuh_tempo]";
                        $nama_customer = $get_pesanan['nama_customer'];
                        $isi_pesanan = $get_pesanan['isi_pesanan'];
                        $ukuran = $get_pesanan['ukuran'];
                        $banyaknya = $get_pesanan['banyaknya'];
                        $mesin = $get_pesanan['mesin'];
                        $karyawan = $get_pesanan['karyawan'];
                        $handphone = $get_pesanan['handphone'];
                        $keterangan = $get_pesanan['keterangan'];
                        $harga = $get_pesanan['harga'];
                        $panjar = $get_pesanan['panjar'];
                        $status = $get_pesanan['status'];
                        $no++;
                        echo "<tr>
                                <td>$no</td>
                                <td>$waktu</td>
                                <td>$tgl_jatuh_tempo</td>
                                <td>$nama_customer</td>
                                <td>$isi_pesanan</td>
                                <td>$ukuran</td>
                                <td>$banyaknya</td>
                                <td>$mesin</th>
                                <td>$karyawan</th>
                                <td><center>$handphone</center></td>
                                <td>$keterangan</td>
                                <td>$harga</td>
                                <td>$panjar</td>
                                <td><b>  $status<b></td>
                                <td><center><a href='detail_pesanan&id_pesanan=$id_pesanan' class='btn btn-primary' title='Edit $isi_pesanan'>Ubah </a> &bullet; <a class='btn btn-danger'style='cursor:pointer' onclick='hapusPesanan($id_hapus)' >Hapus</a></center></td>
                            </tr>";
                    }
                   // $conn->close();
                    echo "</tbody></table>";
                       
                    } else {
                        echo "<hr />";
                    }

                } else {
                    echo "<div class='alert alert-danger'><strong>Terjadi kesalahan.</strong></div>";
                }
                
                // $sql_cek_row = "SELECT*FROM detail_pesanan";
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
        function hapusPesanan(id_hapus) {
            var id = id_hapus;
            swal({
                title: 'Anda Yakin?',
                text: 'Data Pesanan akan dihapus!',type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                closeOnConfirm: true
            }, function() {
                    window.location.href="./model/proses.php?del_pesanan="+id;
                });
        }
    </script>
