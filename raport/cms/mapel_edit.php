<?php
    session_start();
    $_SESSION["menu"] = "mapel";
    include './include/header.php';
    $id  = $_GET["id"];
    $sql = mysqli_query($con, "SELECT * FROM tb_mapel where idMapel=$id");
    $found  = mysqli_num_rows($sql);
    if ($found == 0){
        echo '<script>window.location.href = "./mapel.php";</script>';
    }
    $row = mysqli_fetch_array($sql);


    if (isset($_GET["status"]) == "execute"){
        $kode  = $_POST["kode"];
        $nama  = $_POST["nama"];
        $query = mysqli_query($con, "UPDATE tb_mapel SET kodeMapel='$kode', namaMapel = '$nama' WHERE idMapel=$id");
        echo '<script>window.location.href = "./mapel.php";</script>';
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit mapel Arsip</h4>
                    </div>
                    <div class="card-body">
                        <form action="mapel_edit.php?status=execute&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode Mapel <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="kode" placeholder="Kode Mapel" value="<?php echo $row["kodeMapel"] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Mapel <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Mapel" value="<?php echo $row["namaMapel"] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <font color="red">*</font> = Required
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info">Save</button> &nbsp; <a href="./mapel.php" class="btn btn-danger">Cancel</a>                 
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './include/footer.php' ?>
        

