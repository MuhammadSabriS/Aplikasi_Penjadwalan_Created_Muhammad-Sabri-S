<?php 
session_start();
date_default_timezone_set('Asia/Makassar');
include '../lib/db/dbconfig.php';

if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = sha1(mysqli_escape_string($conn, $_POST['pwd']));

	$sql = "SELECT * FROM user WHERE email_user='$email' AND pwd_user='$pwd'";
	$query = $conn->query($sql);
	$hitung = $query->num_rows;
	
	if ($hitung!==0) {
		$ambil = $query->fetch_assoc();

		extract($ambil);

		
		if ($level_user==='pb') {
			$_SESSION['pb']=$email;
			$_SESSION['id']=$id_user;
			header("Location:../index.php");
		} elseif ($level_user==='sw') {
			$_SESSION['sw']=$email;
			$_SESSION['id']=$id_user;
			header("Location:../index.php");
		}
	}else{
		header("location:../index.php?log=2");
	}
}
elseif (isset($_GET['logout'])) {
	session_destroy();
	
}
/**********************************************************/
//
//				Proses untuk User Siswa
//
/**********************************************************/
elseif (isset($_POST['absen'])) {
	// print_r($_GET['ab']);
	// exit(); 
	if($_GET['ab']==1){
		$folderPath = "upload/masuk/";
		
		// console.log(folderPath);
	    if(empty($_POST['signed'])){
	        echo "Kosong";
	    }else{
	    // print_r('submit yes');
	    // exit();
	    $image_parts = explode(";base64,", $_POST['signed']); 
	    $image_type_aux = explode("image/", $image_parts[0]);
	    $image_type = $image_type_aux[1];
	    $image_base64 = base64_decode($image_parts[1]);
	    $fileee =uniqid().'.'.$image_type;
	    $file = $folderPath . $fileee;
	    
	    file_put_contents($file, $image_base64);
	    } 
		$month = date("m");
		$day_tgl = date("d");
		$day = date("N");
		$hour = date("H.i")." WITA";
		$ttd_masuk = $fileee ;
		$status = "Menunggu";
		$sql = "INSERT INTO data_absen (
			id_user,
			id_bln,
			id_hri,
			id_tgl,
			jam_msk,
			ttd_masuk,
			st_jam_msk) VALUES (
			?,
			?,
			?,
			?,
			?,
			?,
			?)";
		if ($statement = $conn->prepare($sql)) {
			$statement->bind_param(
				"iiiisss", $_SESSION['id'], $month, $day, $day_tgl, $hour, $ttd_masuk, $status);			
			if ($statement->execute()) {
				// Absen sukses
				$conn->close();
				header("location:../absen&ab=1");
			} else {
				header("location:../absen&ab=2");
			}
		}else {
			header("location:../absen&ab=2");
		}
		
	} else {
		// Absensi pulang -> melakukan Update jam pulang
		$folderPath = "upload/pulang/";
		if(empty($_POST['signed'])){
	        echo "Kosong";
	    }else{
	    
	    $image_parts = explode(";base64,", $_POST['signed']); 
	    $image_type_aux = explode("image/", $image_parts[0]);
	    $image_type = $image_type_aux[1];
	    $image_base64 = base64_decode($image_parts[1]);
		$fileee =uniqid().'.'.$image_type;
	    $file = $folderPath . $fileee;

	    file_put_contents($file, $image_base64);
	    } 

		
		$id_user = mysqli_real_escape_string($conn, $_SESSION['id']);
		$id_bln = date("m");
		$day_tgl = date("d");
		$day = date("N");
		$hour = date("H.i")." WITA";
		$ttd_keluar = $fileee;
		$status = "Menunggu";
		$sql = "UPDATE data_absen SET jam_klr=?, ttd_keluar=?, st_jam_klr=? WHERE id_user='$id_user' AND id_tgl='$day_tgl' AND id_bln='$id_bln'";


		if ($statement= $conn->prepare($sql)) {
			$statement->bind_param(
				"sss", $hour, $ttd_keluar, $status);

			if ($statement->execute()) {
				$conn->close();
				header("location:../absen&ab=1");

			} else {
				header("location:../absen&ab=2");
			}
		} else {
			header("location:../absen&ab=2");
		}
		
	}
}

