<?php
	//include koneksi
	include "koneksi.php";

	$suhu=$_GET['suhu'];
	$log=$_GET['log'];
	$lat=$_GET['lat'];
	

	mysqli_query($connect, "ALTER TABLE tb_sensor AUTO_INCREMENT=1");

	$simpan = mysqli_query($connect, "insert into tb_sensor(suhu, log, lat)values('$suhu','$log','$lat')");

	//pengujian
	if($simpan)
		echo "Berhasil";
	else
		echo "Gagal" .mysql_error($connect);


?>