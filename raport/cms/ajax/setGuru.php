<?php
	require_once '../include/config.php';
	$idGuru  = $_POST["idGuru"];
	$idKelas = $_POST["idKelas"];
	$mode  	 = $_POST["mode"];
	if ($mode == 1){
		$cek 	 = mysqli_query($con, "SELECT * FROM tb_walikelas WHERE idGuru = $idGuru");
	    $total 	 = mysqli_num_rows($cek);
	    if ($total == 0){
	    	$query = mysqli_query($con, "INSERT INTO tb_walikelas VALUES ('', '$idKelas', '$idGuru')");
	    	echo 'Sukses';
	    }else{
	    	echo 'Guru yang dipilih sudah menjadi wali kelas';
	    }
	}else{
		$query = mysqli_query($con, "DELETE FROM tb_walikelas WHERE idGuru = $idGuru AND idKelas = $idKelas");
		echo 'Sukses';
	}
	
?>