// Simpan Catatan
elseif (isset($_POST['simpan_note'])) {
	
	if ($note !== "") {
		$id_user = $_SESSION['id'];
		$note = $_POST['note']; //mysqli_real_escape_string($conn, );
		$month = date("m");
		$day_tgl = date("d")-1;
		$day = date("N")-1;
		$id_note = "NULL";
		$status = "Menunggu";
		$sql= "INSERT INTO catatan (id_cat,
			id_user,
			id_bln,
			id_hri,
			id_tgl,
			isi_cat,
			status_cat) VALUES (?,
			?,
			?,
			?,
			?,
			?,
			?)";
		if ($statement = $conn->prepare($sql)) {
			$statement->bind_param(
				"iiiiiss", $id_note, $id_user, $month, $day, $day_tgl, $note, $status
				);
			if ($statement->execute()) {
				header("location:../catatan&st=1");
				$statement->close();
			} else {
				header("location:../catatan&st=2");
			}
		}else {
			header("location:../catatan&st=2");
		}
	} else {
		header("location:../catatan&st=2");
	}
}

/**********************************************************/
//
//				Proses untuk User Pembimbing
//
/**********************************************************/
elseif (isset($_GET['accx_absen'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:home");
	}else{
		$id_absen=$_GET['accx_absen'];
		$type = $_GET['type'];
		if ($type==="in") {
			$query = "UPDATE data_absen SET st_jam_msk=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Dikonfirmasi";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					echo "Sukses";
				}else{
					//gagal update
					echo "Gagal";
				}
				$conn->close();
			} else {
				echo "Ga siap";
			}
			
		} else {
			$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Dikonfirmasi";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					echo "Sukses";
				}else{
					//gagal update
					echo "Gagal";
				}
				$conn->close();
			} else {
				echo "Ga siap";
			}
		}
	}
}
// Aksi pembimbing buat konfirmasi absen
elseif (isset($_GET['acc_absen'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:home");
	}else{
		$id_absen=$_GET['acc_absen'];
		$type = $_GET['type'];
		if ($type==="in") {
			$query = "UPDATE data_absen SET st_jam_msk=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Dikonfirmasi";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../absen&ab=1");
				}else{
					//gagal update
					header("location:../absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../absen&ab=2");
			}
			
		} else {
			$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Dikonfirmasi";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../absen&ab=1");
				}else{
					//gagal update
					header("location:../absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../absen&ab=2");
			}
		}
	}
}
// Acc absen V2
elseif (isset($_POST['acc_absen2'])) {
	
	if (!empty($_POST['id_absen'])) {
		$count_id = count($_POST["id_absen"]);
		for($i=0; $i < $count_id; $i++) 
		{
		    $item=explode(",", $_POST["id_absen"][$i]);
		    $id_absen = "$item[0]";
		    $type = "$item[1]";
		    
		    if ($type==="in") {
				$query = "UPDATE data_absen SET st_jam_msk=? WHERE id_absen='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Dikonfirmasi";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../absen&ab=1");
					}else{
						//gagal update
						header("location:../absen&ab=2");
					}
					
				} else {
					header("location:../absen&ab=6");
				}
				
			} else {
				$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Dikonfirmasi";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../absen&ab=1");
					}else{
						//gagal update
						header("location:../absen&ab=2");
					}
					
				} else {
					header("location:../absen&ab=2");
				}
			}
		}
		$conn->close();
	} else {
		header("location:../absen&ab=2");
	}

}
// Aksi pembimbing buat declie absen
elseif (isset($_GET['dec_absen'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:home");
	}else{
		$id_absen=$_GET['dec_absen'];
		$type = $_GET['type'];
		if ($type==="in") {
			$query = "UPDATE data_absen SET st_jam_msk=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Ditolak";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../absen&ab=3");
				}else{
					//gagal update
					header("location:../absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../absen&ab=2");
			}
			
		} else {
			$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Ditolak";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../absen&ab=3");
				}else{
					//gagal update
					header("location:../absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../absen&ab=2");
			}
		}
	}
}
// Decline absen v2
elseif (isset($_POST['dec_absen2'])) {
	
	if (!empty($_POST['id_absen'])) {
		$count_id = count($_POST["id_absen"]);
		for($i=0; $i < $count_id; $i++) 
		{
		    $item=explode(",", $_POST["id_absen"][$i]);
		    $id_absen = "$item[0]";
		    $type = "$item[1]";
		    
		    if ($type==="in") {
				$query = "UPDATE data_absen SET st_jam_msk=? WHERE id_absen='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Ditolak";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../absen&ab=3");
					}else{
						//gagal update
						header("location:../absen&ab=2");
					}
					
				} else {
					header("location:../absen&ab=2");
				}
				
			} else {
				$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Ditolak";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../absen&ab=3");
					}else{
						//gagal update
						header("location:../absen&ab=2");
					}
					
				} else {
					header("location:../absen&ab=2");
				}
			}
		}
		$conn->close();
	} else {
		header("location:../absen&ab=2");
	}
}
// acc Note
elseif (isset($_GET['acc_note'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:home");
	}else{
		$id_note=$_GET['acc_note'];
		$sql = "UPDATE catatan SET status_cat=? WHERE id_cat='$id_note'";
		if ($statement = $conn->prepare($sql)) {
			$status= "Dikonfirmasi";
			$statement->bind_param(
				"s", $status
				);
			if ($statement->execute()) {
				header("location:../req_catatan&ab=1");
			}else{
				//gagal update
				header("location:../req_catatan&ab=2");
			}
			$conn->close();
		} else {
			header("location:../req_catatan&ab=2");
		}
		
	}
}
// Decline Note
elseif (isset($_GET['dec_note'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:../home");
	}else{
		$id_note=$_GET['dec_note'];
		$sql = "UPDATE catatan SET status_cat=? WHERE id_cat='$id_note'";
		if ($statement = $conn->prepare($sql)) {
			$status= "D";
			$statement->bind_param(
				"s", $status
				);
			if ($statement->execute()) {
				header("location:../req_catatan&ab=3");
			}else{
				//gagal update
				header("location:../req_catatan&ab=2");
			}
			$conn->close();
		} else {
			header("location:../req_catatan&ab=2");
		}
		
	}
}

// Tambah Member User
elseif (isset($_POST['add_user'])) {
	$query = $conn->query("SELECT id_user FROM user ORDER BY id_user DESC");
	$ambil = $query->fetch_assoc();
	$id = $ambil['id_user']+1;
	$nis = mysqli_real_escape_string($conn, $_POST['nis']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, sha1($_POST['pwd_cek']));
	$pwd_cek = mysqli_real_escape_string($conn, sha1($_POST['pwd']));
	
	$nama = mysqli_real_escape_string($conn, $_POST['nama']);
	$pendidikan = mysqli_real_escape_string($conn, $_POST['pendidikan']);
	$jk = mysqli_real_escape_string($conn, $_POST['jk']);
	$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
	$level = "sw";
	
	$sql_user = "INSERT INTO user (id_user,
		email_user,
		pwd_user,
		level_user) VALUES(?,
		?,
		?,
		?)";
	$sql_detail = "INSERT INTO detail_user (id_user,
		nis_user,
		name_user,
		pendidikan,
		alamat_user,
		jk_user) VALUES(?,
		?,
		?,
		?,
		?,
		?)";
	if ($nis==="" || $email==="" || $pwd==="" || $nama==="" || $pendidikan==="" ||$jk==="" || $alamat==="") {
		header("location:../add_user&st=4");
	}else {
		if ($pwd !== "$pwd_cek") {
			header("location:../add_user&st=5");
		} else {
			$cek =$conn->query("SELECT*FROM user WHERE email_user='$email'")->num_rows;
			$cek_nis = $conn->query("SELECT (nis_user) FROM detail_user WHERE nis_user='$nis'")->num_rows;
			if ($cek==0) {
				if ($cek_nis==0) {
					if ($statement= $conn->prepare($sql_user) AND $statement1 = $conn->prepare($sql_detail)) {
						$statement->bind_param(
							"isss", $id, $email, $pwd, $level
							);
						$statement1->bind_param(
							"isssss", $id, $nis, $nama, $pendidikan, $alamat, $jk
							);
						if ($statement->execute() && $statement1->execute()) {
							header("location:../add_user&st=1");
						} else {
							header("location:../add_user&st=2");
						}
					} else {
						header("location:../add_user&st=2");
					}
				} else {
					header("location:../add_user&st=6");
				}
				$conn->close();
			} else {
				header("location:../add_user&st=3");
			}
		}
	}
	
}

