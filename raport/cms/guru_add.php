<?php
    session_start();
    $_SESSION["menu"] = "guru";
    include './include/header.php';

    if (isset($_GET["status"]) == "execute"){

        $nip       = $_POST["nip"];
        if ($nip != ""){
            $check = mysqli_query($con, "SELECT nip FROM tb_guru WHERE nip = '$nip'");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./guru_add.php?error=nip";</script>';
            }
        }

        $email     = $_POST["email"];
        if ($email != ""){
            $check = mysqli_query($con, "SELECT email FROM tb_guru WHERE email = '$email'");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./guru_add.php?error=email";</script>';
            }
        }

        $jenis      = $_POST["jenis"];
        $agama      = $_POST["agama"];
        $noTelp     = $_POST["noTelp"];
        $tempat     = $_POST["tempat"];
        $tglLahir   = date_create($_POST["tanggal"]);
        $tglLahir   = date_format($tglLahir, "Y-m-d");
        $alamat     = $_POST["alamat"];
        $imgProfile = $_POST["imageInput"];
        $password   = md5($_POST["password"]);
        $firstName  = $_POST["firstName"];
        $lastName   = $_POST["lastName"];
        $fullName   = $firstName." ".$lastName;
        $idUser     = $_SESSION["idUser"];

        $query = mysqli_query($con, "INSERT INTO tb_guru (idGuru, nip, namaGuru, password, email, jenisKelamin, agama, noTelp, tempatLahir, tglLahir, alamat, foto, isActive, createdBy) VALUES 
                                    ('', $nip, '$fullName', '$password', '$email', '$jenis', '$agama', '$noTelp', '$tempat', '$tglLahir', '$alamat', '$imgProfile', 1, $idUser)");
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
                        <h4 class="card-title">Add Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger" style="display: <?php echo $displayError; ?>">
                            <i class="fa fa-warning"></i> <?php echo $alertError; ?>
                        </div>
                        <form action="guru_add.php?status=execute" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>NIP <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="nip" placeholder="nip" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password <font color="red">*</font></label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Depan <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="firstName" placeholder="Nama Depan" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Belakang <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="lastName" placeholder="Nama Belakang" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jenis Kelamin </label>
                                        <select class="form-control" name="jenis" id="jenis">
                                            <option value="">---select---</option>
                                            <option value="1">Laki-Laki</option>
                                            <option value="2">Perempuan</option>
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
                                                <option value="<?php echo $row["idAgama"] ?>"><?php echo $row["namaAgama"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>No. Telp</label>
                                        <input type="number" class="form-control" name="noTelp" placeholder="No. Telp" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tempat Lahir </label>
                                        <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Lahir </label>
                                        <input type="date" class="form-control" name="tanggal" placeholder="Tanggal Lahir" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat </label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="">
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
                            <input type="hidden" name="imageInput" id="imageInput">
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
                                    <div class="imgShow"><img class="img-responsive" src="../assets/img/default-avatar.png" style="width: 38%" alt="..."></div>
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
        

