<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

		$id=$_POST['id'];
		$nama=$_POST['nama'];

		$connection->query("UPDATE tb_rak SET nama_rak='".$nama."' WHERE id_rak='".$id."'");
	}
	header("location:view_rak.php");
	exit();
 ?>