// Simpan Catatan
elseif (isset($_POST['simpan_note'])) {
	
	if ($note !== "") {
		$id_user = $_SESSION['id'];
		$note = $_POST['note']; //mysqli_real_escape_string($conn, );
		$month = date("m");
		$day_tgl = date("d");
		$day = date("N");
		$id_note = "NULL";
		$status = "Menunggu";
		$sql= "INSERT INTO catatan (id_cat,
			id_user,
			id_bln,
			id_hri,
			id_tgl,
			isi_cat,
			status_cat) VALUES (?,
			?,
			?,
			?,
			?,
			?,
			?)";
		if ($statement = $conn->prepare($sql)) {
			$statement->bind_param(
				"iiiiiss", $id_note, $id_user, $month, $day, $day_tgl, $note, $status
				);
			if ($statement->execute()) {
				header("location:../catatan&st=1");
				$statement->close();
			} else {
				header("location:../catatan&st=2");
			}
		}else {
			header("location:../catatan&st=2");
		}
	} else {
		header("location:../catatan&st=2");
	}
}


// Tambah Pesanan Baru
elseif (isset($_POST['add_pesanan'])) {
	$query = $conn->query("SELECT id_user FROM user ORDER BY id_user DESC");
	$ambil = $query->fetch_assoc();
	$id = $ambil['id_user']+1;
	$month = date("m");
	$day_tgl = date("d");
	$day = date("N");
	$tgl_masuk = date('d-m-Y H:i:s');
	$tgl_jatuh_tempo = mysqli_real_escape_string($conn, $_POST['tgl_jatuh_tempo']);
	if($tgl_jatuh_tempo)
	{
		$nilai_tanggal_jatuh_tempo = date("d-m-Y H:i:s", strtotime($tgl_jatuh_tempo));
	}else{
		$now = date("d-m-Y");
		$datamesin = mysqli_real_escape_string($conn, $_POST['mesin']);
		$queryCountPesanan = $conn->query("SELECT COUNT(*) AS jumlah FROM `detail_pesanan` WHERE tgl_masuk LIKE '%$now%' AND mesin = '$datamesin'");
		$hasil = $queryCountPesanan->fetch_assoc();
		// 25 batas pesanan per hari
		$count = $hasil['jumlah'] / 25;
		$total = floor($count) + 1;

		$nilai_tanggal_jatuh_tempo = date('d-m-Y H:i:s', strtotime("+$total days", strtotime(date('d-m-Y H:i:s'))));
		
	}
	$jam_masuk = gmdate('H:i:s', $timezone);
	$nama_customer = mysqli_real_escape_string($conn, $_POST['nama_customer']);
	$handphone = mysqli_real_escape_string($conn, $_POST['handphone']);
	// return $handphone;
	$isi_pesanan = mysqli_real_escape_string($conn, $_POST['isi_pesanan']);
	$ukuran = mysqli_real_escape_string($conn, $_POST['ukuran']);
	$banyaknya = mysqli_real_escape_string($conn, $_POST['banyaknya']);
	$kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
	$mesin = mysqli_real_escape_string($conn, $_POST['mesin']);
	// $bahan = mysqli_real_escape_string($conn, $_POST['bahan']);
	$karyawan = mysqli_real_escape_string($conn, $_POST['karyawan']);
	$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
	$harga = mysqli_real_escape_string($conn, $_POST['harga']);
	$panjar = mysqli_real_escape_string($conn, $_POST['panjar']);
	$direktori = "berkas/";
	$file_name=basename($_FILES['upload_berkas']['name']);
	$upload_berkas = move_uploaded_file($_FILES['upload_berkas']['tmp_name'],$direktori.$file_name);

	$level = "sw";
	
	// $sql_user = "INSERT INTO user (id_user,
	// 	level_user) VALUES(?,
	// 	?)";
	// $sql_detail = "INSERT INTO detail_pesanan (id_user,
	// 	id_bln,
	// 	id_hri,
	// 	id_tgl,
	// 	tgl_masuk,
	// 	jam_masuk,
	// 	nama_customer,
	// 	handphone,
	// 	isi_pesanan,
	// 	ukuran,
	// 	mesin,
	// 	-- bahan,
	// 	karyawan,
	// 	keterangan,
	// 	harga,
	// 	panjar,
	// 	file
	// 	) VALUES(?,
	// 	?,
	// 	?,
	// 	?,
	// 	?,
	// 	?,
	// 	?,
	// 	?,
	// 	?,
	// 	?,
	// 	?,
	// 	-- ?,
	// 	?,
	// 	?,
	// 	?,
	// 	?,
	// 	'".$file_name."'
	// )";
	

	// header("location:../add_pesanan&st=1");

	if ($handphone==="" || $isi_pesanan==="") {
		header("location:../add_pesanan&st=4");
	}else {
		$data = $conn->query("INSERT INTO detail_pesanan (id_user,
			id_bln,
			id_hri,
			id_tgl,
			tgl_masuk,
			tgl_jatuh_tempo,
			nama_customer,
			handphone,
			isi_pesanan,
			ukuran,
			banyaknya,
			kategori,
			mesin,
			karyawan,
			keterangan,
			harga,
			panjar,
			file,
			status
			) VALUES ($id+1,
			'".$month."',
			'".$day."',
			'".$day_tgl."',
			'".$tgl_masuk."',
			'".$nilai_tanggal_jatuh_tempo."',
			'".$nama_customer."',
			'".$handphone."',
			'".$isi_pesanan."',
			'".$ukuran."',
			'".$banyaknya."',
			'".$kategori."',
			'".$mesin."',
			'".$karyawan."',
			'".$keterangan."',
			'".$harga."',
			'".$panjar."',
			'".$file_name."',
			'Diterima'
		)");

		if($data){
			header("location:../add_pesanan&st=1");
		}else{
			header("location:../add_pesanan&st=2");
		}
			// if ($statement = $conn->prepare($sql_user) AND $statement1 = $conn->prepare($sql_detail)) {
			// 	$statement->bind_param(
			// 		"is", $id, $level
			// 		);
			// 	$statement1->bind_param(
			// 		"iiiisssssssssssss", $id, $month, $day, $day_tgl, $tgl_masuk, $jam_masuk, $nama_customer, $handphone, $isi_pesanan, $ukuran, $mesin, $bahan, $karyawan, $keterangan, $harga, $panjar, $upload_berkas
			// 		);
			// 	if ($statement->execute() && $statement1->execute()) {
			// 		header("location:../add_pesanan&st=1");
			// 	} else {
			// 		header("location:../add_pesanan&st=2");
			// 	}
			// } else {
			// 	header("location:../add_pesanan&st=2");
			// }
				
		}
	
}

