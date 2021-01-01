<option value="">---select---</option>
<?php 
	require_once '../include/config.php';
	$idBidang = $_POST["bidang"];
    $result = mysqli_query($con, "SELECT * FROM tb_program WHERE idBidang = $idBidang");
    while ($row = mysqli_fetch_array($result)) {
?>
    <option value="<?php echo $row["idProgram"] ?>"><?php echo $row["namaProgram"] ?> (<?php echo $row["kodeProgram"] ?>)</option>
<?php
    }
?>