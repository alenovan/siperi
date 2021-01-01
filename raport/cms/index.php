<?php
	require_once 'include/config.php';
	if (isset($_SESSION['id_user']) != ""){
		echo '<script>window.location.href = "dashboard.php";</script>';
	}else{
		echo '<script>window.location.href = "../login.php";</script>';
	}
?>