// Tambah Bahan Baru
elseif (isset($_POST['add_bahan'])) {
	$query = $conn->query("SELECT id_user FROM user ORDER BY id_user DESC");
	$ambil = $query->fetch_assoc();
	$id = $ambil['id_user']+1;
	
	$nama = mysqli_real_escape_string($conn, $_POST['nama']);
	$merk = mysqli_real_escape_string($conn, $_POST['merk']);
	$kode_rak = mysqli_real_escape_string($conn, $_POST['kode_rak']);
	$harga_beli = mysqli_real_escape_string($conn, $_POST['harga_beli']);
	$harga_jual = mysqli_real_escape_string($conn, $_POST['harga_jual']);
	$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
	$level = "sw";
	
	$sql_user = "INSERT INTO user (id_user,
		level_user) VALUES(?,
		?)";
	$sql_detail = "INSERT INTO detail_bahan (id_user,
		nama_bahan,
		merk_bahan,
		kode_rak,
		harga_beli,
		harga_jual,
		keterangan) VALUES(?,
		?,
		?,
		?,
		?,
		?,
		?)";
	if ($nama==="" || $merk==="" || $kode_rak==="" || $harga_beli==="" || $harga_jual==="" || $keterangan==="") {
		header("location:../add_bahan&st=4");
	}else {
	
			if ($statement= $conn->prepare($sql_user) AND $statement1 = $conn->prepare($sql_detail)) {
				$statement->bind_param(
					"is", $id, $level
					);
				$statement1->bind_param(
					"issssss", $id, $nama, $merk, $kode_rak, $harga_beli, $harga_jual, $keterangan
					);
				if ($statement->execute() && $statement1->execute()) {
					header("location:../add_bahan&st=1");
				} else {
					header("location:../add_bahan&st=2");
				}
			} else {
				header("location:../add_bahan&st=2");
			}
					
		}
	
}

