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
        </ul>
    </div>
</div>