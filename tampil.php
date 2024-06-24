<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil</title>
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
        justify-content: center;
        margin: 20px 0;
    }

    input.search {
        padding: 10px;
        border: 1px solid #ffa500;
        border-radius: 5px;
        width: 200px;
        margin-right: 10px;
    }

    button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: #ffa500;
        color: #fff;
        margin-right: 10px;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #d35400;
    }

    table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    table,
    th,
    td {
        border: 1px solid #ffa500;
    }

    th,
    td {
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #ffa500;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #ffe6b3;
    }

    tr:nth-child(odd) {
        background-color: #ffdab9;
    }

    a.tomboledit,
    a.tombolhapus {
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 3px;
        margin: 0 5px;
    }

    a.tomboledit {
        background-color: #ffab00;
        color: #fff;
    }

    a.tombolhapus {
        background-color: #e67e22;
        color: #fff;
    }

    a.tomboledit:hover,
    a.tombolhapus:hover {
        opacity: 0.8;
    }
    </style>
    <link rel="stylesheet" href="../css/tampil.css">
</head>

<body>

    <?php
include "koneksitampil.php";

function query($query){
    global $mysqli;
    $result = mysqli_query($mysqli, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function search($keyword){
    $query = "SELECT * FROM tb_kedai WHERE 
        nama LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        telpon LIKE '%$keyword%' OR
        pesan LIKE '%$keyword%'
    ";
    return query($query);
}

if(isset($_POST['search'])){
    $tb_kedai = search($_POST["keyword"]);
} elseif(isset($_POST['all'])){
    $tb_kedai = query("SELECT * FROM tb_kedai");
} else {
    $tb_kedai = query("SELECT * FROM tb_kedai");
}
?>

    <h3> HASIL PEMESANAN </h3>

    <!--membuat table head-->
    <form action="" method="post">
        <input type="text" name="keyword" placeholder="Masukkan nama" class="search">
        <button class="tombolsearch" name="search" type="submit">search</button>
        <button class="tombolkembaii" name="all" type="submit">tampilkan Semua Data</button>
        <button class="tombolhome" type="button" onclick="location.href='index.html'">Home</button>
    </form>

    <table border="1">
        <!--membuat tabel head-->
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Pesan</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; foreach($tb_kedai as $hasil): ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $hasil['nama']; ?></td>
            <td><?php echo $hasil['email']; ?></td>
            <td><?php echo $hasil['telepon']; ?></td>
            <td><?php echo $hasil['pesan']; ?></td>
            <td>
                <a class="tomboledit" href="edit.php?id=<?php echo $hasil['id_pelanggan']; ?>">edit</a>
                <a class="tombolhapus" href="hapus.php?id=<?php echo $hasil['id_pelanggan']; ?>">hapus</a>
            </td>
        </tr>
        <?php $no++; endforeach; ?>
    </table>


    <?php
        $no++;
        ?>
    </table>
</body>

</html>