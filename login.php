<?php
session_start();
include 'koneksi.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM tb_users u JOIN tb_rules r ON u.id_rule=r.id_rule WHERE u.username='$username' AND u.password='$password'";
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            if($row['status']=='1'){
                if($row['name_rule'] == "superadmin"){
                    $_SESSION['ID'] = $row['id_user'];
                    $_SESSION['User'] = $row['name'];
                    $_SESSION['level'] = $row['name_rule'];
                    header('Location: superadmin/index.php');
                }
                else if($row['name_rule'] == "admin"){
                    $_SESSION['ID'] = $row['id_user'];
                    $_SESSION['User'] = $row['name'];
                    $_SESSION['level'] = $row['name_rule'];
                    header('Location: admin/index.php');
                }
                else{
                    $_SESSION['ID'] = $row['id_user'];
                    $_SESSION['User'] = $row['name'];
                    $_SESSION['level'] = $row['name_rule'];
                    header('Location: user/index.php');
                }
            }
            else {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Maaf</strong> Akun anda belum terverifikasi.
                    <a href="index.php">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </a>
                </div>
            <?php
            }
        }
    }
    
}
else{
    echo"<script>alert('Belum isi form');document.location.href='index.php'</script>";
}
?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
</body>
</html>