<?php
  session_start();
  $_SESSION["menu"] = "user";
  $key = "";
  if (isset($_GET["key"]) != ""){
    $key = $_GET["key"];
  }
?>
<?php include './include/header.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-body table-full-width table-responsive" style="padding: 20px;">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-9">
                            <font style="font-size:20px;">User List</font> &nbsp;&nbsp;&nbsp; <a href="./user_add.php" class="btn btn-success btn-sm" style="margin-top: -5px;">ADD</a> &nbsp;&nbsp;&nbsp; 
                          </div>
                          <div class="col-md-3 text-right">
                            Search : <input type="text" name="search" id="search" onchange="goSearch('user');" value="<?php echo $key ?>">
                          </div>
                        </div>
                      </div>
                      <table class="table table-hover table-striped">
                          <thead>
                              <th class="text-center">No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Username</th>
                              <th>Role</th>
                              <th>Action</th>
                          </thead>
                          <tbody>
                            <?php
                              $sqlSearch = "";
                              if ($key != ""){
                                $sqlSearch = " AND tb_user.name LIKE '%".$key."%'";
                              }
                              $per_page = 10;
                              $page     = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                              $start    = ($page>1) ? ($page * $per_page) - $per_page : 0;
                              $result   = mysqli_query($con, "SELECT * FROM tb_user
                                                              WHERE tb_user.idUser != $idLogin".$sqlSearch);
                              $total    = mysqli_num_rows($result);
                              $pages    = ceil($total/$per_page);            
                              $query    = "SELECT tb_user.idUser, tb_user.nama, tb_user.username, tb_user.email, tb_user.role 
                                           FROM tb_user 
                                           WHERE tb_user.idUser != $idLogin ".$sqlSearch." LIMIT $start, $per_page";
                              $no       = $start+1;
                              $sql      = mysqli_query($con, $query);
                              if ($total > 0){
                                while ($row = mysqli_fetch_array($sql)) {
                                  $role = "Editor";
                                  if ($row["role"] == 1){
                                    $role = "Admin";
                                  }
                            ?>
                              <tr>
                                <td class="text-center" style="width: 80px"><?php echo $no++; ?></td>
                                <td style="width: 400px;"><?php echo $row["nama"] ?></td>
                                <td style="width: 400px;"><?php echo $row["email"] ?></td>
                                <td style="width: 400px;"><?php echo $row["username"] ?></td>
                                <td style="width: 400px;"><?php echo $role ?></td>
                                <td>
                                  <a href="./user_edit.php?id=<?php echo $row['idUser'] ?>" class="btn btn-warning btn-sm">EDIT</a>&nbsp;
                                  <a href="./user_delete.php?id=<?php echo $row['idUser'] ?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin ingin menghapus ini?')">DELETE</a>
                                </td>
                              </tr>
                            <?php
                                }
                              }else{
                            ?>
                              <tr>
                                <th colspan="6" class="text-center">Currently there is no record</td>
                              </tr>
                            <?php
                              }
                            ?>
                          </tbody>
                      </table>
                      <div class="col-md-12">
                        <ul class="pagination pagination-sm">
                          <?php for ($i=1; $i<=$pages ; $i++){ ?>
                            <li class="page-item <?php if($page == $i){ echo 'active'; } ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './include/footer.php' ?>
        

