<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #ffdab9;
        margin: 0;
        padding: 0;
        color: #333;
    }

    h3 {
        text-align: center;
        color: #ffa500;
        margin-top: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #fff;
        padding: 20px;
        margin: 30px auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 50%;
    }

    label {
        font-size: 18px;
        color: #ffa500;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        padding: 10px;
        border: 1px solid #ffa500;
        border-radius: 5px;
        width: 80%;
        margin-top: 5px;
        margin-bottom: 15px;
        font-size: 16px;
    }

    textarea {
        height: 50px;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: #ffa500;
        color: #fff;
        transition: background-color 0.3s;
    }

    button.tombolhome {
        margin-left: 10px;
    }

    button:hover {
        background-color: #d35400;
    }
    </style>
</head>

<body>

    <?php

include "koneksitampil.php";

$id_pelanggan = $_GET['id'];

$query = "SELECT * FROM tb_kedai WHERE id_pelanggan = $id_pelanggan ";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nama = $row['nama'];
    $email = $row['email'];
    $telepon = $row['telepon'];
    $pesan = $row['pesan'];
} else {
    echo "No record found.";
    exit();
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $pesan = $_POST['pesan'];

    $query = "UPDATE tb_kedai SET nama = '$nama', email = '$email', telepon = '$telepon', pesan = '$pesan' WHERE id_pelanggan = $id_pelanggan";

    if (mysqli_query($mysqli, $query)) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }
}
?>

    <h3>Edit Pemesanan</h3>

    <form method="post" action="">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required>
        <label>Telepon:</label>
        <textarea name="telepon" required><?php echo $telepon; ?></textarea>
        <label>Pesan:</label>
        <input type="text" name="pesan" value="<?php echo $pesan; ?>" required>
        <div class="container">
            <button type="submit" name="submit" value="Update">Update</button>
            <button class="tombolhome" type="button" onclick="location.href='index.html'">Home</button>
        </div>
    </form>

</body>

</html>