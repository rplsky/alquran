<?php
    // deklarasi parameter koneksi database
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_hadits";

    try {
        // buat koneksi database
        $pdoh = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
        // set error mode
        $pdoh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // tampilkan kesalahan jika koneksi gagal
        echo "Koneksi Database Gagal! : ".$e->getMessage();
    }
?>