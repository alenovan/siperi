<?php
	require 'include/config.php';
	$id = $_GET["id"];
	$query = mysqli_query($con, "DELETE FROM tb_guru WHERE idGuru=$id");
    echo '<script>window.location.href = "./guru.php";</script>';
?>v