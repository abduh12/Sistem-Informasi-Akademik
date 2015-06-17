<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    if (isset($_SESSION['kategori'])) {
     if ($_SESSION['kategori']==2) {
      header("location:beranda.php");
    }else if ($_SESSION['kategori']==3) {
      header("location:beranda.php");
    }  
  }
 ?>
<html>
	<head>
		<title>Daftar Baru</title>
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
                                            <li><a href="#">Tambah Data SIA</a></li>
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
        
        <h2>Sign Up</h2>
        <p>Untuk menggunakan Sistem Informasi Akademik ini diwajibkan mempunyai akun terlebih dahulu</p>
        <p>Silahkan isikan data berikut ini :</p>
        	<form class="form-horizontal" method="post">
        		<div class="control-group">
        			<label class="control-label">Nama</label>
        			<div class="controls"><input type="text" name="nama" placeholder="Nama"></div>
        		</div>
                
                <div class="control-group">
                    <label class="control-label">Tgl Lahir</label>
                    <div class="controls"><input type="date" name="tgl" placeholder="Tgl Lahir"></div>
                </div>
        		<div class="control-group">
        			<label class="control-label">Alamat</label>
        			<div class="controls"><input type="text" name="alamat" placeholder="Alamat"></div>
        		</div>
        		<div class="control-group">
                    <label class="control-label">No. Hp</label>
                    <div class="controls"><input type="text" name="nohp" placeholder="No. Hp"></div>
                </div>
                <div class="control-group">
                    <label class="control-label">Username</label>
                    <div class="controls"><input type="text" name="username" placeholder="Username"></div>
                </div>
        		<div class="control-group">
        			<label class="control-label">Password</label>
        			<div class="controls"><input type="password" name="password" placeholder="Password"></div>
        		</div>
                <div class="control-group">
                    <label class="control-label">Jenis Kelamin</label>
                    <div class="controls">
                        <select name="kelamin">
                            <option></option>
                            <option values="Laki-laki">Laki-laki</option>
                            <option values="Perempuan">Perempuan</option>
                            <option values="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                
                <div class="control-group">
        			<label class="control-label">Level User</label>
        			<div class="controls">
        				<select name="level">
        					<option></option>
        					<option values="1">1</option>
        					<option values="2">2</option>
        					<option values="3">3</option>
                        </select>
                    </div>
        		</div>

                <div class="control-group">
        			<div class="controls">
        				<button type="submit" class="btn btn-info" name="submit">Submit</button>
        			</div>
        		</div>	
        	</form>
            <label class="control-label">* level 1 = admin, level 2 = dosen, level 3 = mahasiswa</label>

        	<?php 
        		include ("koneksi2.php");

        		if (isset($_POST['submit'])) {
        			$nama = $_POST['nama'];
                    $tgl = $_POST['tgl'];
        			$alamat = $_POST['alamat'];
                    $hp = $_POST['nohp'];
                    $kelamin = $_POST['kelamin'];
                    $username = $_POST['username'];
        			$password = md5($_POST['password']);
        			$level = $_POST['level'];

        			$sqlinsert = "INSERT INTO login (username,password,kategori,nama,alamat, hp, tgl, kelamin) VALUES ('$username', '$password', '$level', '$nama', '$alamat', '$hp', '$tgl','$kelamin')";
        			if (mysqli_query($koneksi, $sqlinsert)) {
        				echo "New Record has Created successfully";
        				echo '<META http-equiv="refresh" content="1;URL=registrasi.php">';
        			}else{
        				echo "Error : ".$sqlinsert."<br>".mysqli_error($koneksi);
        			}
        			mysqli_close($koneksi);
        		}
        	 ?>

      	</div>

      <hr>
      <footer>
        <p>Abduh12.esy.es &copy; 2015</p>
      </footer>
    </div> 
	</body>
</html>
