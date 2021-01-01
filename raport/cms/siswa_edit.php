<?php
    session_start();
    $_SESSION["menu"] = "siswa";
    include './include/header.php';

    $id  = $_GET["id"];
    $sql = mysqli_query($con, "SELECT * FROM tb_siswa where idSiswa = $id");
    $found  = mysqli_num_rows($sql);
    if ($found == 0){
        echo '<script>window.location.href = "./siswa.php";</script>';
    }

    $fetch = mysqli_fetch_array($sql);
    $fullName = explode(" ", $fetch["namaSiswa"]);
    $firstName = $fullName[0];
    $lastName = $fullName[1];
    $noTelpF = $fetch["noTelp"];
    if ($noTelpF == 0){
        $noTelpF = "";
    }

    $noTelpOrtu = $fetch["noTelpOrtu"];
    if ($noTelpOrtu == 0){
        $noTelpOrtu = "";
    }

    $tglLahirF   = date_create($fetch["tglLahir"]);
    $tglLahirF   = date_format($tglLahirF, "Y-m-d");
    $idBidang    = $fetch["bidang"];

    if (isset($_GET["status"]) == "execute"){

        $nisn      = $_POST["nisn"];
        if ($nisn != ""){
            $check = mysqli_query($con, "SELECT nisn FROM tb_siswa WHERE nisn = '$nisn' and idSiswa != $id");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./siswa_edit.php?error=nisn";</script>';
            }
        }

        $nis      = $_POST["nis"];
        if ($nis != ""){
            $check = mysqli_query($con, "SELECT nis FROM tb_siswa WHERE nis = '$nis' and idSiswa != $id");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./siswa_edit.php?error=nis";</script>';
            }
        }

        $email     = $_POST["email"];
        if ($email != ""){
            $check = mysqli_query($con, "SELECT email FROM tb_siswa WHERE email = '$email' and idSiswa != $id ");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./siswa_edit.php?error=email";</script>';
            }
        }

        $jenis          = $_POST["jenis"];
        $agama          = $_POST["agama"];
        $noTelp         = $_POST["noTelp"];
        $tempat         = $_POST["tempat"];
        $tglLahir       = $_POST["tanggal"];
        $alamat         = $_POST["alamat"];
        $imgProfile     = $_POST["imageInput"];
        $firstName      = $_POST["firstName"];
        $lastName       = $_POST["lastName"];
        $fullName       = $firstName." ".$lastName;
        $namaAyah       = $_POST["namaAyah"];
        $namaIbu        = $_POST["namaIbu"];
        $pekerjaanAyah  = $_POST["pekerjaanAyah"];
        $pekerjaanIbu   = $_POST["pekerjaanIbu"];
        $noTelpOrt      = $_POST["noTelpOrtu"];
        $alamatOrtu     = $_POST["alamatOrtu"];
        $kelas          = $_POST["kelas"];
        $bidang         = $_POST["bidang"];
        $program        = $_POST["program"];
        $idUser         = $_SESSION["idUser"];
        $updatedDate    = date("Y-m-d");

        $query = mysqli_query($con, "UPDATE tb_siswa set nisn = '$nisn', nis = '$nis', kelas = '$kelas', email = '$email', 
                                    namaSiswa = '$fullName', jenisKelamin = '$jenis', tempatLahir = '$tempat', tglLahir = '$tglLahir', 
                                    agama = '$agama', noTelp = '$noTelp', alamat = '$alamat', foto = '$imgProfile', updatedBy = $idUser, 
                                    updatedDate = '$updatedDate', namaAyah = '$namaAyah', namaIbu = '$namaIbu', pekerjaanAyah = '$pekerjaanAyah', pekerjaanIbu = '$pekerjaanIbu', noTelpOrtu='$noTelpOrt', alamatOrtu='$alamatOrtu', bidang = '$bidang',
                                    program = '$program'  
                                    WHERE idSiswa = $id");
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
                        <h4 class="card-title">Edit Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger" style="display: <?php echo $displayError; ?>">
                            <i class="fa fa-warning"></i> <?php echo $alertError; ?>
                        </div>
                        <form action="siswa_edit.php?status=execute&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>NISN <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="nisn" placeholder="NISN" value="<?php echo $fetch['nisn'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>NIS <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="nis" placeholder="NIS" value="<?php echo $fetch['nis'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Password <font color="red">*</font></label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $fetch['password'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kelas <font color="red">*</font></label>
                                        <select class="form-control" name="kelas" id="kelas">
                                            <option value="0">---select---</option>
                                            <option value="10" <?php if($fetch["kelas"] == 10) { echo "selected"; } ?>>10</option>
                                            <option value="11" <?php if($fetch["kelas"] == 11) { echo "selected"; } ?>>11</option>
                                            <option value="12" <?php if($fetch["kelas"] == 12) { echo "selected"; } ?>>12</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                                <option value="<?php echo $row["idBidang"] ?>" <?php if($row["idBidang"] == $idBidang){ echo 'selected'; } ?>><?php echo $row["namaBidang"] ?> (<?php echo $row["kodeBidang"] ?>)</option>
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
                                            <?php 
                                                $result = mysqli_query($con, "SELECT * FROM tb_program WHERE idBidang = $idBidang");
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row["idProgram"] ?>" <?php if($row["idProgram"] == $fetch["program"]){ echo 'selected'; } ?>><?php echo $row["namaProgram"] ?> (<?php echo $row["kodeProgram"] ?>)</option>
                                            <?php
                                                }
                                            ?>
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
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $fetch['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Depan <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="firstName" placeholder="Nama Depan" value="<?php echo $firstName ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Belakang <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="lastName" placeholder="Nama Belakang" value="<?php echo $lastName ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                            <hr>
                            <h5><b>Data Orang Tua Siswa</b></h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Ayah</label>
                                        <input type="text" class="form-control" name="namaAyah" placeholder="Nama Ayah" value="<?php echo $fetch['namaAyah'] ?>">
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
                                                <option value="<?php echo $row["idPekerjaan"] ?>" <?php if($fetch["pekerjaanAyah"] == $row["idPekerjaan"]) { echo "selected"; } ?>><?php echo $row["namaPekerjaan"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Ibu</label>
                                        <input type="text" class="form-control" name="namaIbu" placeholder="Nama Ibu" value="<?php echo $fetch['namaIbu'] ?>">
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
                                                <option value="<?php echo $row["idPekerjaan"] ?>" <?php if($fetch["pekerjaanIbu"] == $row["idPekerjaan"]) { echo "selected"; } ?>><?php echo $row["namaPekerjaan"] ?></option>
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
                                        <input type="number" class="form-control" name="noTelpOrtu" placeholder="No. Telp Orang Tua" value="<?php echo $noTelpOrtu ?>">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Alamat Orang Tua</label>
                                        <input type="text" class="form-control" name="alamatOrtu" placeholder="Alamat Orang Tua" value="<?php echo $fetch['alamatOrtu'] ?>">
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
        

