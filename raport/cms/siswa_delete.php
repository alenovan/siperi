<?php
	require 'include/config.php';
	$id = $_GET["id"];
	$query = mysqli_query($con, "DELETE FROM tb_siswa WHERE idSiswa=$id");
    echo '<script>window.location.href = "./siswa.php";</script>';
?>v