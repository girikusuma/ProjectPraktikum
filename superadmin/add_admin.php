<?php 
	if(isset($_POST['tambah'])){

		include ('../koneksi.php');

		$nama=$_POST['nama'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$rule="2";
		$status="1";

		$connection->query("INSERT INTO tb_users (id_rule, name, username, password, status) VALUES('".$rule."','".$nama."','".$username."','".$password."','".$status."')");
	}
	header("location:index.php");
	exit();
 ?>
