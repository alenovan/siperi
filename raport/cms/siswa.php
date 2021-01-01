<?php
  session_start();
  $_SESSION["menu"] = "siswa";
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
                            <font style="font-size:20px;">Siswa List</font> &nbsp;&nbsp;&nbsp; <a href="./siswa_add.php" class="btn btn-success btn-sm" style="margin-top: -5px;">ADD</a>
                          </div>
                          <div class="col-md-3 text-right">
                            Search : <input type="text" name="search" id="search" onchange="goSearch('siswa');" value="<?php echo $key ?>">
                          </div>
                        </div>
                      </div>
                      <table class="table table-hover table-striped">
                          <thead>
                              <th class="text-center">No</th>
                              <th class="text-center">NISN</th>
                              <th class="text-center">NIS</th>
                              <th>Nama</th>
                              <th class="text-center">Kelas</th>
                              <th>Status</th>
                              <th>Action</th>
                          </thead>
                          <tbody>
                            <?php
                              $sqlSearch = "";
                              if ($key != ""){
                                $sqlSearch = " WHERE namaSiswa LIKE '%".$key."%'";
                              }
                              $per_page = 10;
                              $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                              $start = ($page>1) ? ($page * $per_page) - $per_page : 0;
                              $result = mysqli_query($con, "SELECT * FROM tb_siswa".$sqlSearch);
                              $total = mysqli_num_rows($result);
                              $pages = ceil($total/$per_page);            
                              $query = "SELECT * FROM tb_siswa ".$sqlSearch." LIMIT $start, $per_page";
                              $no =$start+1;
                              $sql = mysqli_query($con, $query);
                              if ($total > 0){
                                while ($row = mysqli_fetch_array($sql)) {
                                  $isActive = "<button class='btn btn-danger btn-sm' style='background:red;color:white;border:1px solid red'>Tidak aktif</button>";
                                  if ($row["isActive"]){
                                    $isActive = "<button class='btn btn-success btn-sm' style='background:green;color:white;border:1px solid green'>Aktif</button>";
                                  }
                            ?>
                              <tr>
                                <td class="text-center" style="width: 80px"><?php echo $no++; ?></td>
                                <td class="text-center" style="width: 100px;"><?php echo $row["nisn"] ?></td>
                                <td class="text-center" style="width: 100px;"><?php echo $row["nis"] ?></td>
                                <td style="width: 1000px;"><?php echo $row["namaSiswa"] ?></td>
                                <td class="text-center" style="width: 100px;"><?php echo $row["kelas"] ?></td>
                                <td style="width: 200px;"><?php echo $isActive ?></td>
                                <td>
                                  <?php
                                    if ($row["isActive"]){
                                  ?>
                                    <a href="./siswa_status.php?id=<?php echo $row['idSiswa'] ?>&status=0" class="btn btn-info btn-sm">NONAKTIF</a>
                                  <?php
                                    }else{
                                  ?>
                                    <a href="./siswa_status.php?id=<?php echo $row['idSiswa'] ?>&status=1" class="btn btn-info btn-sm">AKTIFKAN</a>
                                  <?php
                                    }
                                  ?>&nbsp;
                                  <a href="./siswa_edit.php?id=<?php echo $row['idSiswa'] ?>" class="btn btn-warning btn-sm">EDIT</a>&nbsp;
                                  <a href="./siswa_delete.php?id=<?php echo $row['idSiswa'] ?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin ingin menghapus ini?')">DELETE</a>
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
        

