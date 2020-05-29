<?php
    session_start();
    if(isset($_SESSION['level'])){
      if($_SESSION['level'] != 'admin'){
        header('Location: ../user/index.php');
      }
    }
    else{
      header('Location: ../index.php');
    }

    include('header.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Buku</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Buku</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <section class="connectedSortable">
          <form method="POST" action="add_buku.php">
            <table>
              <tr>
                <td>Judul Buku</td>
                <td>:</td>
                <td><input type="text" class="form-control" placeholder="Judul Buku" name="judul" style="width: 400%;"></input></td>
              </tr>
              <tr>
                <td>Kategori Buku</td>
                <td>:</td>
                <td><select class="custom-select" style="width: 400%;"  name="kategori">
                  <?php
                    include "../koneksi.php";
                    $kategori=$connection->query("SELECT * FROM tb_kategori");
                    while($row=mysqli_fetch_assoc($kategori)) :
                  ?>
                  <option value="<?= $row['nama_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                  <?php endwhile; ?> 
                </select>
                </td>
              </tr>
              <tr>
                <td>Pengarang Buku</td>
                <td>:</td>
                <td><select class="custom-select" style="width: 400%;" name="pengarang">
                  <?php
                    include "../koneksi.php";
                    $pengarang=$connection->query("SELECT * FROM tb_pengarang");
                    while($row=mysqli_fetch_assoc($pengarang)) :
                  ?>
                  <option value="<?= $row['nama_pengarang']; ?>"><?= $row['nama_pengarang']; ?></option>
                  <?php endwhile; ?> 
                </select>
                </td>
              </tr>
              <tr>
                <td>Penerbit Buku</td>
                <td>:</td>
                <td><select class="custom-select" style="width: 400%;" name="penerbit">
                  <?php
                    include "../koneksi.php";
                    $penerbit=$connection->query("SELECT * FROM tb_penerbit");
                    while($row=mysqli_fetch_assoc($penerbit)) :
                  ?>
                  <option value="<?= $row['nama_penerbit']; ?>"><?= $row['nama_penerbit']; ?></option>
                  <?php endwhile; ?> 
                </select>
                </td>
              </tr>
              <tr>
                <td>Rak Buku</td>
                <td>:</td>
                <td><select class="custom-select" style="width: 400%;" name="rak">
                  <?php
                    include "../koneksi.php";
                    $rak=$connection->query("SELECT * FROM tb_rak");
                    while($row=mysqli_fetch_assoc($rak)) :
                  ?>
                  <option value="<?= $row['nama_rak']; ?>"><?= $row['nama_rak']; ?></option>
                  <?php endwhile; ?> 
                </select>
                </td>
              </tr>
              <tr>
                <td>Tahun Buku</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="tahun" placeholder="Tahun Buku"></input></td>
              </tr>
              <tr>
                <td>Stok Buku</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="stok" placeholder="Stok Buku"></input></td>
              </tr>
              <!-- <tr>
                <td>Gambar Buku</td>
                <td>:</td>
                <td><input type="file" ></input></td>
              </tr> -->
              <tr>
                <td></td>
                <td></td>
                <td>
                <a href="view_buku.php"><button class="btn btn-danger" name="save">Cancel</button></a>
                <button class="btn btn-success" name="save">Save</button></td>
              </tr>
            </table>
            </form>
          </section>
          <!-- /.Left col -->
        </div>
        <div class="row">
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
