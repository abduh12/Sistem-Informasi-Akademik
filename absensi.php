<?php 
  session_start();
  include ("koneksi2.php");
  $namadosen = $_SESSION['nama'];
  if (!isset($_SESSION['username'])) {
    header("Location: index.php");
  }
  if (isset($_SESSION['kategori'])) {
     if ($_SESSION['kategori']==3) {
      header("location:beranda.php");
    }
      
  }
 ?>
<html>
<head>
	<title>Absensi</title>
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
  
  </br>
 	<div class="container theme-showcase" role="main">
      <div class="jumbotron">
        <?php
          $tgl = date("Y-m-d");
          echo "Tanggal hari ini : ".$tgl."</br>";
        ?>
  <?php 
    if ($_SESSION['kategori']==2) {

   ?>
   <br>
   <form method="post">
        Matakuliah :
        <select name="matkul">
        <?php 
          $query="SELECT dosen.nid, dosen.nama, matkul.idmk, matkul.namamk FROM(dosenmk LEFT JOIN dosen on dosen.nid = dosenmk.nid) LEFT JOIN matkul on matkul.idmk = dosenmk.idmk WHERE dosen.nama = '$namadosen'";
          $result = mysqli_query($koneksi, $query);
          while($row = mysqli_fetch_array($result)){
            list($nid, $nmdosen, $idmk, $namaMK)=$row;
        ?>
          <option value="<?php echo "$idmk" ?>"><?php echo "$namaMK" ?></option>
        <?php 
          }
        ?>
         </select> 
        Nama :
        <select name="nama" onChange="showDosen(this.value)">
          <option></option>
        <?php 
          $query="select * from mhs";
          $result = mysqli_query($koneksi, $query);
          while($result_data = mysqli_fetch_array($result)){
            list($value, $nama)=$result_data;
          
         ?>
          <option value="<?php echo "$value" ?>"><?php echo "$nama" ?></option>
        <?php 
          }
         ?>
         </select> 

        <select name="status">
          <option>Hadir</option>
          <option>Sakit</option>
          <option>Izin</option>
        </select>
        <button type="submit" class="btn btn-info" name="kirim">Submit</button>

        <?php 
          if (isset($_POST['kirim'])) {
            $matkul = $_POST['matkul'];
            $nama = $_POST['nama']; //ini nampung nim dari nama
            $status = $_POST['status'];

            $sql = "INSERT INTO presensi (nim,idmk,tgl,status) VALUES($nama,$matkul,'$tgl','$status')";
            if (mysqli_query($koneksi, $sql)) {
                echo "New Record has Created successfully";
                
              }else{
                echo "Error : ".$sqlinsert."<br>".mysqli_error($koneksi);
              }
              mysqli_close($koneksi);
            
          }
         ?>
  
    </form>

    <?php }else{ ?>

        <br>
        <form method="post">
        <script src="selectdosen.js"></script>
        
        Matakuliah :
        <select name="matkul" onChange="showDosen(this.value)">
          <option></option>
        <?php 
          $query="select * from matkul";
          $result = mysqli_query($koneksi, $query);
          while($result_data = mysqli_fetch_array($result)){
            list($value, $nama)=$result_data;
          
         ?>
          <option value="<?php echo "$value" ?>"><?php echo "$nama" ?></option>
        <?php 
          }
         ?>
         </select> 

        
        <script src="selectdosen.js"></script>
        
        Nama :
        <select name="nama" onChange="showDosen(this.value)">
          <option></option>
        <?php 
          $query="select * from mhs";
          $result = mysqli_query($koneksi, $query);
          while($result_data = mysqli_fetch_array($result)){
            list($value, $nama)=$result_data;
          
         ?>
          <option value="<?php echo "$value" ?>"><?php echo "$nama" ?></option>
        <?php 
          }
         ?>
         </select> 

        <select name="status">
          <option>Hadir</option>
          <option>Sakit</option>
          <option>Izin</option>
        </select>
        <button type="submit" class="btn btn-info" name="kirim">Submit</button>

        <?php 
          if (isset($_POST['kirim'])) {
            $matkul = $_POST['matkul'];
            $nama = $_POST['nama']; //ini nampung nim dari nama
            $status = $_POST['status'];

            $sql = "INSERT INTO presensi (nim,idmk,tgl,status) VALUES($nama,$matkul,'$tgl','$status')";
            if (mysqli_query($koneksi, $sql)) {
                echo "New Record has Created successfully";
                
              }else{
                echo "Error : ".$sqlinsert."<br>".mysqli_error($koneksi);
              }
              mysqli_close($koneksi);
            
          }
         ?>
      <?php } ?>   
  
    </form>

      </div>
      <footer>
        <p>Abduh12.esy.es &copy; 2015</p>
      </footer>
  <div>

</body>
</html>