<?php
	require 'include/config.php';
	$id = $_GET["id"];
	$query = mysqli_query($con, "DELETE FROM tb_kelas WHERE idKelas=$id");
    echo '<script>window.location.href = "./kelas.php";</script>';
?>v