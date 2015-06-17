<!DOCTYPE html>
<?php 
  session_start();
  if (isset($_SESSION['kategori'])) {
     if ($_SESSION['kategori']==1) {
      header("location:beranda.php");
    }else if ($_SESSION['kategori']==2) {
      header("location:beranda.php");
    }else if ($_SESSION['kategori']==3) {
      header("location:beranda.php");
    }  
  }
 ?>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Akademik - Abduh12.esy.es</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <style type="text/css">
    body  {
      background-image: url("331326-book-hd-wallpaper.jpg");
    }
    </style>
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SIA ABSENSI - Abduh12.esy.es</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".contact">Contact</button></li>
            <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Sign in</button></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="modal fade contact" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="container">
        <div class="hero-unit">
      <h1>Information</h1>
      <h4>Contact Person:</h4>
      -08980460004<br>
      -08123415515<br>
      -08123551612<br>
      <br>
        </div>
      </div>
    </div>
  </div>
</div>

  

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     </form>
     <form class="form-signin" method="post">
      <H2 class="form-signin-heading">Silahkan Masuk</H2>
      <label class="sr-only">Username</label>
      <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
      <label class="sr-only">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox">
        <label>
          <input type="checkbox" value="remember-me">Remember Me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Sign in</button>
     </form>
     <?php 
      include("koneksi2.php");
      
      if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $kategori;

        $select = "SELECT * FROM login WHERE username='$username' AND password='$password';";
        $result = mysqli_query($koneksi, $select);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (mysqli_num_rows($result)==1) {
          $_SESSION['username'] = $row['username'];
          $_SESSION['kategori'] = $row['kategori'];


          if ($_SESSION['kategori']==2) {
            $_SESSION['nama'] = $row['nama'];
          }

          header("location:beranda.php");
          
        }else{
          echo "<div class='alert alert-danger' role='alert'>Login GAGAL!! Periksa kembali username dan password anda</div>";
        }


        mysqli_close($koneksi);
      } 
      ?>
    </div>
  </div>
</div>
<div class="container">

        <div class="hero-unit" align="center">
        <h1 style="color: black;">Sistem Informasi Akademik</h1>
        <p style="color: black;">Selamat datang di website sistem informasi akademik, silahkan login</p>
        <p style="color: black;">untuk pendaftaran silahkan hubungi admin</p>
        </div>

        



      <hr>

      <footer>
        <p>Abduh12.esy.es &copy; 2015</p>
      </footer>

</div> 
  </body>

     
  </body>
</html>