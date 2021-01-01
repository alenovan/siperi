<?php
	require 'include/config.php';
	$id = $_GET["id"];
	$query = mysqli_query($con, "DELETE FROM tb_mapel WHERE idMapel=$id");
    echo '<script>window.location.href = "./mapel.php";</script>';
?>v