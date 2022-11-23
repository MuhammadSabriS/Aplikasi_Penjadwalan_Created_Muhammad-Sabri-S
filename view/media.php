<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://pbs.twimg.com/profile_images/1382564317451616258/bH8JDj-R_400x400.jpg">

    <title>THE KALONG PRINTING</title>

    <link href="./lib/bootstrap.min.css" rel="stylesheet">
    <link href="./lib/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="./lib/dashboard.css" rel="stylesheet">
    <script src="./lib/ie-emulation-modes-warning.js"></script>

    <script type="text/javascript">
    window.setTimeout("waktu()",1000);    
    function waktu() {     
    var tanggal = new Date();    
    setTimeout("waktu()",1000);    
    document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+" WITA";  
    }
    window.setTimeout("waktu_m()",1000);    
    function waktu_m() {     
    var tanggal = new Date();    
    setTimeout("waktu_m()",1000);    
    document.getElementById("output_m").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+" WITA";  
    }   
</script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <?php 
        include './model/layout/navbar.php';
        ?>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php 
          include './model/layout/sidebar.php';
          ?>  
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php 
          include './model/layout/content.php';
          ?>
        </div>
      </div>
    </div>

    <script src="./lib/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./lib/bootstrap.min.js"></script>

    <script src="./lib/holder.min.js"></script>

    <script src="./lib/ie10-viewport-bug-workaround.js"></script>
  

</body></html>