<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon']; 
$pesan = $_POST['pesan'];

//Database koneksi
$conn = new mysqli('localhost', 'root', '', 'db_kedai');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    //Perbaikan pada query dan binding parameter
    $stmt = $conn->prepare("INSERT INTO tb_kedai (nama, email, telepon, pesan) VALUES (?, ?, ?, ?)");
    //Periksa apakah prepare berhasil
    if (!$stmt) {
        die('Query Error: ' . $conn->error);
    }
    $stmt->bind_param("ssss", $nama, $email, $telepon, $pesan);
    if ($stmt->execute()) {
        echo "Pesanan Sukses";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>