<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

		$user=$_POST['user'];
		$buku=$_POST['buku'];
		$pinjam=htmlentities($_POST['tp']);
		$kembali=htmlentities($_POST['tk']);

		$connection->query("INSERT INTO tb_pinjam (id_user, id_buku, tanggal_pinjam, tanggal_kembali) VALUES('".$user."', '".$buku."', '".$pinjam."', '".$kembali."')");

		$connection->query("UPDATE tb_buku SET stok=stok-1");

	}
	header("location:galeri.php");
	exit();
 ?>