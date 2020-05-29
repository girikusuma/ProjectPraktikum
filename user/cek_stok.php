<?php
    if(!isset($_GET["id"])){
      header("location:galeri.php");
      exit();
    }

    include '../koneksi.php';

    $key = $_GET["id"];

    $getDataa = $connection->query("SELECT * FROM tb_buku b JOIN tb_pengarang p ON b.id_pengarang=p.id_pengarang JOIN tb_penerbit pe ON b.id_penerbit=pe.id_penerbit JOIN tb_kategori k ON b.id_kategori=k.id_kategori JOIN tb_rak r ON b.id_rak=r.id_rak WHERE id_buku = ".$key); 

    if($getDataa->num_rows==0){
      header("location:galeri.php");
      exit();
    }
    $getDataa = $getDataa->fetch_assoc();
    // $jumlah = (int)$getDataa["stok"];
    if($getDataa['stok']!=0){
    	header("location:page_pinjam_buku.php");
    	exit();
    }
    else {
    	header("location:galeri.php");
    	exit();
    }
?>