<?php 
	session_start();

	if (!isset($_SESSION['username'])) {
		header("Location: index.php");
	}
	$ab = $_SESSION['username'];
 ?>
 <html>
	<head>
		<title>Beranda</title>
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
	        <h1>Halo, <?php echo $_SESSION['username']; ?></h1>
<p>informasi anda :</p>

			<table class="table" align="center" style="width:65%">
              

        <?php 
          include("koneksi2.php");
          
          $sql = "SELECT * FROM login where username='$ab'";
          $result = mysqli_query($koneksi,$sql);
          
          while ($row= mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          ?>
              <tr>
                <td>
                  Username 
                </td>
                <td>
                  <?php echo $row['username']; ?>
                </td>
              </tr>
              <tr>
              	<td>level akses</td>
              	<td><?php if ($row['kategori']=="1") {
              		$level="Admin (kelas 1)";
              		echo $level;
              	}else if ($row['kategori']=="2") {
              		$level="Dosen (kelas 2)";
              		echo $level;
              	}else{
              		$level="Mahasiswa (kelas 3)";
              		echo $level;
              	}
              	 ?></td>
              </tr>
              <tr>
              	<td>Nama</td>
              	<td><?php echo $row['nama'] ?></td>
              </tr>
              <tr>
              	<td>Alamat</td>
              	<td><?php echo $row['alamat'] ?></td>
              </tr>
              <tr>
              	<td>Hp</td>
              	<td><?php echo $row['hp'] ?></td>
              </tr>
              <tr>
              	<td>tgl lahir</td>
              	<td><?php echo $row['tgl'] ?></td>
              </tr>
              <tr>
              	<td>Jenis Kelamin</td>
              	<td><?php echo $row['kelamin'] ?></td>
              </tr>
              
          
         <?php } ?> 
        </table>
	        
	      </div>

	      

      <footer>
        <p>Abduh12.esy.es &copy; 2015</p>
      </footer>

</div> 
	</body>
</html>