// Tambah Mesin Baru
elseif (isset($_POST['add_mesin'])) {
	$query = $conn->query("SELECT id_user FROM user ORDER BY id_user DESC");
	$ambil = $query->fetch_assoc();
	$id = $ambil['id_user']+1;
	
	$merk_mesin = mysqli_real_escape_string($conn, $_POST['merk_mesin']);
	$kode_mesin = mysqli_real_escape_string($conn, $_POST['kode_mesin']);
	$tahun_pembuatan = mysqli_real_escape_string($conn, $_POST['tahun_pembuatan']);
	$fungsi = mysqli_real_escape_string($conn, $_POST['fungsi']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$level = "sw";
	
	$sql_user = "INSERT INTO user (id_user,
		level_user) VALUES(?,
		?)";
	$sql_detail = "INSERT INTO detail_mesin (id_user,
		merk_mesin,
		kode_mesin,
		tahun_pembuatan,
		fungsi,
		status) VALUES(?,
		?,
		?,
		?,
		?,
		?)";
	if ($merk_mesin==="" || $kode_mesin==="" || $tahun_pembuatan==="" || $fungsi==="" || $status==="") {
		header("location:../add_mesin&st=4");
	}else {
	
			if ($statement= $conn->prepare($sql_user) AND $statement1 = $conn->prepare($sql_detail)) {
				$statement->bind_param(
					"is", $id, $level
					);
				$statement1->bind_param(
					"isssss", $id, $merk_mesin, $kode_mesin, $tahun_pembuatan, $fungsi, $status
					);
				if ($statement->execute() && $statement1->execute()) {
					header("location:../add_mesin&st=1");
				} else {
					header("location:../add_mesin&st=2");
				}
			} else {
				header("location:../add_mesin&st=2");
			}
					
		}
	
}

