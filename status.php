<?php
// include '../lib/db/dbconfig.php';


$dbhost = "localhost";
$dbuser = "root";
$dbpwd = "";
$dbname = "scheduling";

$con = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);

if ($con->connect_error) {
	die("error connect db");
}

$id=$_GET['id'];
$status=$_GET['status'];

// var_dump($status);

$q="UPDATE detail_pesanan SET status='$status' WHERE id=$id";

if($con->query($q) === TRUE){
	header("location:cari_pekerjaan");
}else{
	die("failed update");
}

mysqli_close($con);
// mysqli_query($conn, $q);

// header('location:cari_pekerjaan');

// var_dump(1);

?>