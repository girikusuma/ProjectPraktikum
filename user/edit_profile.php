<?php 
	session_start();
	if(isset($_POST['edit'])){

		include ('../koneksi.php');

		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);

		$connection->query("UPDATE tb_users SET name='".$nama."', username='".$username."', password='".$password."' WHERE id_user='".$id."'");
	}
	header("location:profile.php");
	exit();
 ?>