// Tambah Pimpinan Baru
elseif (isset($_POST['add_pimpinan'])) {
	$query = $conn->query("SELECT id_user FROM user ORDER BY id_user DESC");
	$ambil = $query->fetch_assoc();
	$id = $ambil['id_user']+1;
	
	$nama = mysqli_real_escape_string($conn, $_POST['name_user']);
	$jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
	$level = "pb";
	
	$sql_user = "INSERT INTO user (id_user,
		level_user) VALUES(?,
		?)";
	$sql_detail = "INSERT INTO detail_pb (id_user,
		name_user,
		jabatan) VALUES(?,
		?,
		?)";
	if ($nama===""|| $jabatan==="") {
		header("location:../add_pimpinan&st=4");
	}else {
		
					if ($statement= $conn->prepare($sql_user) AND $statement1 = $conn->prepare($sql_detail)) {
						$statement->bind_param(
							"is", $id, $level
							);
						$statement1->bind_param(
							"iss", $id, $nama, $jabatan 
							);
						if ($statement->execute() && $statement1->execute()) {
							header("location:../add_pimpinan&st=1");
						} else {
							header("location:../add_pimpinan&st=2");
						}
					} else {
						header("location:../add_pimpinan&st=2");
					}
	}
	
}





// Edit karyaawan
elseif (isset($_POST['edit_siswa'])) {
	$id = mysqli_real_escape_string($conn, $_POST['id_user']);
	$nis = mysqli_real_escape_string($conn, $_POST['nis']);
	//$pwd = mysqli_real_escape_string($conn, sha1($_POST['pwd_cek']));
	$nama = mysqli_real_escape_string($conn, $_POST['nama']);
	$pendidikan = mysqli_real_escape_string($conn, $_POST['pendidikan']);
	$jk = mysqli_real_escape_string($conn, $_POST['jk']);
	$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

	$sql_detail = "UPDATE detail_user SET nis_user=?, name_user=?, pendidikan=?, alamat_user=?, jk_user=? WHERE id_user='$id'";
	if ($nis==="" || $id==="" || $nama==="" || $pendidikan==="" ||$jk==="" || $alamat==="") {
		header("location:../siswa&id=$id&st=4");
	}else {
		if ($statement= $conn->prepare($sql_detail)) {
				$statement->bind_param(
					"sssss", $nis, $nama, $pendidikan, $alamat, $jk
					);
				if ($statement->execute()) {
					header("location:../siswa&id_siswa=$id&st=1");
				} else {
					header("location:../siswa&id_siswa=$id&st=2");
				}
			} else {
				header("location:../siswa&id_siswa=$id&st=2");
			}
		/*$cek_nis = $conn->query("SELECT (nis_user) FROM detail_user WHERE nis_user='$nis'")->num_rows;
		if ($cek_nis==0) {
			
		} else {
			header("location:../siswa&id=$id&st=6");
		}*/
		$conn->close();
		
	}
	
}



