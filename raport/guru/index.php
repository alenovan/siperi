<?php
	require_once 'include/config.php';
	if (isset($_GET["status"]) == "execute"){
		$nip 		= $_POST["nip"];
		$password 	= md5($_POST["password"]);

		$query = mysqli_query($con, "SELECT * FROM tb_guru where nip = '$nip' and password = '$password'");
		$found = mysqli_num_rows($query);
		if ($found > 0){
			$row = mysqli_fetch_array($query);
			session_start();
			$_SESSION['namaGuru'] 	= $row["namaGuru"];
			$_SESSION['idGuru'] 	= $row["idGuru"];
			$_SESSION['nip'] 		= $row["nip"];
			echo '<script>window.location.href = "dashboard.php";</script>';
		}
	}

	if (isset($_SESSION['idGuru']) != ""){
		echo '<script>window.location.href = "dashboard.php";</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN - GURU</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/style_login.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
</head>
<body>
<div class="main">    
	<div class="container">
	<center>
		<div class="card" style="background-color: #f7f7f860;width: 450px;padding: 40px;">
	      	<h3 style="color: black">PORTAL GURU</h1>
			<br>
			<div class="logo">
	      		<img src="../assets/img/logo3.png" style="width: 60%;">
	          	<div class="clearfix"></div>
	      	</div>
	      	<br><br>	
      		<div id="login">
        		<form action="index.php?status=execute" method="post">
          			<fieldset class="clearfix">
			            <p><span class="fa fa-user"></span><input type="text" name="nip" Placeholder="NIP" required></p> 
			            <p><span class="fa fa-lock"></span><input type="password" name="password" Placeholder="Password" required></p>
			            <div>
			                <span style="width:48%; text-align:left;  display: inline-block;">
			                	<a class="small-text" href="../index.php" style="color: black">KEMBALI</a>
			            	</span>
			                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Sign In"></span>
			            </div>
          			</fieldset>
					<div class="clearfix"></div>
        		</form>
        		<div class="clearfix"></div>
      		</div>
	    </div>
	</center>
    </div>
</div>
</body>
	<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
</html>
