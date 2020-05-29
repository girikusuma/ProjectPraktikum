<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

		$nama=$_POST['nama'];

		$connection->query("INSERT INTO tb_rak (nama_rak) VALUES('".$nama."')");
	}
	header("location:view_rak.php");
	exit();
 ?>