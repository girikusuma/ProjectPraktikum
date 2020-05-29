<?php 
	session_start();

	if(isset($_GET["id"])){
		include '../koneksi.php';	
		$connection->query("DELETE FROM tb_buku WHERE id_buku =".$_GET["id"]);
	}
	header("location:view_buku.php");
	exit();
?>