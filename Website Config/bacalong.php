<?php
	//panggil koneksi
	include "koneksi.php";

	//baca isi tabel sensor
	$sql = mysqli_query($connect, "select * from tb_sensor order by id desc ");
	$data = mysqli_fetch_array($sql);
	$log = $data["log"];

	echo $log;
?>