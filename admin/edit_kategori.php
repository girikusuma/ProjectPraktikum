<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

		$id=$_POST['id'];
		$nama=$_POST['nama'];

		$connection->query("UPDATE tb_kategori SET nama_kategori='".$nama."' WHERE id_kategori='".$id."'");
	}
	header("location:view_kategori.php");
	exit();
 ?>