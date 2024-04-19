<!DOCTYPE html>
<html>
<head>
  <title>Qur'an Learning</title>
  <meta charset="UTF-8">
  <meta name="google-site-verification" content="4B_l4uEl3CngZUJ13-sFv96As565dr9PKop9lNtF-to" />
  <link rel="stylesheet" type="text/css" href="Assets/css/style_baru.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Poppins:wght@700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="Assets/img/Quran.png"/>
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  
    <div class="container">
        <div class="img">
          <img src="Assets/img/bg.jpg">
        </div>
        <div class="login-content">
            <form action="" method="POST">
                <br><br>
                <img class="avatar" src="Assets/img/Quran-lg.png"></img>
                <h4>PORTAL Al Qur'an</h4>
                <h6>SMK SANGKURIANG 1 CIMAHI</h6><br>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <h5>Username</h5>
                                <input type="text" class="input" name="username">
                            </div>
                        </div>
                        <div class="input-div pass">
                            <div class="i"> 
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Password</h5>
                                <input type="password" class="input" name="password">
                            </div>
                        </div>
                        <button class="btn" name="login">LOGIN</button>
                        <h6>Apabila Anda Tidak Memiliki Akun Klik</h6>
                        <a href="index.php?page=register&aksi=form_register" class="btn-hijau">Registrasi</a>
            </form>
        </div>
    </div>
    
    <script type="text/javascript" src="Assets/js/login_js.js"></script>
    
</body>
</html>

<?php
    include 'Config/koneksi.php';
    //include 'Config/mac.php';
    error_reporting(0);
    SESSION_START();
    
    if(isset($_POST['login'])) {
        $pass=sha1($_POST['password']);
        $password = $_POST['password'];
        $user=$_POST['username'];
        $query = "SELECT * FROM tbl_user WHERE username = '$user' AND password = '$pass'";
        $login = $pdo->prepare($query);
        $login->execute();
        $cocok = $login->rowCount();
        $r=$login->fetch();
            if ($cocok > 0){
                $_SESSION['username'] = $r['username'];
                $_SESSION['id_user'] =$r['userid'];
                $_SESSION['nama_user'] =$r['namalengkap'];
                $_SESSION['password'] =$pass;
                $_SESSION['timestamp']=time();

                echo "<script>window.alert('Anda masuk sebagai User');
			        window.location='User/index.php?page=beranda&aksi=aktif'</script>";
            } else {
                ?><script>window.alert('Username dan atau password salah');
                            window.location='login.php'</script>
                    <?php
            }
    }

?>