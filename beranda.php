<?php 
	session_start();

	if (!isset($_SESSION['username'])) {
		header("Location: index.php");
	}
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
		<style type="text/css">
    body  {
      background-image: url("331326-book-hd-wallpaper.jpg");
      background-attachment: fixed;
    }
    </style>
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
	<br>
	<br>
	<br>
	<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Info</li>
              <li>
              	<div style="margin: 15px 0px 0px; display: inline-block; text-align: center; width: 200px;"><div style="display: inline-block; padding: 2px 4px; margin: 0px 0px 5px; border: 1px solid rgb(204, 204, 204); text-align: center; background-color: rgb(255, 255, 255);"><a href="" style="text-decoration: none; font-size: 13px; color: rgb(0, 0, 0);"> </a></div><script type="text/javascript" src="http://localtimes.info/clock.php?&cp1_Hex=000000&cp2_Hex=FFFFFF&cp3_Hex=000000&fwdt=200&ham=0&hbg=0&hfg=0&sid=0&mon=0&wek=0&wkf=0&sep=0&widget_number=1000"></script></div>
              </li>
              <li></li>
              <li><script type="text/javascript" src="http://100widgets.com/js_data.php?id=125"></script></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            
	        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
			<p>Semua informasi kemahasiswaan tentang absensi ada disini, kami juga menyediakan berita seputar kampus yang up to date</p>
          </div>
          <div class="row-fluid">
            <div class="span4">
            	<img class="img-circle" src="http://kabarkampus.com/wp-content/uploads/2015/06/phd-termuda-indonesia.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Mahasiswa PhD Asal Indonesia Terbaik di QUT</h2>
              <p>Seorang lagi mahasiswa asal Indonesia menunjukkan prestasi di Australia setelah Tri Mulyani Sunarharum terpilih sebagai Mahasiswa Terbaik Tahun 2015 di Queensland University of Technology.</p>
              <p><a class="btn" href="http://kabarkampus.com/2015/06/mahasiswa-phd-asal-indonesia-terbaik-di-qut/">Baca.. &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
            	<img class="img-circle" src="http://kabarkampus.com/wp-content/uploads/2015/06/difabel-australia.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Pelajaran Matematika Bisa Bantu Penyandang Disabilitas Dapatkan Pekerjaan</h2>
              <p>Sebuah sekolah khusus di Queensland menggunakan pelajaran matematika untuk membalikkan rendahnya lapangan pekerjaan bagi para penyandang disabilitas.</p>
              <p><a class="btn" href="http://kabarkampus.com/2015/06/pelajaran-matematika-bisa-bantu-penyandang-disabilitas-dapatkan-pekerjaan/">Baca.. &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
            	<img class="img-circle" src="http://kabarkampus.com/wp-content/uploads/2015/06/08-06-2015-Sabun-Lumpur-01-e1433752702408.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Mahasiswa UGM Buat Sabun Geothermal</h2>
              <p>Mahasiswa Universitas Gadjah Mada (UGM) memanfaatkan limbah lumpur geothermal untuk dijadikan sabun. Sabun hasil karya mahasiswa Teknik Kimia UGM ini tidak hanya bisa membuat kulit lembut, namun juga mengandung anti bakterbakterial dan anti jamur.</p>
              <p><a class="btn" href="http://kabarkampus.com/2015/06/mahasiswa-ugm-buat-sabun-geothermal/">Baca.. &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
          <div class="row-fluid">
            <div class="span4">
            	<img class="img-circle" src="http://kabarkampus.com/wp-content/uploads/2015/05/festival-gunungan.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Mahasiswi Asal Belanda yang Mencintai Tari Tradisional Indonesia</h2>
              <p>Nama Anouk Wilke, bukanlah nama yang asing dalam pentas tari di Indonesia. Mahasiswi asal Belanda yang mengenyam pendidikan ISI Yogyakarta ini beberapa waktu lalu memukau publik Bandung dalam acara Gunungan International Mask & Puppets Festival 2015 di Bale Pare, Kota Baru Parahyangan, Kabupaten Bandung Barat, Minggu (24/05/2015).</p>
              <p><a class="btn" href="http://kabarkampus.com/2015/05/mahasiswi-asal-belanda-yang-mencintai-tari-tradisional-indonesia/">Baca.. &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
            	<img class="img-circle" src="http://4.bp.blogspot.com/-_3aqPeWbpJc/U3F8g47tvfI/AAAAAAAAAWI/n6Z--qpf57I/s1600/ngupil.png" alt="Generic placeholder image" width="140" height="140">
              <h2>Kebiasaan Buruk Masyarakat Indonesia</h2>
              <p>Saat kita pergi berbelanja entah di pasar maupun supermarket kita tentu saja tidak asing dengan Tas plastik atau biasa disebut dengan kresek. Meskipun kita hanya membeli satu barang saja tentunya si penjual akan memberikan kita sebuah tas plastik/kresek untuk membawa barang yang telah kita beli.</p>
              <p><a class="btn" href="http://kabarkampus.com/2014/05/kebiasaan-buruk-masyarakat-indonesia/">Baca.. &raquo;</a></p>
            </div><!--/span-->
            
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

   	<footer>
       	<p align="center">Abduh12.esy.es &copy; 2015</p>
  	</footer>
	</body>
</html>