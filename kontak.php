<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
    /* tambahkan styling CSS sesuai kebutuhan */
    </style>
</head>

<body>

    <?php
// Periksa apakah formulir dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'create.php'; // Sisipkan script PHP untuk menyimpan kontak ke database
    if ($result) {
        echo "<div class='message success'>Data kontak telah berhasil disimpan!</div>";
    } else {
        echo "<div class='message error'>Terjadi kesalahan saat menyimpan data kontak.</div>";
    }
}
?>

    <div id="contact" class="contact_section layout_padding">
        <div class="container">
            <div class="contact_section_2">
                <!-- Formulir kontak di sini -->
            </div>
        </div>
    </div>

</body>

</html>