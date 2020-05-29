<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

		$id=$_POST['id'];
		$kategori=$_POST['kategori'];
		$pengarang=$_POST['pengarang'];
		$penerbit=$_POST['penerbit'];
		$rak=$_POST['rak'];
		$judul=$_POST['judul'];
		$tahun=$_POST['tahun'];
		$stok=$_POST['stok'];

		$sqlk="SELECT * FROM tb_kategori WHERE nama_kategori='$kategori'";
		$resultk=mysqli_query($connection, $sqlk);
		while($row=mysqli_fetch_assoc($resultk)){
			$idk=$row['id_kategori'];
		}
		$sqlp="SELECT * FROM tb_pengarang WHERE nama_pengarang='$pengarang'";
		$resultp=mysqli_query($connection, $sqlp);
		while($row=mysqli_fetch_assoc($resultp)){
			$idp=$row['id_pengarang'];
		}
		$sqlpe="SELECT * FROM tb_penerbit WHERE nama_penerbit='$penerbit'";
		$resultpe=mysqli_query($connection, $sqlpe);
		while($row=mysqli_fetch_assoc($resultpe)){
			$idpe=$row['id_penerbit'];
		}
		$sqlr="SELECT * FROM tb_rak WHERE nama_rak='$rak'";
		$resultr=mysqli_query($connection, $sqlr);
		while($row=mysqli_fetch_assoc($resultr)){
			$idr=$row['id_rak'];
		}

		$connection->query("UPDATE tb_buku SET id_kategori='".$idk."', id_pengarang='".$idp."', id_penerbit='".$idpe."', id_rak='".$idr."', judul_buku='".$judul."', tahun='".$tahun."', stok='".$stok."' WHERE id_buku='".$id."'");
	}
	header("location:view_buku.php");
	exit();
 ?>