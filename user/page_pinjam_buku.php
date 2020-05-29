<?php
    session_start();
    if(isset($_SESSION['level'])){
      if($_SESSION['level'] != 'user'){
        header('Location: ../admin/index.php');
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
    <title>Galeri</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <li><a href="index.php">HOME : <?php echo $_SESSION['User']?></a></li>
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
                ?>
        <div id="isi">
            <h1>Pinjam Buku</h1>
            <div class="row" style="margin-left: 5%; margin-top: 5%;">
                <div class="col">
                      <table>
                            <tr>
                              <td>User</td>
                              <td>:</td>
                              <td><?= $_SESSION['User']?></td>
                            </tr>
                          <tr>
                              <td>Judul</td>
                              <td>:</td>
                              <td><?= $getDataa['judul_buku']?></td>
                          </tr>
                          <tr>
                              <td>Kategori</td>
                              <td>:</td>
                              <td><?= $getDataa['nama_kategori']?></td>
                          </tr>
                          <tr>
                              <td>Pengarang</td>
                              <td>:</td>
                              <td><?= $getDataa['nama_pengarang']?></td>
                          </tr>
                          <tr>
                              <td>Penerbit</td>
                              <td>:</td>
                              <td><?= $getDataa['nama_penerbit']?></td>
                          </tr>
                          <tr>
                              <td>Rak</td>
                              <td>:</td>
                              <td><?= $getDataa['nama_rak']?></td>
                          </tr>
                          <tr>
                              <td>Tahun</td>
                              <td>:</td>
                              <td><?= $getDataa['tahun']?></td>
                          </tr>
                          <tr>
                              <td>Stok</td>
                              <td>:</td>
                              <td><?= $getDataa['stok']?></td>
                          </tr>
                      </table>
                </div>
                <div class="col">
                <form method="POST" action="pinjam_buku.php">
                <input type="hidden" name="user" value="<?=$_SESSION["ID"]?>">
                <input type="hidden" name="buku" value="<?=$getDataa["id_buku"]?>">
                  <table>
                      <tr>
                          <td>Tanggal pinjam</td>
                          <td>:</td>
                          <td><input type="date" name="tp"></input></td>
                      </tr>
                      <tr>
                          <td>Tanggal kembali</td>
                          <td>:</td>
                          <td><input type="date" name="tk"></input></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td></td>
                          <td><button class="btn btn-success" name="save">Pinjam</button></td>
                      </tr>
                  </table>
                </form>
                </div>
              </div>
            <div style="width: 50%; margin-left: 5%;" >
              <tbody>
                
              </tbody>
            </table>
            </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

        </div>
        <div id="clear"></div>
        <div id="footer">
            <p>©2020 Giri Kusuma</p>
        </div>
        
    </div>
</body>
</html>