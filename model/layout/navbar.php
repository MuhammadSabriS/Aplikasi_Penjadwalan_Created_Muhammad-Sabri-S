<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">         <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
  <a class="navbar-brand" href="home">THE KALONG PRINTING</a>
  </div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right visible-xs visible-sm">
<li id="output_m"></li>

<?php
	if (isset($_SESSION['pb'])) {

			$link=array("","add_pesanan","add_user","add_bahan","add_mesin","detail_pesanan","siswa","detail_bahan","detail_mesin","generate","katasandi&id=$_SESSION[id]","keluar");
			$name=array("","Pesanan Baru","Tambah Karyawan","Tambah Bahan","Tambah Mesin","Daftar Pesanan","Daftar Karyawan","Daftar Bahan","Daftar Mesin","Generate Pesanan","Ubah Katasandi", "Keluar");

			for ($i=1; $i <= count($link)-1 ; $i++) {
				echo "<li><a href='$link[$i]'>$name[$i]</a></li>";
			}
   		} elseif (isset($_SESSION['sw'])) {
			$link=array("","cari_pekerjaan","pekerjaan_saya","detail_pekerjaan","detail_bahan_karyawan","keluar");
			$name=array("","Selesaikan Pesanan","Pekerjaan Saya","Data Mesin","Data Bahan","Keluar");
			
			for ($i=1; $i <= count($link)-1 ; $i++) {
				
				echo "<li><a href='$link[$i]'>$name[$i]</a></li>";
			}
   		}
 ?>
</ul>
</div>