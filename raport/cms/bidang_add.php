<?php
    session_start();
    $_SESSION["menu"] = "bidang";
    include './include/header.php';

    if (isset($_GET["status"]) == "execute"){
        $kode       = $_POST["kode"];
        $nama       = $_POST["nama"];
        $query = mysqli_query($con, "INSERT INTO tb_bidang VALUES ('', '$kode', '$nama')");
        echo '<script>window.location.href = "./bidang.php";</script>';
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Bidang Keahlian</h4>
                    </div>
                    <div class="card-body">
                        <form action="bidang_add.php?status=execute" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="kode" placeholder="Kode" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                            <button type="submit" class="btn btn-info">Save</button> &nbsp; <a href="./bidang.php" class="btn btn-danger">Cancel</a>                 
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './include/footer.php' ?>
        

