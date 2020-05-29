<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

		$nama=$_POST['nama'];

		$connection->query("INSERT INTO tb_kategori (nama_kategori) VALUES('".$nama."')");
	}
	header("location:view_kategori.php");
	exit();
 ?>