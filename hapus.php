<?php
include "koneksitampil.php";
$id_pelanggan = $_GET["id"];

    $query = "DELETE FROM tb_kedai WHERE id_pelanggan = $id_pelanggan";

    if(mysqli_query($mysqli, $query)) {
        echo "Record Deleted Succesfully";
} else {
    echo "Error Deleting Record." , mysqli_error($mysqli);
}
?>