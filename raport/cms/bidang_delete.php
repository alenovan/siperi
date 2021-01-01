<?php
	require 'include/config.php';
	$id = $_GET["id"];
	$query = mysqli_query($con, "DELETE FROM tb_bidang WHERE idbidang=$id");
    echo '<script>window.location.href = "./bidang.php";</script>';
?>v