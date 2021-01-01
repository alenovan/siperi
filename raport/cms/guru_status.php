<?php
	require 'include/config.php';
	$id 	= $_GET["id"];
	$status = $_GET["status"];
	if ($status != 0 && $status != 1){
		$status = 0;
	}
	$query 	= mysqli_query($con, "UPDATE tb_guru set isActive=$status WHERE idGuru=$id");
    echo '<script>window.location.href = "./guru.php";</script>';
?>