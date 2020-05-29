<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

		$id=$_POST['id'];
		$nama=$_POST['nama'];

		$connection->query("UPDATE tb_penerbit SET nama_penerbit='".$nama."' WHERE id_penerbit='".$id."'");
	}
	header("location:view_penerbit.php");
	exit();
 ?>