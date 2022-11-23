<!DOCTYPE html>
<html>
<head>
 <title>RESI PESANAN</title>
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
 <?php 
  $koneksi = mysqli_connect("localhost","root","","scheduling");
 $data = mysqli_query($koneksi,"SELECT * FROM detail pesanan ORDER BY id DESC LIMIT 1");

 ?> 
<h1 class="my-1"><font size="4">------------------------------------------------------Halaman Customer------------------------------------------------------</font></h1>
<table table border="1" width="820px" class="table table-borderless text-center">
          <tr>
            <td><img width="80px" height="100px" src="/scheduling/view/adm/img/soppeng.png"></td>
            <td height = "50px">
              <center>
              <h5 class="my-1"><font size="4">CV. THE KALONG KABUPATEN SOPPENG</font></h5>
              <h5 class="my-1"><font size="3">Jl. Lawo, Watansopeng, Indonesia, South Sulawesi</font></h5>
              <h5 class="my-1"><font size="3">Call Center : 0815-4721-1112</font></h5>
              </center>
            </td>
          <td><img width="180px" height="100px" src ="/scheduling/view/adm/img/logo.png"></td>
          </tr>
      </table>

<table table border="1" width="820px" class="table table-borderless text-center">
          <tr>
<td>
            <td height = "50px">
              
              <h5 class="my-1">Pesanan Masuk &nbsp &nbsp &nbsp : 
                 <?php
                  $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal ORDER BY id DESC LIMIT 1");
                  $q2=mysqli_fetch_array($sql2);
                  $waktu = "$q2[tgl_masuk]";;
                  echo $waktu; 
                 ?> </h5>
              <h5 class="my-1">Nama Customer &nbsp &nbsp &nbsp : 
                 <?php
                  $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
                  $q2=mysqli_fetch_array($sql2);
                  echo $q2['nama_customer']; 
                  ?> </h5>
              <h5 class="my-1">Karyawan Bertugas :
                  <?php
                  $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
                  $q2=mysqli_fetch_array($sql2);
                  echo $q2['karyawan']; 
                  ?> </h5>

            </td>
              
            <th>
              <h5 class="my-1">Jatuh Tempo :
                 <?php
                  $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal ORDER BY id DESC LIMIT 1");
                  $q2=mysqli_fetch_array($sql2);
                  $date2 = "$q2[tgl_jatuh_tempo]";
                  echo $date2; 
                 ?> </h5>
              </h5>

              <h5 class="my-1">Mesin:
                <?php
                $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
                $q2=mysqli_fetch_array($sql2);
                echo $q2['mesin']; 
                ?>
              </h5>

              <h5 class="my-1"><font size="4">Harga:
                <?php
                $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
                $q2=mysqli_fetch_array($sql2);
                echo $q2['harga']; 
                ?>
              </font></h5>

            </th>


            

<td>

          </tr>
      </table>


 <table table border="1" width="820px">
 <tr>
  <th>No</th>
  <th>PESANAN</th>
  <th>UKURAN</th>
  <th>KETERANGAN PESANAN</th>
  <th>PANJAR</th>
 </tr>

 <tr>
    <td><center>
         <?php
          $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
          $q2=mysqli_fetch_array($sql2);
          echo $q2['id']; 
          ?></center>
     </td>

    <td><center>
         <?php
          $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
          $q2=mysqli_fetch_array($sql2);
          echo $q2['isi_pesanan']; 
          ?></center>
     </td>
    <td><center>
         <?php
          $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
          $q2=mysqli_fetch_array($sql2);
          echo $q2['ukuran']; 
          ?></center>
     </td>
    
    <td><center>
         <?php
          $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
          $q2=mysqli_fetch_array($sql2);
          echo $q2['keterangan']; 
          ?></center>
     </td>    
     
     <td><center>
         <?php
          $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
          $q2=mysqli_fetch_array($sql2);

          echo $q2['panjar']; 
          ?></center>
     </td>  
 </tr>

 <?php 
 
 ?>

</table>

