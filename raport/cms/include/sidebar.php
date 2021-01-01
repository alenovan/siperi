<div class="sidebar" data-image="../assets/img/background.jpeg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                SIADA SMK PEMUDA 1 KESAMBEN
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item <?php if ($_SESSION["menu"] == "dashboard"){ echo 'active'; } ?>">
                <a class="nav-link" href="./dashboard.php">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item <?php if ($_SESSION["menu"] == "profil"){ echo 'active'; } ?>">
                <a class="nav-link" href="./profil.php">
                    <i class="nc-icon nc-badge"></i>
                    <p>Profil</p>
                </a>
            </li>
            <li class="nav-item <?php if ($_SESSION["menu"] == "user"){ echo 'active'; } ?>">
                <a class="nav-link" href="./user.php">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Management User</p>
                </a>
            </li>
            <li class="nav-item <?php if ($_SESSION["menu"] == "guru"){ echo 'active'; } ?>">
                <a class="nav-link" href="./guru.php">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Guru</p>
                </a>
            </li>
            <li class="nav-item <?php if ($_SESSION["menu"] == "siswa"){ echo 'active'; } ?>">
                <a class="nav-link" href="./siswa.php">
                    <i class="nc-icon nc-android"></i>
                    <p>Siswa</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#submenumaster" data-toggle="collapse" aria-expanded="false" class="nav-link">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>DATA MASTER</p>
                    </div>
                </a>
                <div id='submenumaster' class="collapse sidebar-submenu <?php if ($_SESSION["menu"] == "kelas" || $_SESSION["menu"] == "mapel" || $_SESSION["menu"] == "ekstrakulikuler"  || $_SESSION["menu"] == "bidang"  || $_SESSION["menu"] == "program"){ echo 'show'; } ?>">
                    <a href="bidang.php" class="nav-link submenuside <?php if ($_SESSION["menu"] == "bidang"){ echo 'active'; } ?>">
                        <i class="nc-icon nc-stre-right"></i> <span class="menu-collapsed">Bidang Keahlian</span>
                    </a>
                    <a href="program.php" class="nav-link submenuside <?php if ($_SESSION["menu"] == "program"){ echo 'active'; } ?>">
                        <i class="nc-icon nc-stre-right"></i> <span class="menu-collapsed">Program Keahlian</span>
                    </a>
                    <a href="kelas.php" class="nav-link submenuside <?php if ($_SESSION["menu"] == "kelas"){ echo 'active'; } ?>">
                        <i class="nc-icon nc-stre-right"></i> <span class="menu-collapsed">Kelas</span>
                    </a>
                    <a href="mapel.php" class="nav-link submenuside <?php if ($_SESSION["menu"] == "mapel"){ echo 'active'; } ?>">
                        <i class="nc-icon nc-stre-right"></i> <span class="menu-collapsed">Mapel</span>
                    </a>
                    <a href="ekstrakulikuler.php" class="nav-link submenuside <?php if ($_SESSION["menu"] == "ekstrakulikuler"){ echo 'active'; } ?>">
                        <i class="nc-icon nc-stre-right"></i> <span class="menu-collapsed">Ekstrakulikuler</span>
                    </a>
                </div>
            </li> 
            <li class="nav-item">
                <a href="#submenusettings" data-toggle="collapse" aria-expanded="false" class="nav-link">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="nc-icon nc-settings-gear-64"></i>
                        <p>Settings</p>
                    </div>
                </a>
                <div id='submenusettings' class="collapse sidebar-submenu <?php if ($_SESSION["menu"] == "setMapel" || $_SESSION["menu"] == "setKelas" || $_SESSION["menu"] == "setTahunAktif" || $_SESSION["menu"] == "setWaliKelas" || $_SESSION["menu"] == "setJadwal"){ echo 'show'; } ?>">
                    <a href="set_mapel.php" class="nav-link submenuside <?php if ($_SESSION["menu"] == "setMapel"){ echo 'active'; } ?>">
                        <i class="nc-icon nc-stre-right"></i> <span class="menu-collapsed">Set Mapel</span>
                    </a>
                    <a href="set_kelas.php" class="nav-link submenuside <?php if ($_SESSION["menu"] == "setKelas"){ echo 'active'; } ?>">
                        <i class="nc-icon nc-stre-right"></i> <span class="menu-collapsed">Set Kelas</span>
                    </a>
                    <a href="set_tahun.php" class="nav-link submenuside <?php if ($_SESSION["menu"] == "setTahunAktif"){ echo 'active'; } ?>">
                        <i class="nc-icon nc-stre-right"></i> <span class="menu-collapsed">Set Tahun Aktif</span>
                    </a>
                    <a href="set_waliKelas.php" class="nav-link submenuside <?php if ($_SESSION["menu"] == "setWaliKelas"){ echo 'active'; } ?>">
                        <i class="nc-icon nc-stre-right"></i> <span class="menu-collapsed">Set Wali Kelas</span>
                    </a>
                    <a href="set_Jadwal.php" class="nav-link submenuside <?php if ($_SESSION["menu"] == "setJadwal"){ echo 'active'; } ?>">
                        <i class="nc-icon nc-stre-right"></i> <span class="menu-collapsed">Set Jadwal Pelajaran</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>