<?php
    session_start();
    if(isset($_SESSION['level'])){
      if($_SESSION['level'] != 'user'){
        header('Location: ../admin/kontak.php');
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
    <link rel="stylesheet" href="../style.css">
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
        <div id="isi" style="height : 400px;">
            <h1>Kontak Kami</h1>
            <nav>
                <ul>
                    <li>Nama</li>
                    <li>Nim</li>
                    <li>No. Hp</li>
                </ul>
                <ul>
                    <li>I Made Cantiawan Giri Kusuma</li>
                    <li>1708561005</li>
                    <li>081338119635</li>
                </ul>
            </nav>
            <br><br>
            <div class="kontak">
                <form action="#">
                <table>
                    <tr>
                        <td>
                            <label for="fname">Nama Depan</label>
                        </td>
                        <td>
                            <input type="text" id="fname" name="firstname" placeholder="Nama Depan">
                        </td>
                        <td>
                            <label for="lname">Nama Belakang</label>
                        </td>
                        <td>
                            <input type="text" id="lname" name="lastname" placeholder="Nama Belakang">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="country">Country</label>
                        </td>
                        <td>
                            <select id="country" name="country">
                                <option value="Indonesia">Indonesia</option>
                                <option value="Inggris">Inggris</option>
                                <option value="Amerika">Amerika</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="subject">Komentar</label>
                        </td>
                        <td colspan="3">
                            <textarea id="subject" name="subject" placeholder="Masukan kalimat.." style="height:100px; width: 440px;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Submit"></td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
        <div id="clear"></div>
        <div id="footer">
            <p>©2020 Giri Kusuma</p>
        </div>
        
    </div>
</body>
</html>