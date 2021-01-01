<?php
$servername = "localhost";
$database = "db_raport";
$username = "root";
$password = "";

$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>