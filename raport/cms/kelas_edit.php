<?php
    session_start();
    $_SESSION["menu"] = "kelas";
    include './include/header.php';
    $id  = $_GET["id"];
    $sql = mysqli_query($con, "SELECT * FROM tb_kelas where idKelas=$id");
    $found  = mysqli_num_rows($sql);
    if ($found == 0){
        echo '<script>window.location.href = "./kelas.php";</script>';
    }
    $row = mysqli_fetch_array($sql);
    $idBidang = $row["idBidang"];

    if (isset($_GET["status"]) == "execute"){
        $bidang     = $_POST["bidang"];
        $program    = $_POST["program"];
        $tingkat    = $_POST["tingkat"];
        $alphabet   = $_POST["alphabet"];
        $nama       = $_POST["nama"];
        $query      = mysqli_query($con, "UPDATE tb_kelas SET idBidang='$bidang', idProgram='$program', tingkatKelas='$tingkat', alphabetKelas='$alphabet', namaKelas = '$nama' WHERE idKelas=$id");
        echo '<script>window.location.href = "./kelas.php";</script>';
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Kelas</h4>
                    </div>
                    <div class="card-body">
                        <form action="kelas_edit.php?status=execute&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bidang <font color="red">*</font></label>
                                        <select class="form-control" name="bidang" id="bidang" onchange="getProgram()">
                                            <option value="">---select---</option>
                                            <?php
                                                $result = mysqli_query($con, "SELECT * FROM tb_bidang");
                                                while ($fetch = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $fetch["idBidang"] ?>" <?php if($fetch["idBidang"] == $idBidang){ echo 'selected'; } ?>><?php echo $fetch["namaBidang"] ?> (<?php echo $fetch["kodeBidang"] ?>)</option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Program <font color="red">*</font></label>
                                        <select class="form-control" name="program" id="program">
                                            <option value="">---select---</option>
                                            <?php 
                                                $result = mysqli_query($con, "SELECT * FROM tb_program WHERE idBidang = $idBidang");
                                                while ($fetch2 = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $fetch2["idProgram"] ?>" <?php if($fetch2["idProgram"] == $row["idProgram"]){ echo 'selected'; } ?>><?php echo $fetch2["namaProgram"] ?> (<?php echo $fetch2["kodeProgram"] ?>)</option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tingkat <font color="red">*</font></label>
                                        <select class="form-control" name="tingkat" id="tingkat">
                                            <option value="">---select---</option>
                                            <option value="10" <?php if ($row["tingkatKelas"] == 10){ echo "selected"; } ?>>10</option>
                                            <option value="11" <?php if ($row["tingkatKelas"] == 11){ echo "selected"; } ?>>11</option>
                                            <option value="12" <?php if ($row["tingkatKelas"] == 12){ echo "selected"; } ?>>12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kelas <font color="red">*</font></label>
                                        <select class="form-control" name="alphabet" id="alphabet">
                                            <option value="">---select---</option>
                                            <option value="A" <?php if ($row["alphabetKelas"] == "A"){ echo "selected"; } ?>>A</option>
                                            <option value="B" <?php if ($row["alphabetKelas"] == "B"){ echo "selected"; } ?>>B</option>
                                            <option value="C" <?php if ($row["alphabetKelas"] == "C"){ echo "selected"; } ?>>C</option>
                                            <option value="D" <?php if ($row["alphabetKelas"] == "D"){ echo "selected"; } ?>>D</option>
                                            <option value="E" <?php if ($row["alphabetKelas"] == "E"){ echo "selected"; } ?>>E</option>
                                            <option value="F" <?php if ($row["alphabetKelas"] == "F"){ echo "selected"; } ?>>F</option>
                                            <option value="G" <?php if ($row["alphabetKelas"] == "G"){ echo "selected"; } ?>>G</option>
                                            <option value="H" <?php if ($row["alphabetKelas"] == "H"){ echo "selected"; } ?>>H</option>
                                            <option value="I" <?php if ($row["alphabetKelas"] == "I"){ echo "selected"; } ?>>I</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="nama" placeholder="Name" value="<?php echo $row["namaKelas"] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <font color="red">*</font> = Required
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info">Save</button> &nbsp; <a href="./kelas.php" class="btn btn-danger">Cancel</a>                 
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './include/footer.php' ?>
        

