<?php 
	session_start();
	if(isset($_GET['id'])){

		include ('../koneksi.php');

		$id=$_GET['id'];

		$getDataa = $connection->query("SELECT * FROM tb_pinjam WHERE id_pinjam = ".$id);
		if($getDataa->num_rows==0){
            header("location:pengembalian_buku.php");
            exit();
        }
        $getDataa = $getDataa->fetch_assoc();
        $id_buku=$getDataa['id_buku'];
        $id_user=$getDataa['id_user'];

        $connection->query("INSERT INTO tb_kembali (id_user, id_buku) VALUES ('".$id_user."', '".$id_buku."')");

		$connection->query("DELETE FROM tb_pinjam WHERE id_pinjam='".$id."'");

		$connection->query("UPDATE tb_buku SET stok=stok+1 WHERE id_buku='".$id_buku."'");
	}
	header("location:pengembalian_buku.php");
	exit();
 ?>