<?php
	require 'include/config.php';
	$id = $_GET["id"];
	$query = mysqli_query($con, "DELETE FROM tb_ekstrakulikuler WHERE idEkstra=$id");
    echo '<script>window.location.href = "./ekstrakulikuler.php";</script>';
?>v