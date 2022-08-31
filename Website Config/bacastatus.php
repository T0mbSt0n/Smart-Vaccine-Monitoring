<?php
	//include koneksi
	include "koneksi.php";

	$sql = mysqli_query ($connect, "SELECT * FROM tb_sensor");
	$data = mysqli_fetch_array($sql);
	$suhu = $data['input_suhu'];
	//respon ke nodemcu
	echo $suhu; //0,1,2

?>