<?php
    session_start();
    $_SESSION["menu"] = "program";
    include './include/header.php';

    if (isset($_GET["status"]) == "execute"){
        $kode       = $_POST["kode"];
        $nama       = $_POST["nama"];
        $bidang     = $_POST["bidang"];
        $query = mysqli_query($con, "INSERT INTO tb_program VALUES ('', $bidang, '$kode', '$nama')");
        echo '<script>window.location.href = "./program.php";</script>';
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Program Keahlian</h4>
                    </div>
                    <div class="card-body">
                        <form action="program_add.php?status=execute" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="kode" placeholder="Kode" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bidang <font color="red">*</font></label>
                                        <select class="form-control" name="bidang" id="bidang">
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
                            <button type="submit" class="btn btn-info">Save</button> &nbsp; <a href="./program.php" class="btn btn-danger">Cancel</a>                 
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './include/footer.php' ?>
        

