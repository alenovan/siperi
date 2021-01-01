<?php
	require '../config.php';
	$idUser = $_GET["id"];
	$query = mysqli_query($con, "DELETE FROM tb_user WHERE idUser=$idUser");
    echo '<script>window.location.href = "./user.php";</script>';
?>