// Edit Bahan
elseif (isset($_POST['edit_bahan'])) {
	$id = mysqli_real_escape_string($conn, $_POST['id_user']);
	$nama_bahan = mysqli_real_escape_string($conn, $_POST['nama_bahan']);
	$merk_bahan = mysqli_real_escape_string($conn, $_POST['merk_bahan']);
	$kode_rak = mysqli_real_escape_string($conn, $_POST['kode_rak']);
	$harga_beli = mysqli_real_escape_string($conn, $_POST['harga_beli']);
	$harga_jual = mysqli_real_escape_string($conn, $_POST['harga_jual']);
	$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);

	$sql_detail = "UPDATE detail_bahan SET nama_bahan=?, merk_bahan=?, kode_rak=?, harga_beli=?, harga_jual=?, keterangan=? WHERE id_user='$id'";
	if ($id==="" || $nama_bahan==="" || $merk_bahan==="" || $kode_rak==="" || $harga_beli==="" || $harga_jual==="" || $keterangan==="") {
		header("location:../detail_bahan&id=$id&st=4");
	}else {
		if ($statement= $conn->prepare($sql_detail)) {
				$statement->bind_param(
					"ssssss", $nama_bahan, $merk_bahan, $kode_rak, $harga_beli, $harga_jual, $keterangan
					);
				if ($statement->execute()) {
					header("location:../detail_bahan&id_bahan=$id&st=1");
				} else {
					header("location:../detail_bahan&id_bahan=$id&st=2");
				}
			} else {
				header("location:../detail_bahan&id_bahan=$id&st=2");
			}

		$conn->close();
		
	}
	
}

// Edit Pesanan
elseif (isset($_POST['edit_pesanan'])) {
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$tgl_jatuh_tempo = mysqli_real_escape_string($conn, $_POST['tgl_jatuh_tempo']);
	$nama_customer = mysqli_real_escape_string($conn, $_POST['nama_customer']);
	$isi_pesanan = mysqli_real_escape_string($conn, $_POST['isi_pesanan']);
	$ukuran = mysqli_real_escape_string($conn, $_POST['ukuran']);
	$banyaknya = mysqli_real_escape_string($conn, $_POST['banyaknya']);
	$mesin = mysqli_real_escape_string($conn, $_POST['mesin']);

	$karyawan = mysqli_real_escape_string($conn, $_POST['karyawan']);
	$handphone = mysqli_real_escape_string($conn, $_POST['handphone']);
	$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
	$harga = mysqli_real_escape_string($conn, $_POST['harga']);
	$panjar = mysqli_real_escape_string($conn, $_POST['panjar']);
	$sql_detail = "UPDATE detail_pesanan SET tgl_jatuh_tempo=?, nama_customer=?, isi_pesanan=?, ukuran=?, banyaknya=?, mesin=?, karyawan=?, handphone=?, keterangan=?, harga=?, panjar=? WHERE id='$id'";
	if ($id==="" || $tgl_jatuh_tempo==="" || $nama_customer==="" || $isi_pesanan==="" || $ukuran==="" || $banyaknya==="" ||$mesin==="" || $karyawan==="" || $handphone==="" || $keterangan==="" || $harga==="" || $panjar==="") {
		header("location:../detail_pesanan&id=$id&st=4");
	}else {
		if ($statement= $conn->prepare($sql_detail)) {
				$statement->bind_param(
					"sssssssssss", $tgl_jatuh_tempo, $nama_customer, $isi_pesanan, $ukuran, $banyaknya, $mesin, $karyawan, $handphone, $keterangan, $harga, $panjar
					);
				if ($statement->execute()) {
					header("location:../detail_pesanan&id_pesanan=$id&st=1");
				} else {
					header("location:../detail_pesanan&id_pesanan=$id&st=2");
				}
			} else {
				header("location:../detail_pesanan&id_pesanan=$id&st=2");
			}

		$conn->close();
		
	}
	
}