<h3 class="my-1"><font size="2"> *Terimakasih Atas Kepercayaan anda </font> </h3>



<h1 class="my-1"><font size="4">----------------------------------------------------Halaman Perusahaan-----------------------------------------------------</font></h1>
<table table border="1" width="820px" class="table table-borderless text-center">
          <tr>
            <td><img width="80px" height="100px" src="/scheduling/view/adm/img/soppeng.png"></td>
            <td height = "50px">
              <center>
              <h5 class="my-1"><font size="4">CV. THE KALONG KABUPATEN SOPPENG</font></h5>
              <h5 class="my-1"><font size="3">Jl. Lawo, Watansopeng, Indonesia, South Sulawesi</font></h5>
              <h5 class="my-1"><font size="3">Call Center : 0815-4721-1112</font></h5>
              </center>
            </td>
          <td><img width="180px" height="100px" src ="/scheduling/view/adm/img/logo.png"></td>
          </tr>
      </table>

<table table border="1" width="820px" class="table table-borderless text-center">
          <tr>
<td>
            <td height = "50px">
              
              <h5 class="my-1">Pesanan Masuk &nbsp &nbsp &nbsp : 
                 <?php
                  $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal ORDER BY id DESC LIMIT 1");
                  $q2=mysqli_fetch_array($sql2);
                  $waktu = "$q2[tgl_masuk]";;
                  echo $waktu; 
                 ?> </h5>
              <h5 class="my-1">Nama Customer &nbsp &nbsp &nbsp : 
                 <?php
                  $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
                  $q2=mysqli_fetch_array($sql2);
                  echo $q2['nama_customer']; 
                  ?> </h5>
              <h5 class="my-1">Karyawan Bertugas :
                  <?php
                  $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
                  $q2=mysqli_fetch_array($sql2);
                  echo $q2['karyawan']; 
                  ?> </h5>

            </td>
              
            <th>
              <h5 class="my-1">Jatuh Tempo :
                 <?php
                  $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal ORDER BY id DESC LIMIT 1");
                  $q2=mysqli_fetch_array($sql2);
                  $date2 = "$q2[tgl_jatuh_tempo]";
                  echo $date2; 
                 ?> </h5>
              </h5>

              <h5 class="my-1">Mesin:
                <?php
                $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
                $q2=mysqli_fetch_array($sql2);
                echo $q2['mesin']; 
                ?>
              </h5>

              <h5 class="my-1"><font size="4">Harga:
                <?php
                $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
                $q2=mysqli_fetch_array($sql2);
                echo $q2['harga']; 
                ?>
              </font></h5>

            </th>


            

<td>

          </tr>
      </table>


 <table table border="1" width="820px">
 <tr>
  <th>No</th>
  <th>PESANAN</th>
  <th>UKURAN</th>
  <th>KETERANGAN PESANAN</th>
  <th>PANJAR</th>
 </tr>

 <tr>
    <td><center>
         <?php
          $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
          $q2=mysqli_fetch_array($sql2);
          echo $q2['id']; 
          ?></center>
     </td>

    <td><center>
         <?php
          $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
          $q2=mysqli_fetch_array($sql2);
          echo $q2['isi_pesanan']; 
          ?></center>
     </td>
    <td><center>
         <?php
          $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
          $q2=mysqli_fetch_array($sql2);
          echo $q2['ukuran']; 
          ?></center>
     </td>
    
    <td><center>
         <?php
          $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
          $q2=mysqli_fetch_array($sql2);
          echo $q2['keterangan']; 
          ?></center>
     </td>    
     
     <td><center>
         <?php
          $sql2=mysqli_query($koneksi,"SELECT * FROM detail_pesanan ORDER BY id DESC LIMIT 1");
          $q2=mysqli_fetch_array($sql2);
          echo $q2['panjar']; 
          ?></center>
     </td>    
 </tr>

 <?php 
 
 ?>

</table>
<h4 class="my-1"><font size="2"> *Terimakasih Atas Kepercayaan anda </font> </h4>



 <script>
 window.print();
 </script>
</body>
</html>