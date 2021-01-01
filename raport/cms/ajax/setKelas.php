<?php
	require_once '../include/config.php';
	$idSiswa  = $_POST["idSiswa"];
	$idKelas  = $_POST["idKelas"];
	$mode  	  = $_POST["mode"];
	if ($mode == 1){
		$cek 	 = mysqli_query($con, "SELECT * FROM tb_kelastmp WHERE idSiswa = $idSiswa");
	    $total 	 = mysqli_num_rows($cek);
	    if ($total == 0){
	    	$query = mysqli_query($con, "INSERT INTO tb_kelastmp VALUES ('', '$idKelas', '$idSiswa')");
	    	echo 'Sukses';
	    }else{
	    	echo 'Siswa yang dipilih sudah menjadi bagian dari kelas lain';
	    }
	}else{
		$query = mysqli_query($con, "DELETE FROM tb_kelastmp WHERE idSiswa = $idSiswa AND idKelas = $idKelas");
		echo 'Sukses';
	}
	
?>