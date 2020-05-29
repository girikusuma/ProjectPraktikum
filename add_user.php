<?php 
	if(isset($_POST['daftar'])){

		include ('koneksi.php');

		$nama=$_POST['nama'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$rule="3";
		$status="0";

		$connection->query("INSERT INTO tb_users (id_rule, name, username, password, status) VALUES('".$rule."','".$nama."','".$username."','".$password."','".$status."')");
	}
	header("location:index.php");
	exit();
 ?>
