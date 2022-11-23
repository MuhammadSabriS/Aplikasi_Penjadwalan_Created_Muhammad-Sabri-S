 <head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
	if (isset($_SESSION['sw'])) {
		$sql = "SELECT*FROM detail_pesanan WHERE mesin='$_SESSION[id]'";
	    $query = $conn->query($sql);
		$get_mesin=$query->fetch_assoc();
		$kode_mesin = $get_mesin['kode_mesin'];
		$mesin = $get_mesin['mesin'];

		
	// 		if ($conn->query("SELECT*FROM detail_pesanan WHERE mesin='$mesin'")->num_rows!==0) {

	// 			$no=0;
	// 		 	$query_mesin=$conn->query("SELECT*FROM detail_pesanan ORDER BY mesin ASC");
	// 		 	while ($get_mesin=$query_mesin->fetch_assoc()) {
	// 		      // $month=$get_month['nama_bln'];
	// 		      // $id_month=$get_month['id_bln'];
			      
	// 		      // $query_absen=$conn->query("SELECT*FROM detail_pesanan NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal WHERE id_bln='$id_month' AND mesin='$mesin'");
			      
	// 		      $cek = $query_mesin->num_rows;
	// 		      if ($cek!==0) {
			       
	// 		        echo "<div class='table-responsive'>
	// 		           <table class='table table-striped'>
 //                    <thead>
 //                        <tr>
 //                            <th>No</th>
 //                            <th>Mesin</th>
 //                            <th>Bahan</th>
 //                            <th>Estimasi</th>
 //                        </tr>
 //                    </thead>
 //                    <tbody>";
	// 		         $no=0;
 //                while ($get_mesin = $query->fetch_assoc()) {
 //                    $merk_mesin = $get_mesin['id_user'];
 //                    $mesin = $get_mesin['mesin'];
 //                    $bahan = $get_mesin['bahan'];
 //                    $estimasi = $get_mesin['estimasi'];
 //                    $no++;
 //                    echo "<tr>
 //                            <td>$no</td>
 //                            <td>$mesin</td>
 //                            <td>$bahan</td>
 //                            <td>$estimasi</td>
	// 		              </tr>";
	// 		          }
	// 		          echo "</table></div>";
	// 		      	}
	// 			}
	// 		// $conn->close();
	// 		} else {
	// 			echo "<div class='alert alert-warning'><strong>Tidak ada Data untuk ditampilkan.</strong></div>";
	// 		}
	// } else {
	 //    $merk_mesin = mysqli_real_escape_string($conn, $_GET['merk_mesin']);
		// $query = $conn->query("SELECT*FROM detail_mesin WHERE merk_mesin='$merk_mesin'");
		// $get_user=$query->fetch_assoc();
		// $kode_mesin = $get_user['kode_mesin'];
		// $merk_mesin = $get_user['merk_mesin'];


        $mesin = mysqli_real_escape_string($conn, $_GET['merk_mesin']);
		$query_mesin = $conn->query("SELECT*FROM detail_mesin WHERE merk_mesin='$mesin'");
		// $get_mesin=$query->fetch_assoc();
		$kode_mesin = $get_mesin['kode_mesin'];
		$merk_mesin = $get_mesin['merk_mesin'];

			if ($conn->query("SELECT*FROM detail_pesanan WHERE mesin='$mesin'")->num_rows!==0) {
				$no=0;
			 	// $query_month=$conn->query("SELECT*FROM detail_mesin ORDER BY merk_mesin ASC");
			 	?>

			     <!--  <p align=right>
					<a href="/presensi/view/adm/cetak1.php?&mesin=<?php echo $mesin ?>" type="button" class="btn btn-success"target="_blank"><i class="fa fa-floppy-o">&nbspSimpan PDF</i></a> </p> -->
			      <?php
			 	// while ($get_month=$query_month->fetch_assoc()) {
			  //     $month = $get_month['nama_bln'];
			  //     $year = date("Y");
			  //     $id_month=$get_month['id_bln'];
			      
			  //     $query_absen=$conn->query("SELECT*FROM detail_pesanan NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal WHERE id_bln='$id_month' AND mesin='$mesin'");
			      
			      // $cek = $query_mesin->num_rows;
			      
			      // if ($cek!==0) {

			    // $q = "SELECT*FROM detail_pesanan ORDER BY mesin ASC LIMIT $limitvalue, $limit";



   			$sql = "SELECT*FROM detail_pesanan ORDER BY mesin ASC";
            $query_mesin = $conn->query($sql);
            if ($query_mesin->num_rows!==0) {
			        echo "<h4 class='sub-header'><strong>Mesin :</strong> $mesin</h4>";
			        echo "<div class='table-responsive'>
			           <table class='table table-striped'>
			            <thead>
			               <tr>
			                <th>No</th>
                            <th>Mesin</th>
                            <th>Bahan</th>
                            <th>Estimasi</th>
			                
			               </tr>
			            </thead>
			            <tbody>";
			          $no=0;

			          while ($get_mesin=$query_mesin->fetch_assoc()) {
			            $no++;
			            // $merk_mesin = $get_mesin['merk_mesin'];
                        $mesin = $get_mesin['mesin'];
                        $bahan = $get_mesin['bahan'];
                        $estimasi = $get_mesin['estimasi'];
			            echo "<tr>
			       				<td>$no</td>
                                <td>$mesin</td>
                                <td>$bahan</td>
                                <td>$estimasi</td>
			              </tr>";
			          }
			          echo "</table></div>";
			      	}
				}
				$conn->close();
			} else {
				echo "<div class='alert alert-warning'><strong>Tidak ada Pekerjaan untuk ditampilkan.</strong></div>";
			}
	
?>