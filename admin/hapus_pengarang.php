<?php 
	session_start();

	if(isset($_GET["id"])){
		include '../koneksi.php';	
		$connection->query("DELETE FROM tb_pengarang WHERE id_pengarang =".$_GET["id"]);
	}
	header("location:view_pengarang.php");
	exit();
?>