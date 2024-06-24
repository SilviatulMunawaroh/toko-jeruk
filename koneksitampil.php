<?php
$mysqli = new mysqli('localhost', 'root', '', 'db_kedai');

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}
?>