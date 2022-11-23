<?php
if (strcmp($page, "absen")==0) {
        if (isset($_SESSION['sw'])) {
          include './view/detail_pekerjaan.php';
        } elseif (isset($_SESSION['pb'])) {
          include './view/adm/add_user.php';
        }
      }elseif (strcmp($page, "mesin")==0) {
        
        if (isset($_SESSION['sw'])) {
          include './view/mesin.php';
          } elseif (isset($_SESSION['pb'])) {
            include './view/adm/detail_mesin.php';
          }

      } elseif (strcmp($page, "detail_bahan_karyawan")==0) {
        if (!isset($_SESSION['sw'])) {
            header("location:home");
        }else {
            include './view/detail_bahan_karyawan.php';
        }
      // }elseif (strcmp($page, "catatan")==0) {
        
      //   if (isset($_SESSION['sw'])) {
      //     include './view/note.php';
      //     } elseif (isset($_SESSION['pb'])) {
      //       include './view/adm/catatan.php';
      //     }
     
      // }elseif (strcmp($page, "tambah_catatan")==0) {
      //   include './view/add_note.php';
      // }elseif (strcmp($page, "req_catatan")==0) {
      //   if (!isset($_SESSION['pb'])) {
      //       header("location:home");
      //   }else {
      //       include './view/adm/req_catatan.php';
      //   }

       }elseif (strcmp($page, "add_pesanan")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
          include './view/adm/add_pesanan.php';
        }
  
      }elseif (strcmp($page, "add_user")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
          include './view/adm/add_user.php';
        }

       } elseif (strcmp($page, "add_bahan")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/add_bahan.php';
        }
       } elseif (strcmp($page, "add_mesin")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/add_mesin.php';
        }
      } elseif (strcmp($page, "siswa")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/siswa.php';
        }
       } elseif (strcmp($page, "detail_pesanan")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/detail_pesanan.php';
        }  

        } elseif (strcmp($page, "cari_pekerjaan")==0) {
        if (!isset($_SESSION['sw'])) {
            header("location:home");
        }else {
            include 'cari_pekerjaan.php';
        }  

        } elseif (strcmp($page, "pekerjaan_saya")==0) {
        if (!isset($_SESSION['sw'])) {
            header("location:home");
        }else {
            include './view/pekerjaan_saya.php';
        } 

       } elseif (strcmp($page, "detail_pekerjaan")==0) {
        if (!isset($_SESSION['sw'])) {
            header("location:home");
        }else {
            include './view/detail_pekerjaan.php';
        }  
      } elseif (strcmp($page, "detail_bahan")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/detail_bahan.php';
        }
      } elseif (strcmp($page, "detail_mesin")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/detail_mesin.php';
        }

      } elseif (strcmp($page, "generate")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/generate.php';
        }

      } elseif (strcmp($page, "katasandi")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/katasandi.php';
        }
      } elseif (strcmp($page, "keluar")==0) {
        header("location:view/logout.php");
      } else {
        header("location:absen");
      }
?>