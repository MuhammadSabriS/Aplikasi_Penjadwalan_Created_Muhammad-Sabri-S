<!DOCTYPE html>
<html>
<head>
 <title>GENERATE PESANAN</title>
</head>
<body>
 <style type="text/css">
 body{
 font-family: sans-serif;
 }
 table{
 margin: 20px auto;
 border-collapse: collapse;
 }
 table th,
 table td{
 border: 1px solid #3c3c3c;
 padding: 3px 8px;

 }
 a{
 background: blue;
 color: #fff;
 padding: 8px 10px;
 text-decoration: none;
 border-radius: 2px;
 }

    .tengah{
        text-align: center;
    }
 </style>
<h1 class="my-1"><font size="4">-------------------------------------------------------------------------Halaman Customer-------------------------------------------------------------------------</font></h1>
<table table border="1" width="1050px" class="table table-borderless text-center">
          <tr>
            <td><center><img width="80px" height="100px" src="/scheduling/view/adm/img/soppeng.png"></center></td>
            <td height = "50px">
              <center>
              <h5 class="my-1"><font size="4">CV. THE KALONG KABUPATEN SOPPENG</font></h5>
              <h5 class="my-1"><font size="3">Jl. Lawo, Watansopeng, Indonesia, South Sulawesi</font></h5>
              <h5 class="my-1"><font size="3">Call Center : 0815-4721-1112</font></h5>
              </center>
            </td>
          <td><center><img width="180px" height="100px" src ="/scheduling/view/adm/img/logo.png"></center></td>
          </tr>
      </table>


<?php 
 $koneksi = mysqli_connect("localhost","root","","scheduling");
 $name = $_GET['generate'] ;
 $data = mysqli_query($koneksi,"SELECT * FROM detail_pesanan INNER JOIN bulan ON detail_pesanan.id_bln = bulan.id_bln INNER JOIN tanggal ON detail_pesanan.id_tgl=tanggal.id_tgl WHERE detail_pesanan.nama_customer = '$name' ORDER BY id_user ASC");
  $d = mysqli_fetch_array($data)
 ?> 
<tr>
  <b><th>Generate Pesanan </th> </b> <br>
  <b><th>Nama Customer &nbsp &nbsp &nbsp &nbsp &nbsp: &nbsp </th> </b>
      <td><?php echo $d['nama_customer']; ?></td> <br>
  <b><th>Nomor Handphone &nbsp &nbsp : &nbsp </th> </b>
      <td><?php echo $d['handphone']; ?></td> <br>
  <b><th>Bertugas &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: &nbsp </th> </b>
      <td><?php echo $d['karyawan']; ?></td> <br>
  

