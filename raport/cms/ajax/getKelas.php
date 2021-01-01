<?php 
	session_start();
	require_once '../include/config.php';
	$idBidang 	= $_POST["bidang"];
	$idProgram 	= $_POST["program"];
	$idKelas 	= $_POST["kelas"];
	$color 		= "blue";
	if ($idKelas == 10){
		$color 	= "green";
	}else if ($idKelas == 11){
		$color 	= "red";
	}
    $result = mysqli_query($con, "SELECT * FROM tb_kelas 
    							  WHERE idBidang = '$idBidang' 
    							  AND idProgram = '$idProgram' 
    							  AND tingkatKelas = '$idKelas'");
   	$total = mysqli_num_rows($result);
   	if ($total > 0) {
    	while ($row = mysqli_fetch_array($result)) {
    		$kelasID = $row["idKelas"];
    		$sql 	= mysqli_query($con, "SELECT tb_guru.idGuru, tb_guru.namaGuru, tb_guru.nip FROM tb_walikelas
    									  INNER JOIN tb_guru ON tb_guru.idGuru = tb_walikelas.idGuru AND tb_guru.isActive = 1
    							 		  WHERE idKelas = '$kelasID'");
   			$tot 	= mysqli_num_rows($sql);
   			$namaGuru = "Belum ada Wali Kelas";
   			if ($tot > 0){
   				$fetch = mysqli_fetch_array($sql);
   				$namaGuru = "<a target='_blank' href='guru_edit.php?id=".$fetch["idGuru"]."'>".$fetch["namaGuru"]." (".$fetch["nip"].")</a>";
   			}
?>
	<div class="col-md-4">
      	<div class="card">
		  	<div class="card-header" style="background: <?php echo $color; ?>;color: white;padding: 10px;font-size:20px;">
		    	<b><?php echo $row["namaKelas"] ?> - <?php echo $namaGuru; ?></b>
		    	<?php 
		    		if ($_SESSION["menu"] == "setKelas"){
		    	?>
		    		<button onclick="tambahSiswa(<?php echo $row["tingkatKelas"]; ?>, <?php echo $idBidang ?>, <?php echo $idProgram ?>, <?php echo $row["idKelas"]; ?>)" class="btn btn-default btn-sm pull-right" style="color: white;border-color:white">Tambah</button>
		    	<?php
		    		}else if ($_SESSION["menu"] == "setWaliKelas"){
		    			if ($tot == 0){
		    	?>
		    			<button onclick="getGuru(<?php echo $kelasID; ?>, 1)" class="btn btn-default btn-sm pull-right" style="color: white;border-color:white">Tambah</button>
		    	<?php
		    			}else{
		    	?>
		    			<button onclick="setGuru(2, <?php echo $kelasID; ?>, <?php echo $fetch["idGuru"]; ?>)" class="btn btn-default btn-sm pull-right" style="color: white;border-color:white">Remove</button>
		    	<?php
		    			}
		    		}
		    	?>
		  	</div>
		  	<div class="card-body">
		  		<ul class="list-group list-group-flush">
		    		<?php
		    			$result2 = mysqli_query($con, "SELECT tb_siswa.idSiswa, tb_siswa.namaSiswa, tb_siswa.NISN
		    										   FROM tb_siswa
		    										   INNER JOIN tb_kelastmp ON tb_siswa.idSiswa = tb_kelastmp.idSiswa
		    										   		AND tb_kelastmp.idKelas = $kelasID
		    										   	ORDER BY tb_siswa.namaSiswa");
					   	$total2  = mysqli_num_rows($result2);
					   	if ($total2 > 0) {
					   		while ($row2 = mysqli_fetch_array($result2)) {
					?>
						<li class="list-group-item"><?php echo $row2["namaSiswa"]." (".$row2["NISN"].")"; ?> 
					<?php
								if ($_SESSION["menu"] == "setKelas"){
					?>
									<button onclick="setSiswa(2, <?php echo $row2["idSiswa"] ?>, <?php echo $kelasID; ?>)" class="btn btn-danger btn-sm pull-right"><i class="fa fa-minus"></i></button></li>
					<?php
								}
							}
					   	}else{
					?>
						<center>
						<li class="list-group-item">Belum ada siswa dikelas ini</li>
						</center>
					<?php
					   	}
		    		?>
		    	</ul>
		  	</div>
		</div>
    </div>
<?php
		}
    }else{
?>
	<div class="col-md-12">
      	<center>
        	<img src="../assets/img/error.png" style="width: 70%;">
        	<h2><b>404</b></h2>
        	<h3><b>DATA TIDAK DITEMUKAN</b></h3>
      	</center>
    </div>
<?php
    }
?>