<?php
    session_start();
    $_SESSION["menu"] = "user";
    include './include/header.php';

    $id  = $_GET["id"];
    $sql = mysqli_query($con, "SELECT * FROM tb_user where idUser = $id");
    $found  = mysqli_num_rows($sql);
    if ($found == 0){
        echo '<script>window.location.href = "./user.php";</script>';
    }
    
    $row = mysqli_fetch_array($sql);
    $fullName = explode(" ", $row["nama"]);
    $firstName = $fullName[0];
    $lastName = $fullName[1];

    if (isset($_GET["status"]) == "execute"){

        $username = $_POST["username"];
        if ($username != ""){
            $check = mysqli_query($con, "SELECT idUser FROM tb_user WHERE username = '$username' AND idUser != $id");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./user_edit.php?error=user&id=id='.$id.'";</script>';
            }
        }

        $email = $_POST["email"];
        if ($email != ""){
            $check = mysqli_query($con, "SELECT idUser FROM tb_user WHERE email = '$email' AND idUser != $id");
            $total = mysqli_num_rows($check);
            if ($total > 0){
                echo '<script>window.location.href = "./user_edit.php?error=email&id='.$id.'";</script>';
            }
        }

        $firstName  = $_POST["firstName"];
        $lastName   = $_POST["lastName"];
        $fullName   = $firstName." ".$lastName; 
        $imgProfile = $_POST["imageInput"];

        $query = mysqli_query($con, "UPDATE tb_user SET nama = '$fullName', username='$username', email='$email', image='$imgProfile' WHERE idUser=$id");
        echo '<script>window.location.href = "./user.php";</script>';
    }

    $alertError = "";
    $displayError = "none";
    if (isset($_GET["error"])){
        $error = $_GET["error"];
        if ($error == "user"){
            $alertError = "Username already exist, please input another Username";
            $displayError = "block";
        }

        if ($error == "email"){
            $alertError = "Email already exist, please input another Email";
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
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger" style="display: <?php echo $displayError; ?>">
                            <i class="fa fa-warning"></i> <?php echo $alertError; ?>
                        </div>
                        <form action="user_edit.php?status=execute&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Username <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $row["username"] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password <font color="red">*</font></label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $row["password"] ?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Role <font color="red">*</font></label>
                                        <select class="form-control" name="role" id="role" required>
                                            <option value="">---select---</option>
                                            <option value="1" <?php if($row["role"] == 1) { echo "selected"; } ?>>Administrator</option>
                                            <option value="2" <?php if($row["role"] == 2) { echo "selected"; } ?>>Editor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Depan <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="firstName" placeholder="Nama Depan" value="<?php echo $firstName ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Belakang <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="lastName" placeholder="Nama Belakang" value="<?php echo $lastName ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email <font color="red">*</font></label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row["email"] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <font color="red">*</font> = Required
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info btn-sm">Save</button> &nbsp; <a href="./user.php" class="btn btn-danger btn-sm">Cancel</a>                            
                            <input type="hidden" name="imageInput" id="imageInput" value="<?php echo $row["image"] ?>">
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
                                    <div class="imgShow">
                                        <?php
                                            if ($row["image"] == ""){
                                        ?>
                                            <img class="img-responsive" src="../assets/img/default-avatar.png" style="width: 35.9%" alt="...">
                                        <?php

                                            }else{
                                        ?>
                                            <img class="img-responsive" src="../assets/img/upload/<?php echo $row["image"] ?>" style="width: 35.9%" alt="...">
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