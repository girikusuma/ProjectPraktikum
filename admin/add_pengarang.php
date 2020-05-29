<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

		$nama=$_POST['nama'];

		$connection->query("INSERT INTO tb_pengarang (nama_pengarang) VALUES('".$nama."')");
	}
	header("location:view_pengarang.php");
	exit();
 ?>