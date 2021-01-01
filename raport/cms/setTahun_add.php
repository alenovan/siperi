<?php
    session_start();
    $_SESSION["menu"] = "setTahunAktif";
    include './include/header.php';

    if (isset($_GET["status"]) == "execute"){
        $nama       = $_POST["nama"];
        $idUser     = $_SESSION["idUser"];
        $query = mysqli_query($con, "INSERT INTO tb_semester (idSemester, namaSemester, isActive, createdBy) VALUES ('', '$nama', 0, $idUser)");
        echo '<script>window.location.href = "./set_tahun.php";</script>';
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Semester</h4>
                    </div>
                    <div class="card-body">
                        <form action="setTahun_add.php?status=execute" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Semester <font color="red">*</font></label>
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
                            <button type="submit" class="btn btn-info">Save</button> &nbsp; <a href="./set_tahun.php" class="btn btn-danger">Cancel</a>                 
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './include/footer.php' ?>
        

