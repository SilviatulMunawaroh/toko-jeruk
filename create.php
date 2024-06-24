<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST['Nama']);
    $email = $conn->real_escape_string($_POST['Email']);
    $telpon = $conn->real_escape_string($_POST['Telpon']);
    $pesan = $conn->real_escape_string($_POST['Pesan']);

    $sql = "INSERT INTO kontak (Nama, Email, Telpon, Pesan) VALUES ('$nama', '$email', '$telpon', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>