<style>
   body {
    background-image: url('color.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;

   }
 </style>
<h3 class='page-header'>DETAIL MESIN TERSEDIA</h3>
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
        if (isset($_GET['id_mesin'])) {
            if ($_GET['id_mesin']!=="") {
                $id_user=$_GET['id_mesin'];
                include './view/adm/edit_mesin.php';
            } else {
                header("location:detail_mesin");
            }
        } else {
$limit = 10;
$start = 1;
$slice = 9;
$self_server = "./detail_mesin";
$q = "SELECT * FROM detail_mesin ORDER BY id_user ASC";
$r = $conn->query($q);
$totalrows = $r->num_rows;

if(!isset($_GET['pn']) || !is_numeric($_GET['pn'])){
    $page = 1;
} else {
    $page = $_GET['pn'];
}

$numofpages = ceil($totalrows / $limit);
$limitvalue = $page * $limit - ($limit);

$q = "SELECT*FROM detail_mesin ORDER BY id_user ASC LIMIT $limitvalue, $limit";
//jika user nakal paging lebih dari data yg dimiliki
$cek_page = $conn->query($q);
if ($cek_page->num_rows != 0) {
    if ($r = $conn->query($q)) {
   
    if ($r->num_rows!==0) {
            echo "<table class='table table-striped' style='width:100%'>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>MERK MESIN</th>
                            <th><center>KODE MESIN</center></th>
                            <th><center>TAHUN PEMBUATAN</center></th>
                            <th><center>FUNGSI MESIN</center></th>
                            <th><center>STATUS</center></th>
                            
                            <th><center>AKSI</center></th>
                        </tr>
                    </thead>
                    <tbody>";
                    $query_mesin = $conn->query($q);
                    $no=0;
                    while ($get_mesin = $query_mesin->fetch_assoc()) {
                        $id_mesin = $get_mesin['id_user'];
                        $merk_mesin = $get_mesin['merk_mesin'];
                        $kode_mesin = $get_mesin['kode_mesin'];
                        $tahun_pembuatan = $get_mesin['tahun_pembuatan'];
                        $fungsi = $get_mesin['fungsi'];
                        $status = $get_mesin['status'];
                        $no++;
                        echo "<tr>
                                <td>$no</td>
                                <td>$merk_mesin</td>
                                <td><center>$kode_mesin</center></td>
                                <td><center>$tahun_pembuatan</center></td>
                                <td><center>$fungsi</center></td>
                                <td><center>$status</center></td>
                                
                                <td><center><a href='detail_mesin&id_mesin=$id_mesin' class='btn btn-primary' title='Edit $merk_mesin'>Ubah </a> &bullet; <a class='btn btn-danger'style='cursor:pointer' onclick='hapusMesin($id_mesin)' >Hapus</a></center></td>
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
                
                $sql_cek_row = "SELECT*FROM detail_mesin";
                $q_cek = $conn->query($sql_cek_row);
                $hitung = $q_cek->num_rows;
                if ($hitung >= $limit) {
                    echo "<hr><ul class='pagination'>";
                   if($page!= 1){
                        $pageprev = $page - 1;
                        echo '<li><a href="'.$self_server.'&pn='.$pageprev.'"><<</a></li>';
                    }else{
                        echo "<li><a><<</a></li>";
                    }

                    if (($page + $slice) < $numofpages) {
                        $this_far = $page + $slice;
                    } else {
                        $this_far = $numofpages;
                    }

                    if (($start + $page) >= 10 && ($page - 10) > 0) {
                        $start = $page - 10;
                    }

                    for ($i = $start; $i <= $this_far; $i++){
                        if($i == $page){
                            echo "<li class='active'><a>".$i."</a></li> ";
                        }else{
                            echo '<li><a href="'.$self_server.'&pn='.$i.'">'.$i.'</a></li> ';
                        }
                    }

                    if(($totalrows - ($limit * $page)) > 0){
                        $pagenext = $page + 1;
                        echo '<li><a href="'.$self_server.'&pn='.$pagenext.'">>></a></li>';
                    }else{
                        echo "<li><li><a>>></a></li>";
                    }
                    echo "</ul>";
                }
            } else {
                echo "<div class='alert alert-danger'><strong>Tidak ada data untuk ditampilkan</strong></div>";
            }
        }
     ?>
</div>
<script src="lib/js/sweetalert2.min.js"></script> <link rel="stylesheet" type="text/css" href="lib/js/sweetalert2.css">
    <script>
        function hapusMesin(id_mesin) {
            var id = id_mesin;
            swal({
                title: 'Anda Yakin?',
                text: 'Data Mesin akan dihapus!',type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                closeOnConfirm: true
            }, function() {
                    window.location.href="./model/proses.php?del_mesin="+id;
                });
        }
    </script>
