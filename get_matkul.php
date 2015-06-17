<?php 
	$q = $_GET["q"];
	include("koneksi2.php");

	//$sql = "SELECT dosen.npk, dosen.nama, prodi.kodeprodi, prodi.namaprodi FROM(dosenprodi LEFT JOIN dosen ON dosen.npk = dosenprodi.npk) LEFT JOIN prodi ON prodi.kodeprodi = dosenprodi.kodeprodi WHERE prodi.kodeprodi = '".$q."'";
		//$sql = "SELECT dosen.nid, dosen.nama, matkul.idmk, matkul.namamk, FROM(dosenmk LEFT JOIN dosen on dosen.nid = dosenmk.nid) LEFT JOIN matkul on matkul.idmk = dosenmk.idmk where matkul.namamk = '".$q."'";
	$sql = "SELECT mhs.nim, mhs.nama, matkul.idmk, matkul.namamk, presensi.tgl, presensi.status FROM(presensi LEFT JOIN mhs on mhs.nim = presensi.nim) LEFT JOIN matkul on matkul.idmk = presensi.idmk WHERE matkul.idmk = '".$q."'";
	//$sql = "SELECT mhs.nim, mhs.nama, mhs.kelas, matkul.idmk, matkul.namamk FROM(kelas LEFT JOIN mhs on mhs.nim = kelas.nim) LEFT JOIN matkul on matkul.idmk = kelas.idmk where mhs.nim = '".$q."'";
	//$sql = "SELECT nim,nama,kelas FROM mhs WHERE kelas='".$q."';";
	$result = mysqli_query($koneksi, $sql);

	echo "<table class='table' align='center' style='width:100%''>
              <tr>
                <th>Nim</th>
                <th>Nama</th>
                <th>Tgl</th>
                <th>Matkul</th>
                <th>Status</th>
              </tr>
			</thread>";
	while($row = mysqli_fetch_array($result)){
		echo "<tbody><tr>";
			echo "<td>".$row['nim']."</td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['tgl']."</td>";
			echo "<td>".$row['namamk']."</td>";
			echo "<td>".$row['status']."</td>";
		echo "</tr></tbody>";
	}
	echo "</table>";
 ?> 