<?php
    session_start();
    $_SESSION["menu"] = "ekstrakulikuler";
    include './include/header.php';
    $id  = $_GET["id"];
    $sql = mysqli_query($con, "SELECT * FROM tb_ekstrakulikuler where idEkstra=$id");
    $found  = mysqli_num_rows($sql);
    if ($found == 0){
        echo '<script>window.location.href = "./ekstrakulikuler.php";</script>';
    }
    $row = mysqli_fetch_array($sql);


    if (isset($_GET["status"]) == "execute"){
        $nama  = $_POST["nama"];
        $query = mysqli_query($con, "UPDATE tb_ekstrakulikuler SET namaEkstra = '$nama' WHERE idEkstra=$id");
        echo '<script>window.location.href = "./ekstrakulikuler.php";</script>';
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Ekstrakulikuler</h4>
                    </div>
                    <div class="card-body">
                        <form action="ekstrakulikuler_edit.php?status=execute&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="nama" placeholder="Name" value="<?php echo $row["namaEkstra"] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <font color="red">*</font> = Required
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info">Save</button> &nbsp; <a href="./ekstrakulikuler.php" class="btn btn-danger">Cancel</a>                 
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './include/footer.php' ?>
        

