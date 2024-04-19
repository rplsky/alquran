<?php
// Koneksi ke database db_alquran dan db_alquran3
$dsn = "mysql:host=localhost;dbname=db_alquran";
$username = "root";
$password = "";

try {
    $db_alquran = new PDO($dsn, $username, $password);
    $db_alquran->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db_alquran3 = new PDO("mysql:host=localhost;dbname=db_alquran3", $username, $password);
    $db_alquran3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk mengambil data dari db_alquran3
    $stmt = $db_alquran3->query("SELECT * FROM quran_id");
    
    // Looping untuk mengambil data dan melakukan update ke db_alquran
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['ids'];
        $readText = $row['readText'];

        // Update data di db_alquran
        $update_stmt = $db_alquran->prepare("UPDATE quran_translation SET latin = :latin WHERE translation_id  = :id");
        $update_stmt->bindParam(':latin', $readText);
        $update_stmt->bindParam(':id', $id);
        $update_stmt->execute();
    }

    echo "Update berhasil.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>