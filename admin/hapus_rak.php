<?php 
	session_start();

	if(isset($_GET["id"])){
		include '../koneksi.php';	
		$connection->query("DELETE FROM tb_rak WHERE id_rak =".$_GET["id"]);
	}
	header("location:view_rak.php");
	exit();
?>