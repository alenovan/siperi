<?php
	require_once '../include/config.php';
	$idGuru  = $_POST["idGuru"];
	$idMapel = $_POST["idMapel"];
	$mode  	 = $_POST["mode"];
	if ($mode == 1){
		$cek 	 = mysqli_query($con, "SELECT * FROM tb_mapeltmp WHERE idGuru = $idGuru AND idMapel = $idMapel");
	    $total 	 = mysqli_num_rows($cek);
	    if ($total == 0){
	    	$query = mysqli_query($con, "INSERT INTO tb_mapeltmp VALUES ('', '$idMapel', '$idGuru')");
	    	echo 'Sukses';
	    }else{
	    	echo 'Mata pelajaran sudah ditambahkan sebelumnya';
	    }
	}else{
		$query = mysqli_query($con, "DELETE FROM tb_mapeltmp WHERE idGuru = $idGuru AND idMapel = $idMapel");
		echo 'Sukses';
	}
	
?>