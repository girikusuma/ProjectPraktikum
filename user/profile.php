<?php
    session_start();
    if(isset($_SESSION['level'])){
      if($_SESSION['level'] != 'user'){
        header('Location: ../admin/tentang.php');
      }
    }
    else{
      header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div id="main-content">
        <div id="atas">
            <img src="../gambar/perpustakaan.jpg" alt="" style="height: 250px; width: 700px;">
            <p>Perpustakaan Ilmu Komputer</p>
        </div>
        <div id="sidebar">
            <img src="../gambar/himakom.png" alt="">
            <div class="populer">
                <p>Artikel Populer</p>
            </div>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="galeri.php">GALERI</a></li>
                    <li><a href="tentang.php">TENTANG</a></li>
                    <li><a href="kontak.php">KONTAK</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            
        </div>
        <div id="menu">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="galeri.php">GALERI</a></li>
                <li><a href="tentang.php">TENTANG</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
            </ul>
        </div>
        <div id="isi">
        <center>
            <h1 style="margin-left: 5%;">Profile</h1>
            <table style="margin-left: 5%;">
            <?php 
                include'../koneksi.php';
                $id = $_SESSION['ID'];
                $sql = ("SELECT * FROM tb_users WHERE id_user='$id'");
                $result = $connection->query($sql);
                while($row = mysqli_fetch_assoc($result)) {
            ?>  
                <tr>
                    <td>ID</td>
                    <td>:</td>
                    <td><?= $row['id_user'] ?></td>
                </tr>  
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $row['name'] ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><?= $row['username'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="page_edit_data.php?id=<?=$row['id_user']?>"><button type="button" class="btn btn-warning">Edit</button></a>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </center>
        </div>
        <div id="clear"></div>
        <div id="footer">
            <p>©2020 Giri Kusuma</p>
        </div>
        
    </div>
</body>
</html>