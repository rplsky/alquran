<?php
  require_once("Config/koneksi.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Qur'an Learning</title>
    <link rel="icon" type="image/png" href="Assets/img/Quran.png"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="Assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="Assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
       
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
               <!-- Logo -->
          <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src="Assets/img/Quran.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="40px" width="40px" style="opacity: .8; background-color:white;"></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="Assets/img/Quran.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="40px" width="40px" style="opacity: .8; background-color:white;"><b> Qur'an Learning</b></span>
          </a>
            </div>
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <li><a href="login.php">Login</a></li>
                  <li><a href="?page=register&aksi=form_register">Registrasi</a></li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <?php
            if (empty($_GET['page']) && empty($_GET['aksi'])) {
              include "User/Register/layout.php";
            } else {
              $page = $_GET['page'];
              $aksi = $_GET['aksi'];

              switch ($page) {
                case 'register':
                                switch ($aksi) {
                                  case 'form_register':
                                                        include "User/Register/register.php";
                                                        break;
                                  case 'simpan_register':
                                                        include "User/Register/simpan_register.php";
                                                        break;

                                  default:
                                          echo "<H1>Aksi yang dimaksud tidak ditemukan</H1>";
                                          break;
                                }
                                break;
                
                default:
                          echo "<H1>Page yang dimaksud tidak ditemukan</H1>";
                          break;
              }
            }
            
          ?>
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.1.1.1
          </div>
          <strong>Copyright &copy; <?php echo date('Y');?> <a href="index.php">Qur'an Learning</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="Assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="Assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="Assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="Assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="Assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="Assets/dist/js/demo.js"></script>
  </body>
</html>
