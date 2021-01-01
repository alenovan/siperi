<?php
    session_start();
    $_SESSION["menu"] = "guru";
    include './include/header.php';

    $id  = $_GET["id"];
    $sql = mysqli_query($con, "SELECT * FROM tb_guru where idGuru = $id");
    $found  = mysqli_num_rows($sql);
    if ($found == 0){
        echo '<script>window.location.href = "./guru.php";</script>';
    }

    $fetch = mysqli_fetch_array($sql);
    $fullName = explode(" ", $fetch["namaGuru"]);
    $firstName = $fullName[0];
    $lastName = $fullName[1];
    $noTelpF = $fetch["noTelp"];
    if ($noTelpF == 0){
        $noTelpF = "";
    }

    $tglLahirF   = date_create($fetch["tglLahir"]);
    $tglLahirF   = date_format($tglLahirF, "Y-m-d");

    if (isset($_GET["status"]) == "execute"){

        $nip       = $_POST["nip"];
        if ($nip != ""){
            $check = mysqli_query($con, "SELECT nip FROM tb_guru WHERE nip = '$nip' and idGuru != $id");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./guru_edit.php?error=nip";</script>';
            }
        }

        $email     = $_POST["email"];
        if ($email != ""){
            $check = mysqli_query($con, "SELECT email FROM tb_guru WHERE email = '$email' and idGuru != $id");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./guru_edit.php?error=email";</script>';
            }
        }

        $jenis      = $_POST["jenis"];
        $agama      = $_POST["agama"];
        $noTelp     = $_POST["noTelp"];
        $tempat     = $_POST["tempat"];
        $tglLahir   = $_POST["tanggal"];
        $alamat     = $_POST["alamat"];
        $imgProfile = $_POST["imageInput"];
        $firstName  = $_POST["firstName"];
        $lastName   = $_POST["lastName"];
        $fullName   = $firstName." ".$lastName;
        $idUser     = $_SESSION["idUser"];
        $updatedDate= date("Y-m-d");

        $query = mysqli_query($con, "UPDATE tb_guru set nip = $nip, namaGuru = '$fullName', email = '$email', jenisKelamin = $jenis, agama = $agama, noTelp = '$noTelp', tempatLahir = '$tempat', tglLahir = '$tglLahir', alamat = '$alamat', foto = '$imgProfile', updatedDate = '$updatedDate', updatedBy = '$idUser' WHERE idGuru = $id");
        echo '<script>window.location.href = "./guru.php";</script>';
    }

    $alertError = "";
    $displayError = "none";
    if (isset($_GET["error"])){
        $error = $_GET["error"];
        if ($error == "nip"){
            $alertError = "NIP sudah terdaftar";
            $displayError = "block";
        }

        if ($error == "email"){
            $alertError = "Email sudah terdaftar, silahkan masukkan email yang lain";
            $displayError = "block";
        }
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger" style="display: <?php echo $displayError; ?>">
                            <i class="fa fa-warning"></i> <?php echo $alertError; ?>
                        </div>
                        <form action="guru_edit.php?status=execute&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>NIP <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="nip" placeholder="nip" value="<?php echo $fetch['nip'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password <font color="red">*</font></label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $fetch['password'] ?>" required disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $fetch['email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Depan <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="firstName" placeholder="Nama Depan" value="<?php echo $firstName ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Belakang <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="lastName" placeholder="Nama Belakang" value="<?php echo $lastName ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jenis Kelamin </label>
                                        <select class="form-control" name="jenis" id="jenis">
                                            <option value="">---select---</option>
                                            <option value="1" <?php if($fetch["jenisKelamin"] == 1) { echo "selected"; } ?>>Laki-Laki</option>
                                            <option value="2" <?php if($fetch["jenisKelamin"] == 2) { echo "selected"; } ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="form-control" name="agama" id="agama">
                                            <option value="">---select---</option>
                                            <?php
                                                $result = mysqli_query($con, "SELECT * FROM tb_agama");
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row["idAgama"] ?>" <?php if($fetch["agama"] == $row["idAgama"]) { echo "selected"; } ?>><?php echo $row["namaAgama"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>No. Telp</label>
                                        <input type="number" class="form-control" name="noTelp" placeholder="No. Telp" value="<?php echo $noTelpF ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tempat Lahir </label>
                                        <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir" value="<?php echo $fetch['tempatLahir'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Lahir </label>
                                        <input type="date" class="form-control" name="tanggal" placeholder="Tanggal Lahir" value="<?php echo $tglLahirF ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat </label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $fetch['alamat'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <font color="red">*</font> = Required
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info btn-sm">Save</button> &nbsp; <a href="./guru.php" class="btn btn-danger btn-sm">Cancel</a>                            
                            <input type="hidden" name="imageInput" id="imageInput" value="<?php echo $fetch['foto'] ?>">
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Image</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger alertFile"></div>
                        <form method="post" enctype="multipart/form-data" id="Myform">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="imageFile" id="imageFile" style="border: none;padding: 0" onchange="goUpload();">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="imgShow">
                                        <?php
                                            if ($fetch["foto"] == ""){
                                        ?>
                                            <img class="img-responsive" src="../assets/img/default-avatar.png" style="width: 50%" alt="...">
                                        <?php

                                            }else{
                                        ?>
                                            <img class="img-responsive" src="../assets/img/upload/<?php echo $fetch["foto"] ?>" style="width: 50%" alt="...">
                                        <?php
                                            }
                                        ?>  
                                    </div>
                                </div>
                            </div>
                        </form><br>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './include/footer.php' ?>
        

