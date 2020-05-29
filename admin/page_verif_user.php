<?php 
	session_start();
	if(isset($_GET['id'])){

		include ('../koneksi.php');

		$id=$_GET['id'];
		$status='1';

		$connection->query("UPDATE tb_users SET status='".$status."' WHERE id_user='".$id."'");
	}
	header("location:view_user.php");
	exit();
 ?>