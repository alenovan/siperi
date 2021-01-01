<?php
	require_once 'cms/include/config.php';
	if (isset($_GET["status"]) == "execute"){
		$username = $_POST["username"];
		$password = md5($_POST["password"]);

		$query = mysqli_query($con, "SELECT * FROM tb_user where username = '$username'  and password = '$password'");
		$found = mysqli_num_rows($query);
		if ($found > 0){
			$row = mysqli_fetch_array($query);
			session_start();
			$_SESSION['nama'] = $row["nama"];
			$_SESSION['idUser'] = $row["idUser"];
			$_SESSION['username'] = $row["username"];
			echo '<script>window.location.href = "cms/dashboard.php";</script>';
		}
	}

	if (isset($_SESSION['idUser']) != ""){
		echo '<script>window.location.href = "cms/dashboard.php";</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN - CMS</title>
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="./assets/css/style_login.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
</head>
<body>
<div class="main">    
	<div class="container">
	<center>
		<div class="card" style="background-color: #f7f7f860;width: 450px;padding: 40px;">
			<h3 style="color: black">PORTAL ADMIN</h3>
			<br>
			<div class="logo">
	      		<img src="assets/img/logo3.png" style="width: 60%;">
	          	<div class="clearfix"></div>
	      	</div>
	      	<br><br>
      		<div id="login">
        		<form action="login.php?status=execute" method="post">
          			<fieldset class="clearfix">
			            <p><span class="fa fa-user"></span><input type="text" name="username" Placeholder="Username" required></p> 
			            <p><span class="fa fa-lock"></span><input type="password" name="password" Placeholder="Password" required></p>
			            <div>
			                <span style="width:48%; text-align:left;  display: inline-block;">
			                	<a class="small-text" href="#" style="color: black">Lupa Password?</a>
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
	<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
</html>
