<?php
    session_start();
    $_SESSION["menu"] = "program";
    include './include/header.php';
    $id  = $_GET["id"];
    $sql = mysqli_query($con, "SELECT * FROM tb_program where idProgram=$id");
    $found  = mysqli_num_rows($sql);
    if ($found == 0){
        echo '<script>window.location.href = "./program.php";</script>';
    }
    $row = mysqli_fetch_array($sql);


    if (isset($_GET["status"]) == "execute"){
        $kode       = $_POST["kode"];
        $nama       = $_POST["nama"];
        $query      = mysqli_query($con, "UPDATE tb_program SET kodeProgram='$kode', namaProgram = '$nama' WHERE idprogram=$id");
        echo '<script>window.location.href = "./program.php";</script>';
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Program Keahlian</h4>
                    </div>
                    <div class="card-body">
                        <form action="program_edit.php?status=execute&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="kode" placeholder="Kode" value="<?php echo $row["kodeProgram"] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bidang <font color="red">*</font></label>
                                        <select class="form-control" name="bidang" id="bidang">
                                            <option value="">---select---</option>
                                            <?php
                                                $result = mysqli_query($con, "SELECT * FROM tb_bidang");
                                                while ($fetch = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $fetch["idBidang"] ?>" <?php if($fetch["idBidang"] == $row["idBidang"]){ echo 'selected'; } ?>><?php echo $fetch["namaBidang"] ?> (<?php echo $fetch["kodeBidang"] ?>)</option>
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
                                        <input type="text" class="form-control" name="nama" placeholder="Name" value="<?php echo $row["namaProgram"] ?>" required>
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
        

