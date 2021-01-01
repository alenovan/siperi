<?php
	require 'include/config.php';
	$id = $_GET["id"];
	$query = mysqli_query($con, "DELETE FROM tb_program WHERE idProgram=$id");
    echo '<script>window.location.href = "./program.php";</script>';
?>v