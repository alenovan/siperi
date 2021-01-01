<?php
    session_start();
    $_SESSION["menu"] = "dashboard";
?>
<?php include 'include/header.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="background-color: green;color: white">
                    <div class="card-header">
                        <h4 class="card-title">User</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body" style="margin-top: -30px;">
                        <?php
                            $query    = "SELECT tb_user.idUser FROM tb_user";
                            $result   = mysqli_query($con, $query);
                            $total    = mysqli_num_rows($result);
                        ?>
                        <h1><?php echo $total; ?></h1>
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i>
                            <i class="fa fa-circle text-danger"></i>
                            <i class="fa fa-circle text-warning"></i>
                        </div>
                        <hr>
                        <div class="stats">
                            <a href="user.php" style="color: white"><i class="fa fa-chevron-right"></i> Klik disini untuk melihat lebih detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="background-color: red;color: white">
                    <div class="card-header ">
                        <h4 class="card-title">Guru</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body" style="margin-top: -30px;">
                        <?php
                            $query2    = "SELECT tb_guru.idGuru FROM tb_guru";
                            $result2   = mysqli_query($con, $query2);
                            $total2    = mysqli_num_rows($result2);
                        ?>
                        <h1><?php echo $total2; ?></h1>
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i>
                            <i class="fa fa-circle text-danger"></i>
                            <i class="fa fa-circle text-warning"></i>
                        </div>
                        <hr>
                        <div class="stats">
                            <a href="guru.php" style="color: white"><i class="fa fa-chevron-right"></i> Klik disini untuk melihat lebih detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="background-color: blue;color: white">
                    <div class="card-header ">
                        <h4 class="card-title">Siswa</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body" style="margin-top: -30px;">
                        <?php
                            $query3    = "SELECT tb_siswa.idSiswa FROM tb_siswa";
                            $result3   = mysqli_query($con, $query3);
                            $total3    = mysqli_num_rows($result3);
                        ?>
                        <h1><?php echo $total3; ?></h1>
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i>
                            <i class="fa fa-circle text-danger"></i>
                            <i class="fa fa-circle text-warning"></i>
                        </div>
                        <hr>
                        <div class="stats">
                            <a href="siswa.php" style="color: white"><i class="fa fa-chevron-right"></i> Klik disini untuk melihat lebih detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="background-color: brown;color: white">
                    <div class="card-header ">
                        <h4 class="card-title">Bidang Keahlian</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body" style="margin-top: -30px;">
                        <?php
                            $query4    = "SELECT tb_bidang.idBidang FROM tb_bidang";
                            $result4   = mysqli_query($con, $query4);
                            $total4    = mysqli_num_rows($result4);
                        ?>
                        <h1><?php echo $total4; ?></h1>
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i>
                            <i class="fa fa-circle text-danger"></i>
                            <i class="fa fa-circle text-warning"></i>
                        </div>
                        <hr>
                        <div class="stats">
                            <a href="kelas.php" style="color: white"><i class="fa fa-chevron-right"></i> Klik disini untuk melihat lebih detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="background-color: purple;color: white">
                    <div class="card-header ">
                        <h4 class="card-title">Program Keahlian</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body" style="margin-top: -30px;">
                        <?php
                            $query4    = "SELECT tb_program.idProgram FROM tb_program";
                            $result4   = mysqli_query($con, $query4);
                            $total4    = mysqli_num_rows($result4);
                        ?>
                        <h1><?php echo $total4; ?></h1>
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i>
                            <i class="fa fa-circle text-danger"></i>
                            <i class="fa fa-circle text-warning"></i>
                        </div>
                        <hr>
                        <div class="stats">
                            <a href="kelas.php" style="color: white"><i class="fa fa-chevron-right"></i> Klik disini untuk melihat lebih detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="background-color: pink;color: white">
                    <div class="card-header ">
                        <h4 class="card-title">Kelas</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body" style="margin-top: -30px;">
                        <?php
                            $query4    = "SELECT tb_kelas.idKelas FROM tb_kelas";
                            $result4   = mysqli_query($con, $query4);
                            $total4    = mysqli_num_rows($result4);
                        ?>
                        <h1><?php echo $total4; ?></h1>
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i>
                            <i class="fa fa-circle text-danger"></i>
                            <i class="fa fa-circle text-warning"></i>
                        </div>
                        <hr>
                        <div class="stats">
                            <a href="kelas.php" style="color: white"><i class="fa fa-chevron-right"></i> Klik disini untuk melihat lebih detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="background-color: orange;color: white">
                    <div class="card-header ">
                        <h4 class="card-title">Mapel</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body" style="margin-top: -30px;">
                        <?php
                            $query4    = "SELECT tb_mapel.idMapel FROM tb_mapel";
                            $result4   = mysqli_query($con, $query4);
                            $total4    = mysqli_num_rows($result4);
                        ?>
                        <h1><?php echo $total4; ?></h1>
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i>
                            <i class="fa fa-circle text-danger"></i>
                            <i class="fa fa-circle text-warning"></i>
                        </div>
                        <hr>
                        <div class="stats">
                            <a href="role.php" style="color: white"><i class="fa fa-chevron-right"></i> Klik disini untuk melihat lebih detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="background-color: black;color: white">
                    <div class="card-header ">
                        <h4 class="card-title">Ekstrakulikuler</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body" style="margin-top: -30px;">
                        <?php
                            $query4    = "SELECT tb_ekstrakulikuler.idEkstra FROM tb_ekstrakulikuler";
                            $result4   = mysqli_query($con, $query4);
                            $total4    = mysqli_num_rows($result4);
                        ?>
                        <h1><?php echo $total4; ?></h1>
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i>
                            <i class="fa fa-circle text-danger"></i>
                            <i class="fa fa-circle text-warning"></i>
                        </div>
                        <hr>
                        <div class="stats">
                            <a href="role.php" style="color: white"><i class="fa fa-chevron-right"></i> Klik disini untuk melihat lebih detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--<div class="row">
            <div class="col-md-12" style="margin-top: 20px;">
                Keterangan : <br>
                <panel class="panel panel-default" style="min-width: 20px;min-height: 20px;border-radius: 50%;background: #ff7575;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</panel> Arsip Keluar <br>
                <panel class="panel panel-default" style="min-width: 20px;min-height: 20px;border-radius: 50%;background: #ffc107;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</panel> Arsip Masuk
            </div>
        </div>-->
    </div>
</div>
<?php include 'include/footer.php' ?>
        

