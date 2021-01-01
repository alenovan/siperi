<?php
  require_once '../include/config.php';
  $idGuru   = $_POST["idGuru"];
  $pageGuru = $_POST["pageGuru"];
?>
<div class="row">
  <div class="col-md-12">
    <table class="table table-hover table-striped" style="width: 100%">
      <thead>
          <th class="text-center">No</th>
          <th class="text-center">Mata Pelajaran</th>
          <th>Action</th>
      </thead>
      <tbody>
        <?php
          $sqlSearch = "";
          $per_page = 10;
          $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
          $start = ($page>1) ? ($page * $per_page) - $per_page : 0;
          $result = mysqli_query($con, "SELECT * FROM tb_mapel");
          $total = mysqli_num_rows($result);
          $pages = ceil($total/$per_page);            
          $query = "SELECT * FROM tb_mapel LIMIT $start, $per_page";
          $no =$start+1;
          $sql = mysqli_query($con, $query);
          if ($total > 0){
            while ($row = mysqli_fetch_array($sql)) {
        ?>
          <tr>
            <td class="text-center" style="width: 80px"><?php echo $no++; ?></td>
            <td><?php echo $row["namaMapel"] ?></td>
            <td>
              <a href="javascript:void(0)" onclick="setMapel(1, <?php echo $idGuru ?>, <?php echo $row["idMapel"] ?>, <?php echo $pageGuru ?>)" class="btn btn-warning btn-sm">ADD</a>&nbsp;
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