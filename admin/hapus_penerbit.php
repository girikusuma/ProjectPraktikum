<?php 
	session_start();

	if(isset($_GET["id"])){
		include '../koneksi.php';	
		$connection->query("DELETE FROM tb_penerbit WHERE id_penerbit =".$_GET["id"]);
	}
	header("location:view_penerbit.php");
	exit();
?>