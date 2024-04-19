<?php
	//require_once("../../../config/koneksi.php");

	$username = $_POST['username'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
    $password = sha1($_POST['password']);
    $k_password = sha1($_POST['k_password']);
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $userid = rand(1000, 9999);

	// mengambil data barang dengan kode paling besar
	$query_id = "SELECT * FROM tbl_user WHERE userid = '$userid' AND (username = '$username' OR email = '$email')";
	$sql_id = $pdo->prepare($query_id);
	$sql_id->execute();
	$data = $sql_id->fetch();
	$jmldata = $sql_id->rowCount();

    if ($jmldata==0) {
        if ($password==$k_password) {
            $query = "INSERT INTO tbl_user (userid, username, password, email, namalengkap, jeniskelamin, alamat) VALUES ('$userid', '$username', '$password', '$email', '$nama_lengkap', '$jk', '$alamat')";
            $sql = $pdo->prepare($query);
            $sql->execute();
                            
            if($sql){
                ?>
                <script type="text/javascript">
                    alert('Data telah tersimpan');
                    setTimeout("location.href='login.php'", 1000);
                </script>
                <?php
            }else{
                echo $query;
                ?>
                <script type="text/javascript">
                    alert('Data gagal tersimpan');
                    setTimeout("location.href='?page=register&aksi=form_register'", 1000);
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert('Password dan Konfirmasi Password Invalid');
                setTimeout("location.href='?page=register&aksi=form_register'", 1000);
            </script>
            <?php
        }	
    } else {
        ?>
        <script type="text/javascript">
            alert('Username dan Email sudah digunakan oleh akun lain');
            setTimeout("location.href='?page=register&aksi=form_register'", 1000);
        </script>
        <?php
    }
    
?>