// Edit Mesin
elseif (isset($_POST['edit_mesin'])) {
	$id = mysqli_real_escape_string($conn, $_POST['id_user']);
	$merk_mesin = mysqli_real_escape_string($conn, $_POST['merk_mesin']);
	$kode_mesin = mysqli_real_escape_string($conn, $_POST['kode_mesin']);
	$tahun_pembuatan = mysqli_real_escape_string($conn, $_POST['tahun_pembuatan']);
	$fungsi = mysqli_real_escape_string($conn, $_POST['fungsi']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$sql_detail = "UPDATE detail_mesin SET merk_mesin=?, kode_mesin=?, tahun_pembuatan=?, fungsi=?, status=?  WHERE id_user='$id'";
	if ($id==="" || $merk_mesin==="" || $kode_mesin==="" || $tahun_pembuatan==="" || $fungsi==="" || $status==="") {
		header("location:../detail_mesin&id=$id&st=4");
	}else {
		if ($statement= $conn->prepare($sql_detail)) {
				$statement->bind_param(
					"sssss", $merk_mesin, $kode_mesin, $tahun_pembuatan, $fungsi, $status
					);
				if ($statement->execute()) {
					header("location:../detail_mesin&id_mesin=$id&st=1");
				} else {
					header("location:../detail_mesin&id_mesin=$id&st=2");
				}
			} else {
				header("location:../detail_bahan&id_mesin=$id&st=2");
			}

		$conn->close();
		
	}
	
}


// Delete siswa
elseif (isset($_GET['del_siswa'])) {
	$id = mysqli_real_escape_string($conn, $_GET['del_siswa']);
	$sql_d = "DELETE FROM detail_user WHERE id_user=?";
	$sql_u = "DELETE FROM user WHERE id_user=?";
	if ($stmt= $conn->prepare($sql_d) AND $stmt1 = $conn->prepare($sql_u)) {
		$stmt->bind_param("i", $id);
		$stmt1->bind_param("i", $id);
		if ($stmt->execute() && $stmt1->execute()) {
			header("location:../siswa&st=3");
		} else {
			header("location:../siswa&st=5");
		}
	} else {
		header("location:../siswa&st=5");
	}
}

// Delete Pesanan
elseif (isset($_GET['del_pesanan'])) {
	$id = mysqli_real_escape_string($conn, $_GET['del_pesanan']);
	$sql_i = "DELETE FROM detail_pesanan WHERE id=?";
	if ($stmt= $conn->prepare($sql_i)) {
		$stmt->bind_param("i", $id);
		if ($stmt->execute()) {
			header("location:../detail_pesanan&st=3");
		} else {
			header("location:../detail_pesanan&st=5");
		}
	} else {
		header("location:../detail_pesanan&st=5");
	}
}

// Delete bahan
elseif (isset($_GET['del_bahan'])) {
	$id = mysqli_real_escape_string($conn, $_GET['del_bahan']);
	$sql_i = "DELETE FROM detail_bahan WHERE id_user=?";
	if ($stmt= $conn->prepare($sql_i)) {
		$stmt->bind_param("i", $id);
		if ($stmt->execute()) {
			header("location:../detail_bahan&st=3");
		} else {
			header("location:../detail_bahan&st=5");
		}
	} else {
		header("location:../detail_bahan&st=5");
	}
}


// Delete mesin
elseif (isset($_GET['del_mesin'])) {
	$id = mysqli_real_escape_string($conn, $_GET['del_mesin']);
	$sql_i = "DELETE FROM detail_mesin WHERE id_user=?";
	if ($stmt= $conn->prepare($sql_i)) {
		$stmt->bind_param("i", $id);
		if ($stmt->execute()) {
			header("location:../detail_mesin&st=3");
		} else {
			header("location:../detail_mesin&st=5");
		}
	} else {
		header("location:../detail_mesin&st=5");
	}
}

// Ganti password
elseif (isset($_POST['change-pwd'])) {
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$old = sha1(mysqli_real_escape_string($conn, $_POST['old-pwd']));
	$new = sha1(mysqli_real_escape_string($conn, $_POST['new-pwd']));
	$cek = sha1(mysqli_real_escape_string($conn, $_POST['new-pwd-cek']));
	if (!empty($old) || !empty($new) || !empty($cek) || !empty($id)) {
			if ($new !== $cek) {
				header("location:../katasandi&id=$id&st=5");
			} else {
				$sqlc = "UPDATE user SET pwd_user=? WHERE id_user='$id'";
				if ($update= $conn->prepare($sqlc)) {
					$update->bind_param("s", $new);
					if ($update->execute()) {
						header("location:../katasandi&id=$id&st=1");
					} else {
						header("location:../katasandi&id=$id&st=2");
					}
				} else {
					header("location:../katasandi&id=$id&st=2");
				}
			}
	} else {
		header("location:../katasandi&id=$id&st=4");
	}
}

else {
	echo "<script>window.alert('Waaahh.. Bandel ya !! ');window.location=('../home');</script>";
}
?>