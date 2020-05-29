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
            <center><table style="margin-left: 5%;">
                <?php
                    if(!isset($_GET['id'])){
                        header("location: profile.php");
                        exit();
                    }
                    include ('../koneksi.php');

                    $key=$_GET['id'];
                    $getDataa = $connection->query("SELECT * FROM tb_users WHERE id_user = ".$key); 

                    if($getDataa->num_rows==0){
                      header("location: profile.php");
                      exit();
                    }
                    $getDataa = $getDataa->fetch_assoc();
                ?>
                <form method="POST" action="edit_profile.php">
                    <input type="hidden" name="id" value="<?=$getDataa["id_user"]?>">
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="nama" value="<?=$getDataa["name"]?>"></input></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="username" value="<?=$getDataa["username"]?>"></input></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" class="form-control" name="password" value="<?=$getDataa["pasword"]?>"></input></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="btn btn-primary" name="edit">Edit</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </table>
            </center>
        </center>
        </div>
        <div id="clear"></div>
        <div id="footer">
            <p>©2020 Giri Kusuma</p>
        </div>
        
    </div>
</body>
</html>