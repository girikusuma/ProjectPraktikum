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
            <h1 class="m-0 text-dark">Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="container-fluid"> 
              <a href="page_tambah_kategori.php">
                <button type="button" class="btn btn-primary">
                    Tambah Kategori
                </button>
              </a>
          </div>
        </div>
        <br>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="connectedSortable">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  include "../koneksi.php";
                  if(isset($_GET['page']) && $_GET['page'] !="" ){
                      $page = $_GET['page'];
                  }else{
                      $page = 1;
                  }
                  $total_data_page = 5;
                  $offset = ($page - 1) * $total_data_page;
                  $next_page = $page + 1;
                  $prev_page = $page - 1;
                  $result = $connection->query("SELECT * FROM tb_kategori");
                  $total_records = mysqli_num_rows($result);
                  $total_no_page = ceil($total_records/$total_data_page);
                  $second_last = $total_no_page - 1;
                  $resultPerPage = $connection->query("SELECT * FROM tb_kategori
                      LIMIT $offset,$total_data_page");
              ?>
              <?php $no = $offset+1; ?>
              <?php  while($row = mysqli_fetch_assoc($resultPerPage)) : ?>
                  <tr>
                      <td><?= $no; ?></td> 
                      <td><?= $row['id_kategori']; ?></td>
                      <td><?= $row['nama_kategori']; ?></td>
                      <td>
                        <a href="page_edit_kategori.php?id=<?=$row['id_kategori']?>"><button type="button" class="btn btn-warning">Edit</button></a>
                        <a href="hapus_kategori.php?id=<?=$row['id_kategori']?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                      </td>
                  </tr>
                  <?php $no++; ?>
                  <?php endwhile; ?>
              </tbody>
            </table>
            <strong><p>Halaman <?php echo $page; ?> Sampai <?php echo $total_no_page; ?></p></strong>
            <!-- pagination -->
            <ul class="pagination">
                  <li <?php if($page <=1 ) {echo "class='disabled'";}  ?>>
                      <a <?php if ($page > 1 ) { echo "href='?page=$prev_page'"; } ?>>Prev</a>
                  </li>
                  <?php 
                      if ($total_no_page > 10){
                          if($page<=4){
                              for($i = 1 ; $i < 8 ; $i++){
                                  if($i == $page){
                                      echo "<li class='active'><a>$i</a></li>";
                                  }else{
                                      echo "<li><a href='?page=$i'>$i</a><li>";
                                  }
                              }
                              echo "<li><a>...</a></li>";
                              echo "<li><a href='?page=$total_no_page'>$total_no_page</a></li>";
                          }
                          else if ($page > 4 && $page < $total_no_page - 4 ){
                              echo "<li><a href='?page=1'>1</a></li>";
                              echo "<li><a>...</a></li>";
                              for ($i = $page - 3 ; $i<= $page + 3; $i++){
                                  if($i == $page){
                                      echo "<li class='active'><a>$i</a></li>";
                                  }else{
                                      echo "<li><a href='?page=$i'>$i</a><li>";
                                  }
                              }
                              echo "<li><a>...</a></li>";
                              echo "<li><a href='?page=$total_no_page'>$total_no_page</a></li>";
                          }
                          else{
                              echo "<li><a href='?page=1'>1</a></li>";
                              echo "<li><a>...</a></li>";
                              for($i = $total_no_page - 7; $i <= $total_no_page; $i++ ){
                                  if($i == $page){
                                      echo "<li class='active'><a>$i</a></li>";
                                  }else{
                                      echo "<li><a href='?page=$i'>$i</a><li>";
                                  }
                              }
                          }
                      }
                      else if ( $total_no_page <= 10 ){
                          for ($i = 1 ; $i <=$total_no_page;$i++){
                              if($i == $page){
                                  echo "<li class='active'><a>$i</a></li>";
                              }else{
                                  echo "<li><a href='?page=$i'>$i</a><li>";
                              }
                          }
                      }
             
                  ?>
                  <li <?php if($page >= $total_no_page) { echo "class='disabled'"; } ?>>
                      <a <?php if ($page < $total_no_page ) { echo "href='?page=$next_page'"; }?>>Next</a>
                  </li>
                  <?php if ($page < $total_no_page){
                     echo "<li><a href='?page=$total_no_page'>Last</a></li>";
                  }?>
            </ul>
          </section>
          <!-- /.Left col -->
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
