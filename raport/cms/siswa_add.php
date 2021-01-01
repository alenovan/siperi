<?php
    session_start();
    $_SESSION["menu"] = "siswa";
    include './include/header.php';

    if (isset($_GET["status"]) == "execute"){

        $nisn      = $_POST["nisn"];
        if ($nisn != ""){
            $check = mysqli_query($con, "SELECT nisn FROM tb_siswa WHERE nisn = '$nisn'");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./siswa_add.php?error=nisn";</script>';
            }
        }

        $nis      = $_POST["nis"];
        if ($nis != ""){
            $check = mysqli_query($con, "SELECT nis FROM tb_siswa WHERE nis = '$nis'");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./siswa_add.php?error=nis";</script>';
            }
        }

        $email     = $_POST["email"];
        if ($email != ""){
            $check = mysqli_query($con, "SELECT email FROM tb_siswa WHERE email = '$email'");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./siswa_add.php?error=email";</script>';
            }
        }

        $jenis          = $_POST["jenis"];
        $agama          = $_POST["agama"];
        $noTelp         = $_POST["noTelp"];
        $tempat         = $_POST["tempat"];
        $tglLahir       = date_create($_POST["tanggal"]);
        $tglLahir       = date_format($tglLahir, "Y-m-d");
        $alamat         = $_POST["alamat"];
        $imgProfile     = $_POST["imageInput"];
        $password       = md5($_POST["password"]);
        $firstName      = $_POST["firstName"];
        $lastName       = $_POST["lastName"];
        $fullName       = $firstName." ".$lastName;
        $namaAyah       = $_POST["namaAyah"];
        $namaIbu        = $_POST["namaIbu"];
        $pekerjaanAyah  = $_POST["pekerjaanAyah"];
        $pekerjaanIbu   = $_POST["pekerjaanIbu"];
        $noTelpOrt      = $_POST["noTelpOrt"];
        $alamatOrtu     = $_POST["alamatOrtu"];
        $kelas          = $_POST["kelas"];
        $bidang         = $_POST["bidang"];
        $program        = $_POST["program"];
        $idUser         = $_SESSION["idUser"];

        $query = mysqli_query($con, "INSERT INTO tb_siswa (idSiswa, nisn, nis, email, namaSiswa, password, jenisKelamin, tempatLahir, tglLahir, agama, noTelp, alamat, foto, namaAyah, namaIbu, pekerjaanAyah, pekerjaanIbu, noTelpOrtu, alamatOrtu, kelas, bidang, program, isActive, createdBy) VALUES 
                                    ('', '$nisn', '$nis', '$email', '$fullName', '$password', '$jenis',  '$tempat', '$tglLahir', '$agama', '$noTelp', '$alamat', '$imgProfile', '$namaAyah', '$namaIbu', '$pekerjaanAyah', '$pekerjaanIbu', '$noTelpOrt', '$alamatOrtu', '$kelas', '$bidang', '$program', 1, $idUser)");
        echo '<script>window.location.href = "./siswa.php";</script>';
    }

    $alertError = "";
    $displayError = "none";
    if (isset($_GET["error"])){
        $error = $_GET["error"];
        if ($error == "nisn"){
            $alertError = "NISN sudah terdaftar";
            $displayError = "block";
        }

        if ($error == "nis"){
            $alertError = "NIS sudah terdaftar";
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
                        <h4 class="card-title">Add Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger" style="display: <?php echo $displayError; ?>">
                            <i class="fa fa-warning"></i> <?php echo $alertError; ?>
                        </div>
                        <form action="siswa_add.php?status=execute" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>NISN <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="nisn" placeholder="NISN" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>NIS <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="nis" placeholder="NIS" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Password <font color="red">*</font></label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kelas <font color="red">*</font></label>
                                        <select class="form-control" name="kelas" id="kelas">
                                            <option value="0">---select---</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bidang <font color="red">*</font></label>
                                        <select class="form-control" name="bidang" id="bidang" onchange="getProgram()" required>
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
                                        <select class="form-control" name="program" id="program" required>
                                            <option value="">---select---</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5><b>Data Siswa</b></h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Depan <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="firstName" placeholder="Nama Depan" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Belakang <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="lastName" placeholder="Nama Belakang" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                            <hr>
                            <h5><b>Data Orang Tua Siswa</b></h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Ayah</label>
                                        <input type="text" class="form-control" name="namaAyah" placeholder="Nama Ayah" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Pekerjaan Ayah</label>
                                        <select class="form-control" name="pekerjaanAyah" id="pekerjaanAyah">
                                            <option value="">---select---</option>
                                            <?php
                                                $result = mysqli_query($con, "SELECT * FROM tb_pekerjaan");
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row["idPekerjaan"] ?>"><?php echo $row["namaPekerjaan"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Ibu</label>
                                        <input type="text" class="form-control" name="namaIbu" placeholder="Nama Ibu">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Pekerjaan Ibu</label>
                                        <select class="form-control" name="pekerjaanIbu" id="pekerjaanIbu">
                                            <option value="">---select---</option>
                                            <?php
                                                $result = mysqli_query($con, "SELECT * FROM tb_pekerjaan");
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row["idPekerjaan"] ?>"><?php echo $row["namaPekerjaan"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>No. Telp Orang Tua</label>
                                        <input type="number" class="form-control" name="noTelpOrtu" placeholder="No. Telp Orang Tua" >
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Alamat Orang Tua</label>
                                        <input type="text" class="form-control" name="alamatOrtu" placeholder="Alamat Orang Tua" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <font color="red">*</font> = Required
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info btn-sm">Save</button> &nbsp; <a href="./siswa.php" class="btn btn-danger btn-sm">Cancel</a>                            
                            <input type="hidden" name="imageInput" id="imageInput">
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Foto</h4>
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
        

