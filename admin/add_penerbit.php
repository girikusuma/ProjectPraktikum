<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

		$nama=$_POST['nama'];

		$connection->query("INSERT INTO tb_penerbit (nama_penerbit) VALUES('".$nama."')");
	}
	header("location:view_penerbit.php");
	exit();
 ?>