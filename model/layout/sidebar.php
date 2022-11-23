
<ul class="nav nav-sidebar">
<li id="output"></li>
   <?php
   		if (isset($_SESSION['pb'])) {
   			$link=array("","add_pesanan","add_user","add_bahan","add_mesin","detail_pesanan","siswa","detail_bahan","detail_mesin","generate","katasandi&id=$_SESSION[id]","keluar");
			$name=array("","Pesanan Baru","Tambah Karyawan","Tambah Bahan","Tambah Mesin","Daftar Pesanan","Daftar Karyawan","Daftar Bahan","Daftar Mesin","Generate Pesanan","Ubah Katasandi", "Keluar");

			for ($i=1; $i <= count($link)-1 ; $i++) {
				if (strcmp($page, "$link[$i]")==0) {
			        $status = "class='active'";
			      } else {
			      	$status = "";
			      }
			  
				echo "<li $status><a href='$link[$i]'>$name[$i]</a></li>";
			}
   		} elseif (isset($_SESSION['sw'])) {
   			$this_day = date("d");
			$sql = "SELECT*FROM detail_pesanan";
			$query = $conn->query($sql);

			// $query_tday = $query->fetch_assoc();

			$link=array("","cari_pekerjaan","pekerjaan_saya","detail_pekerjaan","detail_bahan_karyawan","keluar");
			$name=array("","Selesaikan Pesanan","Pekerjaan Saya","Data Mesin","Data Bahan","Keluar");
			
			for ($i=1; $i <= count($link)-1 ; $i++) {
				if (strcmp($page, "$link[$i]")==0) {
			        $status = "class='active'";
			      } else {
			      	$status = "";
			      }
			    if ($query->num_rows==0 && $link[$i]==="absen") {
					$warning = "<img src='./lib/img/warning.png' width='20' />";
				} else {
					$warning = "";
				}
				echo "<li $status><a href='$link[$i]'>$name[$i] $warning</a></li>";
			}
   		}
	?>
</ul>