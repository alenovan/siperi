<?php
    require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>FoodArea</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/rating.css" rel="stylesheet" />
</head>
<body>
    <header class="section-header">
        <nav class="navbar navbar-dark navbar-expand p-0 bg-primary" style="background-image: url('assets/img/footer_back.png');">
            <div class="container">
                <ul class="navbar-nav d-none d-md-flex mr-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="list.php">List</a></li>
                </ul>
                <ul class="navbar-nav" style="color: white">
                    <li class="nav-item"><a href="#" class="nav-link"> Call: 0856-2344-4322 </a></li>
                    <li class="nav-item"><a href="#" class="nav-link"> <i class="fa fa-facebook-square"></i> </a></li>
                    <li class="nav-item"><a href="#" class="nav-link"> <i class="fa fa-twitter-square"></i> </a></li>
                    <li class="nav-item"><a href="#" class="nav-link"> <i class="fa fa-instagram"></i> </a></li>
                    <li class="nav-item"><a href="#" class="nav-link"> <i class="fa fa-google"></i> </a></li>
                </ul>
            </div>
        </nav>
        <section class="header-main border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-6" style="margin-top: 10px;">
                        <a href="index.php" class="brand-wrap">
                            <h2>FOODAREA</h2>
                        </a>
                    </div>
                    <?php
                        $search = "";
                        if (isset($_GET["status"]) == "execute"){
                            $search  = $_POST["search"];
                        }    
                    ?>
                    <div class="col-lg-6 col-12 col-sm-12">
                        <form action="list.php?status=execute" class="search" method="post">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo $search ?>">
                                <div class="input-group-append">
                                  <button class="btn btn-primary btn-search" type="submit">
                                    <i class="fa fa-search"></i>
                                  </button>
                                </div>
                            </div>
                        </form> <!-- search-wrap .end// -->
                    </div> <!-- col.// -->
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="widgets-wrap float-md-right">
                            <div class="widget-header icontext">
                                <a href="#"><img src="assets/img/appstore.png" height="40"></a>
                                <a href="#"><img src="assets/img/unnamed.png" height="40"></a>
                            </div>
                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- container.// -->
        </section> <!-- header-main .// -->
    </header> <!-- section-header.// -->