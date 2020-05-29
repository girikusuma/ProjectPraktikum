<?php 
	session_start();

	if(isset($_GET["id"])){
		include '../koneksi.php';
		$id=$_GET["id"];
		$connection->query("DELETE FROM tb_users WHERE id_user =".$id);
	}
	header("location:view_admin.php");
	exit();
?>