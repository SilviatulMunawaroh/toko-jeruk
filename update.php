<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon']
    $pesan = $_POST['pesan']

    // Query untuk melakukan pembaruan data
    $updateQuery = "UPDATE tb_kedai SET nama = '$nama', email = '$email', telepon = '$telepon', pesan = '$pesan' WHERE db_jeruk = $db_jeruk";

    if ($koneksi->query($updateQuery) === TRUE) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . $updateQuery . "<br>" . $koneksi->error;
    }
} else {
    echo "Permintaan tidak valid.";
}
?>