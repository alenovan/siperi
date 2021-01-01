<?php
  session_start();
  $_SESSION["menu"] = "setMapel";
?>
<?php include './include/header.php'; ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4 style="margin-top: 0"><b>LIST GURU</b></h4>
      </div>
    </div>
    <div class="row guruList">
      <?php
        $per_page  = 8;
        $page      = isset($_POST["page"]) ? (int)$_POST["page"] : 1;
        $start     = ($page>1) ? ($page * $per_page) - $per_page : 0;
        $sql    = "SELECT tb_guru.nip, tb_guru.idGuru, tb_guru.namaGuru, tb_guru.foto
                   FROM tb_guru
                   WHERE tb_guru.isActive = 1 ORDER BY tb_guru.namaGuru";
        $totalQ = mysqli_query($con, $sql);
        $total  = mysqli_num_rows($totalQ);
        $pages  = ceil($total/$per_page);
        $query  = mysqli_query($con, $sql." LIMIT $start, $per_page");
        if ($total > 0) {
          while ($row = mysqli_fetch_array($query)) {
            $idGuru = $row["idGuru"];
      ?>
        <div class="col-md-3">
          <div class="card">
            <?php
                if ($row["foto"] == ""){
            ?>
                <img class="card-img-top img-responsive" src="../assets/img/default-avatar.png" style="width: 100%" alt="...">
            <?php

                }else{
            ?>
                <img class="card-img-top img-responsive" src="../assets/img/upload/<?php echo $row["foto"] ?>" style="width: 100%" alt="...">
            <?php
                }
            ?>
            <div class="card-body" style="margin-bottom: 10px;">
              <h5 class="card-title">NIP : <?php echo $row["nip"]; ?></h5>
              <p class="card-text" style="font-size:20px;"><b><?php echo $row["namaGuru"]; ?></b></p>
              Mata Pelajaran : 
              <ul class="list-group list-group-flush">
              <?php
                $sql = mysqli_query($con, "SELECT tb_mapel.namaMapel, tb_mapel.idMapel
                                          FROM tb_mapel
                                          INNER JOIN tb_mapelTmp ON tb_mapel.idMapel = tb_mapelTmp.idMapel AND tb_mapelTmp.idGuru = $idGuru");
                $tot = mysqli_num_rows($sql);
                if ($tot > 0){
                  while ($fetch = mysqli_fetch_array($sql)) {
              ?>
                  <li class="list-group-item"><?php echo $fetch["namaMapel"]; ?> <button onclick="setMapel(2, <?php echo $idGuru ?>, <?php echo $fetch["idMapel"]; ?>)" class="btn btn-danger btn-sm pull-right"><i class="fa fa-minus"></i></button></li>
              <?php
                  }
                }else{
              ?>
                <li class="list-group-item">Tidak ada</li>
              <?php
                }
              ?>
              </ul>
              <br>
              <button onclick="getMapel(<?php echo $idGuru ?>, <?php echo $page ?>)" class="btn btn-info btn-sm pull-right">Tambah Mata Pelajaran</button>
            </div>
          </div>
        </div>
      <?php
          }
      ?>
      <div class="col-md-12">
        <ul class="pagination pagination-sm">
          <?php for ($i=1; $i<=$pages ; $i++){ ?>
            <li class="page-item <?php if($page == $i){ echo 'active'; } ?>"><a class="page-link" href="#" onclick="getGuru(<?php echo $i ?>)"><?php echo $i; ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <?php
        }else{
      ?>
        <div class="col-md-12">
          <center>
            <img src="../assets/img/error.png" style="width: 70%;">
            <h2><b>404</b></h2>
            <h3><b>DATA TIDAK DITEMUKAN</b></h3>
          </center>
        </div>
      <?php
        }
      ?>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mapelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mata Pelajaran List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mapellist">

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function getMapel(idGuru, page) {
    $.ajax({
      url  : "ajax/getMapel.php",
      type : "POST",
      data : {
        'idGuru'   : idGuru,
        'pageGuru' : page
      },
      success:function(html){
        $("#mapelModal").modal("show");
        $(".mapellist").html(html);
      }
    });
  }

  function setMapel(mode, idGuru, idMapel, page) {
    $.ajax({
      url  : "ajax/setMapel.php",
      type : "POST",
      data : {
        'mode'    : mode,
        'idGuru'  : idGuru,
        'idMapel' : idMapel
      },
      success:function(html){
        $("#mapelModal").modal("hide");
        alert(html);
        getGuru(page);
      }
    });
  }

  function getGuru(page) {
    $.ajax({
      url  : "ajax/getGuru.php",
      type : "POST",
      data : {
        'page'    : page,
      },
      success:function(html){
        $(".guruList").html(html);
      }
    });
  }
</script>
<?php include './include/footer.php' ?>
        

