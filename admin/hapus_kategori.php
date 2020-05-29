<?php 
	session_start();

	if(isset($_GET["id"])){
		include '../koneksi.php';	
		$connection->query("DELETE FROM tb_kategori WHERE id_kategori =".$_GET["id"]);
	}
	header("location:view_kategori.php");
	exit();
?>