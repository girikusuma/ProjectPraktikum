<?php 
	session_start();

	if(isset($_GET["id"])){
		include '../koneksi.php';	
		$connection->query("DELETE FROM tb_user WHERE id_user =".$_GET["id"]);
	}
	header("location:view_admin.php");
	exit();
?>