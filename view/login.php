<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://pbs.twimg.com/profile_images/1382564317451616258/bH8JDj-R_400x400.jpg">

    <title>PERCETAKAN THE KALONG</title>

    <link href="./lib/bootstrap.min.css" rel="stylesheet">

    <link href="./lib/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="./lib/signin.css" rel="stylesheet">

    <script src="./lib/ie-emulation-modes-warning.js"></script>


  </head>

   <style>
   body {
    background-image: url('printing.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;

   }
 </style>

  <body>

    <div class="container  p-5">
      <form class="form-signin" method="post" action="model/proses.php">
       
            
       <div class="row bg-primary">
        <div class="col-md-12">
        <br>
        <td align="center"><?php echo "<img src='/scheduling/view/logo.png' width='295' height='150' />";?></td>

        <h2 class="form-signin-heading"></h2>

        <?php 
            if (isset($_GET['log'])) {
                if ($_GET['log']==2) {
                    echo "<div class='alert alert-danger'><strong>Periksa kembali email & katasandi Anda!</strong></div>";
                }
            }
         ?>
       
        <label ><i>&nbsp &nbsp &nbsp &nbsp &nbsp PLEASE INPUT YOUR ACCOUNT</i></label>

        <br>
        <br>
        <label for="inputEmail" class="sr-only">Alamat Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Alamat Email" required="" autofocus="">

        <br>
        <label for="inputPassword" class="sr-only">Kata Sandi</label>
        <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Kata Sandi" required=""><br>
    
        <input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="Masuk"><br>
       </div></div> 
      </form>

    </div> 
    <script src="./lib/ie10-viewport-bug-workaround.js"></script>


</body></html>