</tr>


 <table>
          <tr>
                            <th>NO</th>
                            <th>TANGGAL MASUK</th>
                            <th>JATUH TEMPO</th>
                            <th>PESANAN</th>
                            <th>UKURAN</th>
                            <th>MESIN</th>
                            <th>KETERANGAN</th>
                            <th>HARGA</th>
                            <th>PANJAR</th>
          </tr>
 <?php 
  // koneksi database
 $koneksi = mysqli_connect("localhost","root","","scheduling");

 // menampilkan data pegawai
 
                $name = $_GET['generate'] ;
             
                $data = mysqli_query($koneksi,"SELECT * FROM detail_pesanan
                INNER JOIN bulan
                ON detail_pesanan.id_bln = bulan.id_bln
                INNER JOIN tanggal
                ON detail_pesanan.id_tgl=tanggal.id_tgl
                WHERE detail_pesanan.nama_customer = '$name'
                ORDER BY id_user ASC");
                $index = 1;
 while($d = mysqli_fetch_array($data)){
 ?> 
 <tr>
   
                     <td style='text-align: center;'><?php echo $index++ ?></td>
                     
                    <td><center><?php echo $d['tgl_masuk']; ?></center></td>
                    <td><center><?php echo $d['tgl_jatuh_tempo']; ?></center></td>
                    <td><center><?php echo $d['isi_pesanan']; ?></center></td>
                    <td><center><?php echo $d['ukuran']; ?></center></td>
                    <td><center><?php echo $d['mesin']; ?></center></td>
                    <td><center><?php echo $d['keterangan']; ?></center></td>
                    <td><center><?php echo $d['harga']; ?></center></td>
                    <td><center><?php echo $d['panjar']; ?></center></td>


 </tr>

 <?php 
 }
 ?>
</table>
<h3 class="my-1"><font size="2"> *Terimakasih Atas Kepercayaan anda </font> </h3>

<h1 class="my-1"><font size="4">-----------------------------------------------------------------------Halaman Perusahaan------------------------------------------------------------------------</font></h1>


<table table border="1" width="1050px" class="table table-borderless text-center">
          <tr>
            <td><center><img width="80px" height="100px" src="/scheduling/view/adm/img/soppeng.png"></center></td>
            <td height = "50px">
              <center>
              <h5 class="my-1"><font size="4">CV. THE KALONG KABUPATEN SOPPENG</font></h5>
              <h5 class="my-1"><font size="3">Jl. Lawo, Watansopeng, Indonesia, South Sulawesi</font></h5>
              <h5 class="my-1"><font size="3">Call Center : 0815-4721-1112</font></h5>
              </center>
            </td>
          <td><center><img width="180px" height="100px" src ="/scheduling/view/adm/img/logo.png"></center></td>
          </tr>
      </table>


<?php 
 $koneksi = mysqli_connect("localhost","root","","scheduling");
 $name = $_GET['generate'] ;
 $data = mysqli_query($koneksi,"SELECT * FROM detail_pesanan INNER JOIN bulan ON detail_pesanan.id_bln = bulan.id_bln INNER JOIN tanggal ON detail_pesanan.id_tgl=tanggal.id_tgl WHERE detail_pesanan.nama_customer = '$name' ORDER BY id_user ASC");
  $d = mysqli_fetch_array($data)
 ?> 
<tr>
  <b><th>Generate Pesanan </th> </b> <br>
  <b><th>Nama Customer &nbsp &nbsp &nbsp &nbsp &nbsp: &nbsp </th> </b>
      <td><?php echo $d['nama_customer']; ?></td> <br>
  <b><th>Nomor Handphone &nbsp &nbsp : &nbsp </th> </b>
      <td><?php echo $d['handphone']; ?></td> <br>
  <b><th>Bertugas &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: &nbsp </th> </b>
      <td><?php echo $d['karyawan']; ?></td> <br>
  

</tr>


 <table>
          <tr>
                            <th>NO</th>
                            <th>TANGGAL MASUK</th>
                            <th>JATUH TEMPO</th>
                            <th>PESANAN</th>
                            <th>UKURAN</th>
                            <th>MESIN</th>
                            <th>KETERANGAN</th>
                            <th>HARGA</th>
                            <th>PANJAR</th>
          </tr>
 <?php 
  // koneksi database
 $koneksi = mysqli_connect("localhost","root","","scheduling");

 // menampilkan data pegawai
 
                $name = $_GET['generate'] ;
             
                $data = mysqli_query($koneksi,"SELECT * FROM detail_pesanan
                INNER JOIN bulan
                ON detail_pesanan.id_bln = bulan.id_bln
                INNER JOIN tanggal
                ON detail_pesanan.id_tgl=tanggal.id_tgl
                WHERE detail_pesanan.nama_customer = '$name'
                ORDER BY id_user ASC");
                $index = 1;
 while($d = mysqli_fetch_array($data)){
 ?> 
 <tr>
   
                     <td style='text-align: center;'><?php echo $index++ ?></td>
                     
                    <td><center><?php echo $d['tgl_masuk']; ?></center></td>
                    <td><center><?php echo $d['tgl_jatuh_tempo']; ?></center></td>
                    <td><center><?php echo $d['isi_pesanan']; ?></center></td>
                    <td><center><?php echo $d['ukuran']; ?></center></td>
                    <td><center><?php echo $d['mesin']; ?></center></td>
                    <td><center><?php echo $d['keterangan']; ?></center></td>
                    <td><center><?php echo $d['harga']; ?></center></td>
                    <td><center><?php echo $d['panjar']; ?></center></td>


 </tr>

 <?php 
 }
 ?>

</table>
<h3 class="my-1"><font size="2"> *Halaman Untuk Disimpan Sebagai Arsip </font> </h3>


 <script>
 window.print();
 </script>
</body>
</html>