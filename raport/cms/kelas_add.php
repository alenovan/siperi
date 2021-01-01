<?php
    session_start();
    $_SESSION["menu"] = "kelas";
    include './include/header.php';

    if (isset($_GET["status"]) == "execute"){
        $bidang     = $_POST["bidang"];
        $program    = $_POST["program"];
        $tingkat    = $_POST["tingkat"];
        $alphabet   = $_POST["alphabet"];
        $nama       = $_POST["nama"];
        $query = mysqli_query($con, "INSERT INTO tb_kelas VALUES ('', '$bidang', '$program', '$tingkat', '$alphabet', '$nama')");
        echo '<script>window.location.href = "./kelas.php";</script>';
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Kelas</h4>
                    </div>
                    <div class="card-body">
                        <form action="kelas_add.php?status=execute" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bidang <font color="red">*</font></label>
                                        <select class="form-control" name="bidang" id="bidang" onchange="getProgram()">
                                            <option value="">---select---</option>
                                            <?php
                                                $result = mysqli_query($con, "SELECT * FROM tb_bidang");
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row["idBidang"] ?>"><?php echo $row["namaBidang"] ?> (<?php echo $row["kodeBidang"] ?>)</option>
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
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kelas <font color="red">*</font></label>
                                        <select class="form-control" name="alphabet" id="alphabet">
                                            <option value="">---select---</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                            <option value="G">G</option>
                                            <option value="H">H</option>
                                            <option value="I">I</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
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
        

