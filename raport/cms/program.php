<?php
  session_start();
  $_SESSION["menu"] = "program";
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
                            <font style="font-size:20px;">Program Keahlian List</font> &nbsp;&nbsp;&nbsp; <a href="./program_add.php" class="btn btn-success btn-sm" style="margin-top: -5px;">ADD</a>
                          </div>
                          <div class="col-md-3 text-right">
                            Search : <input type="text" name="search" id="search" onchange="goSearch('program');" value="<?php echo $key ?>">
                          </div>
                        </div>
                      </div>
                      <table class="table table-hover table-striped">
                          <thead>
                              <th class="text-center">No</th>
                              <th>Kode Program</th>
                              <th>Nama</th>
                              <th>Bidang</th>
                              <th>Action</th>
                          </thead>
                          <tbody>
                            <?php
                              $sqlSearch = "";
                              if ($key != ""){
                                $sqlSearch = " WHERE tb_program.namaProgram LIKE '%".$key."%'";
                              }
                              $per_page = 10;
                              $page   = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                              $start  = ($page>1) ? ($page * $per_page) - $per_page : 0;
                              $query  = "SELECT tb_program.idProgram, tb_bidang.kodeBidang, tb_bidang.namaBidang, 
                                        tb_program.kodeProgram, tb_program.namaProgram 
                                        FROM tb_program 
                                        INNER JOIN tb_bidang ON tb_program.idBidang = tb_bidang.idBidang ".$sqlSearch;
                              $result = mysqli_query($con, $query);
                              $total  = mysqli_num_rows($result);
                              $pages  = ceil($total/$per_page);            
                              $query  = $query." LIMIT $start, $per_page";
                              $no     = $start+1;
                              $sql    = mysqli_query($con, $query);
                              if ($total > 0){
                                while ($row = mysqli_fetch_array($sql)) {
                            ?>
                              <tr>
                                <td class="text-center" style="width: 80px"><?php echo $no++; ?></td>
                                <td style="width: 1200px;"><?php echo $row["kodeProgram"] ?></td>
                                <td style="width: 1200px;"><?php echo $row["namaProgram"] ?></td>
                                <td style="width: 1200px;"><?php echo $row["namaBidang"] ?> (<?php echo $row["kodeBidang"] ?>)</td>
                                <td>
                                  <a href="./program_edit.php?id=<?php echo $row['idProgram'] ?>" class="btn btn-warning btn-sm">EDIT</a>&nbsp;
                                  <a href="./program_delete.php?id=<?php echo $row['idProgram'] ?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin ingin menghapus ini?')">DELETE</a>
                                </td>
                              </tr>
                            <?php
                                }
                              }else{
                            ?>
                              <tr>
                                <th colspan="5" class="text-center">Currently there is no record</td>
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
        

