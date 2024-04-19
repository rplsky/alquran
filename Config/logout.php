<?php
	$id = (empty($_GET['id'])) ? '' : $_GET['id'];

	if($id=="timeout" || $id=="akses"){
		session_start();
		session_destroy();
		echo "<script>window.location='../index.php'</script>";	
	} else{
		session_start();
		session_destroy();
		echo "<script>window.alert('Anda telah keluar dari aplikasi');
		            window.location='../index.php'</script>";
	}
?>