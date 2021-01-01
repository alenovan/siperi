<?php
  require_once '../include/config.php';
  $idKelas   = $_POST["idKelas"];
?>
<div class="row">
  <div class="col-md-12">
    <table class="table table-hover table-striped" style="width: 100%">
      <thead>
          <th class="text-center">No</th>
          <th class="text-center">NIP</th>
          <th>Nama</th>
          <th>Action</th>
      </thead>
      <tbody>
        <?php
          $per_page   = 5;
          $page       = isset($_POST["page"]) ? (int)$_POST["page"] : 1;
          $start      = ($page>1) ? ($page * $per_page) - $per_page : 0;
          $result     = mysqli_query($con, "SELECT * FROM tb_guru WHERE isActive = 1");
          $total      = mysqli_num_rows($result);
          $pages      = ceil($total/$per_page);            
          $query      = "SELECT * FROM tb_guru WHERE isActive = 1 LIMIT $start, $per_page";
          $no =$start+1;
          $sql = mysqli_query($con, $query);
          if ($total > 0){
            while ($row = mysqli_fetch_array($sql)) {
        ?>
          <tr>
            <td class="text-center" style="width: 80px"><?php echo $no++; ?></td>
            <td class="text-center" style="width: 100px;"><?php echo $row["nip"] ?></td>
            <td><?php echo $row["namaGuru"] ?></td>
            <td>
              <button class="btn btn-warning btn-sm" onclick="setGuru(1, <?php echo $idKelas; ?>, <?php echo $row["idGuru"]; ?>)">ADD</button>&nbsp;
            </td>
          </tr>
        <?php
            }
          }else{
        ?>
          <tr>
            <th colspan="4" class="text-center">Currently there is no record</td>
          </tr>
        <?php
          }
        ?>
      </tbody>
    </table>    
    <div class="col-md-12">
      <ul class="pagination pagination-sm">
        <?php for ($i=1; $i<=$pages ; $i++){ ?>
          <li class="page-item <?php if($page == $i){ echo 'active'; } ?>"><button class="page-link" onclick="getGuru(<?php echo $idKelas ?>, <?php echo $i; ?>)"><?php echo $i; ?></button></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>