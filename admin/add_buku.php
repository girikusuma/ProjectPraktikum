<?php 
	session_start();
	if(isset($_POST['save'])){

		include ('../koneksi.php');

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

		$connection->query("INSERT INTO tb_buku (id_kategori, id_pengarang, id_penerbit, id_rak, judul_buku, tahun, stok) VALUES('".$idk."','".$idp."','".$idpe."','".$idr."','".$judul."','".$tahun."','".$stok."')");
	}
	header("location:view_buku.php");
	exit();
 ?>