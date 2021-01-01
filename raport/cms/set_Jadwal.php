<?php
  session_start();
  $_SESSION["menu"] = "setJadwal";
  $key = "";
  if (isset($_GET["key"]) != ""){
    $key = $_GET["key"];
  }
?>
<?php include './include/header.php'; ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="kelas" id="kelas">
              <option value="">---select---</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Bidang</label>
          <select class="form-control" name="bidang" id="bidang" onchange="getProgram()">
              <option value="">---select---</option>
              <?php
                  $result = mysqli_query($con, "SELECT * FROM tb_bidang");
                  while ($row = mysqli_fetch_array($result)) {
              ?>
                  <option value="<?php echo $row["idBidang"] ?>"><?php echo $row["namaBidang"] ?> (<?php echo $row["kodeBidang"] ?>)</option>
              <?php
                  }
              ?>
          </select>
        </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label>Program</label>
              <select class="form-control" name="program" id="program">
                  <option value="">---select---</option>
              </select>
          </div>
      </div>
      <div class="col-md-2">
          <div class="form-group" style="margin-top: 30px;">
              <button class="btn btn-primary" onclick="getKelas();">SEARCH</button>
          </div>
      </div>
    </div>
    <br>
    <div class="row kelasShow">
      <div class="col-md-12">
        <center>
          <img src="../assets/img/error.png" style="width: 70%;">
          <h2><b>404</b></h2>
          <h3><b>DATA TIDAK DITEMUKAN</b></h3>
        </center>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="guruModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Guru List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body gurulist">

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function getKelas() {
    $kelas    = $("#kelas").val();
    $bidang   = $("#bidang").val();
    $program  = $("#program").val();

    if ($kelas == ""){
      alert("Silahkan pilih kelas terlebih dahulu");
      return false;
    }

    if ($bidang == ""){
      alert("Silahkan pilih bidang keahlian terlebih dahulu");
      return false;
    }

    if ($program == ""){
      alert("Silahkan pilih program keahlian terlebih dahulu");
      return false;
    }

    $.ajax({
      url  : "ajax/getKelas.php",
      type : "POST",
      data : {
        'kelas'   : $kelas,
        'bidang'  : $bidang,
        'program' : $program
      },
      success:function(html){
        $(".kelasShow").html(html);
      }
    });
  }
</script>
<?php include './include/footer.php' ?>
        

