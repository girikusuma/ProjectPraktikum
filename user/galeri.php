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
    require_once('../koneksi.php');
    require_once('class_galeri.php');
    require_once('database.php');
    $conn = new Database();
    $perpus = new Perpustakaan($conn);
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
        <div id="isi">
            <h1>Galeri</h1>
            <div style="width: 50%; margin-left: 5%;" >
            <form method="POST" action="">
            <table>
            <tr>
            <td>
                <input type="text " name="cari" class="form-control pj-input" placeholder="Cari">
            </td>
            <td>
                <select name="jenis" class="custom-select pj-select">
                    <option value="">Select Filter</option>
                    <option value="judul_buku">Judul</option>
                    <option value="kategori">Kategori</option>
                    <option value="tahun_terbit">Tahun Terbit</option>
                </select>
            </td>
            <td>
                <input type="submit" name="submit" id="" class="btn btncari btn-success" value="cari">
            </td>
            </tr>
            </table>
            </div>
            <section class="connectedSortable" style="margin-top: 5%; margin-left: 5%;">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID</th>
                  <th>
                    <table>
                        <tr>
                            <td>
                                Judul
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example" style="float: right;">
                                    <input type="submit" class="btn btn-outline-secondary btn-sm" name="judul_buku" value="ASC"></input>
                                    <input type="submit" class="btn btn-outline-secondary bnt-sm" name="judul_buku" value="DESC"></input>
                                </div>
                            </td>
                        </tr>
                    </table>
                  </th>
                  <th>
                    <table>
                        <tr>
                            <td>
                                Kategori
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example" style="float: right;">
                                    <input type="submit" class="btn btn-outline-secondary btn-sm" name="nama_kategori" value="ASC"></input>
                                    <input type="submit" class="btn btn-outline-secondary bnt-sm" name="nama_kategori" value="DESC"></input>
                                </div>
                            </td>
                        </tr>
                    </table>
                  </th>
                  <th>
                    <table>
                        <tr>
                            <td>
                                Tahun
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example" style="float: right;">
                                    <input type="submit" class="btn btn-outline-secondary btn-sm" name="tahun" value="ASC"></input>
                                    <input type="submit" class="btn btn-outline-secondary bnt-sm" name="tahun" value="DESC"></input>
                                </div>
                            </td>
                        </tr>
                    </table>
                  </th>
                  <th>Aksi</th>
                </tr>
              </thead>
              </form>
              <tbody>
                     <?php
                        $no = 1;
                        $sort = "";
                        if(empty($sort)){
                             $tampil = $perpus->lihat();
                        }
                        if (isset($_POST["judul_buku"]) )
                        {
                            $sort =  $_POST["judul_buku"]; 
                            $tampil = $perpus->lihat_sorting($sort,"judul_buku");  
                        }
                        if (isset($_POST["nama_kategori"]) )
                        {
                            $sort =  $_POST["nama_kategori"]; 
                            $tampil = $perpus->lihat_sorting($sort,"nama_kategori"); 
                        }
                        if (isset($_POST["tahun"]) )
                        {
                            $sort =  $_POST["tahun"];
                            $tampil = $perpus->lihat_sorting($sort,"tahun");   
                        }
                        if(isset($_POST['submit'])){
                            $cari = $_POST['cari'];
                            $column =  $_POST['jenis'];
                            if($cari!="" AND $column!=""){
                                $tampil = $perpus->lihat_filter($cari,$column);
                            }
                            
                        }
                        while($data = $tampil->fetch_object()){
                    ?>
                      <tr>
                      <th><?= $no++ ?></th>
                      <td><?= $data->id_buku; ?></td>
                      <td><?= $data->judul_buku; ?></td>
                      <td><?= $data->nama_kategori; ?></td>
                      <td><?= $data->tahun; ?></td>
                      <td>
                      <a id="detail" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
                      data-judul="<?= $data->judul_buku; ?>"
                      data-kakegori="<?= $data->nama_kategori; ?>"
                      data-pengarang="<?= $data->nama_pengarang; ?>"
                      data-penerbit="<?= $data->nama_penerbit; ?>"
                      data-rak="<?= $data->nama_rak; ?>"
                      data-tahun="<?= $data->tahun; ?>"
                      data-stok="<?= $data->stok; ?>">Detail</a>
                      <a href="page_pinjam_buku.php?id=<?=$data->id_buku?>"><button type="button" class="btn btn-primary btn-sm">pinjam</button></a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table>
                                    <tr>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td><span id="judul"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>:</td>
                                        <td><span id="kategori"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Pengarang</td>
                                        <td>:</td>
                                        <td><span id="pengarang"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Penerbit</td>
                                        <td>:</td>
                                        <td><span id="penerbit"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Rak</td>
                                        <td>:</td>
                                        <td><span id="rak"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Tahun</td>
                                        <td>:</td>
                                        <td><span id="tahun"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span id="stok"></span></td>
                                    </tr>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $(document).on('click', '#detail', function() {
        var judul_buku = $(this).data('judul');
        var nama_kategori = $(this).data('kategori');
        var nama_pengarang = $(this).data('pengarang');
        var nama_penerbit = $(this).data('penerbit');
        var nama_rak = $(this).data('rak');
        var tahun = $(this).data('tahun');
        var stok = $(this).data('stok');
        $('#judul').text(judul_buku);
        $('#kategori').text(nama_kategori);
        $('#pengarang').text(nama_pengarang);
        $('#penerbit').text(nama_penerbit);
        $('#rak').text(nama_rak);
        $('#tahun').text(tahun);
        $('#stok').text(stok);
})
</script>
</body>
</html>