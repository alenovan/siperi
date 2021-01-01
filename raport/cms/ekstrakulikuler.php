<?php
  session_start();
  $_SESSION["menu"] = "ekstrakulikuler";
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
                            <font style="font-size:20px;">List Ekstrakulikuler</font> &nbsp;&nbsp;&nbsp; <a href="./ekstrakulikuler_add.php" class="btn btn-success btn-sm" style="margin-top: -5px;">ADD</a>
                          </div>
                          <div class="col-md-3 text-right">
                            Search : <input type="text" name="search" id="search" onchange="goSearch('ekstrakulikuler');" value="<?php echo $key ?>">
                          </div>
                        </div>
                      </div>
                      <table class="table table-hover table-striped">
                          <thead>
                              <th class="text-center">No</th>
                              <th>Nama</th>
                              <th>Action</th>
                          </thead>
                          <tbody>
                            <?php
                              $sqlSearch = "";
                              if ($key != ""){
                                $sqlSearch = " WHERE namaEkstra LIKE '%".$key."%'";
                              }
                              $per_page = 10;
                              $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                              $start = ($page>1) ? ($page * $per_page) - $per_page : 0;
                              $result = mysqli_query($con, "SELECT * FROM tb_ekstrakulikuler".$sqlSearch);
                              $total = mysqli_num_rows($result);
                              $pages = ceil($total/$per_page);            
                              $query = "SELECT * FROM tb_ekstrakulikuler ".$sqlSearch." LIMIT $start, $per_page";
                              $no =$start+1;
                              $sql = mysqli_query($con, $query);
                              if ($total > 0){
                                while ($row = mysqli_fetch_array($sql)) {
                            ?>
                              <tr>
                                <td class="text-center" style="width: 80px"><?php echo $no++; ?></td>
                                <td style="width: 1200px;"><?php echo $row["namaEkstra"] ?></td>
                                <td>
                                  <a href="./ekstrakulikuler_edit.php?id=<?php echo $row['idEkstra'] ?>" class="btn btn-warning btn-sm">EDIT</a>&nbsp;
                                  <a href="./ekstrakulikuler_delete.php?id=<?php echo $row['idEkstra'] ?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin ingin menghapus ini?')">DELETE</a>
                                </td>
                              </tr>
                            <?php
                                }
                              }else{
                            ?>
                              <tr>
                                <th colspan="3" class="text-center">Currently there is no record</td>
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
        

