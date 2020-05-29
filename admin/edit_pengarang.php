<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

		$id=$_POST['id'];
		$nama=$_POST['nama'];

		$connection->query("UPDATE tb_pengarang SET nama_pengarang='".$nama."' WHERE id_pengarang='".$id."'");
	}
	header("location:view_pengarang.php");
	exit();
 ?>