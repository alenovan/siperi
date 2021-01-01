<?php
    require_once 'config.php';
    if (isset($_SESSION["idUser"]) == ""){
        echo '<script>window.location.href = "../login.php";</script>';
    }
    $idLogin = $_SESSION["idUser"];
?>
<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SIAKAD SMK PEMUDA 1 KESAMBEN - CMS</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link href="../assets/css/style_admin.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/evo-calendar/css/evo-calendar.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/evo-calendar/css/evo-calendar.royal-navy.min.css"/>
</head>
<div class="wrapper">
    <?php include 'sidebar.php' ?>
    <div class="main-panel">
    <?php include 'navbar.php' ?>