<?php 
  session_start();

  if (!isset($_SESSION['username'])) {
    header("Location: index.php");
  }
 ?>
 <html>
  <head>
    <title>Info Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </head>
<body>
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="index.php">SIA Abduh12.esy.es</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <?php 
              if ($_SESSION['kategori'] == "1") {
                echo '
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="registrasi.php">Tambah Data SIA</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Presensi <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="presensi.php">Presensi</a></li>
                      <li><a href="absensi.php">Daftar Absensi</a></li>
                      <li><a href="infomahasiswa.php">Daftar Mahasiswa</a></li>
                    </ul>
                  </li>
                ';
              }else if($_SESSION['kategori']=="2") {
                echo '
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Dosen <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="absensi.php">Absensi</a></li>
                      <li><a href="presensi.php">Presensi</a></li>
                      <li><a href="infomahasiswa.php">Infomahasiswa</a></li>
                    </ul>
                  </li>
                ';
              }else if ($_SESSION['kategori']=="3") {
                echo '
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Mahasiswa <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="infomahasiswa.php">Info Mahasiswa</a></li>
                      <li><a href="presensi.php">Presensi</a></li>
                      </ul>
                  </li>
                ';
              }
             ?>
          </ul>
          <div class="btn-group navbar-form pull-right">
            <a class="btn btn-primary" href="profile.php"><i class="icon-user icon-white"></i><?php echo $_SESSION['username']; ?></a>
            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
            </ul>
          </div>
        </div><!--/.nav collapse -->
      </div>
    </div>
  </div>
<div class="container">

        <div class="hero-unit">
          <h1>Info Mahasiswa</h1>         
        </div>

        <table class="table" align="center" style="width:65%">
              <tr>
                <th>Nim</th>
                <th>Nama</th>
                <th>Alamat</th>
              </tr>

        <?php 
          include("koneksi2.php");
          
          $sql = "SELECT * FROM mhs";
          $result = mysqli_query($koneksi,$sql);
          
          while ($row= mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          ?>
              <tr>
                <td>
                  <?php echo $row['nim']; ?>
                </td>
                <td>
                  <?php echo $row['nama']; ?>
                </td>
                <td>
                  <?php echo $row['alamat'] ?>
                </td>
              </tr>
          
         <?php } ?> 
        </table>

         
        

      <footer>
        <p><script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/pf-button-both.gif" alt="Print Friendly and PDF"/></a></p>
        <p>Abduh12.esy.es &copy; 2015</p>
      </footer>

</div> 
  </body>
</html>
