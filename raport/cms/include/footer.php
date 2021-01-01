            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter-square"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-pinterest-square"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="#">Arsip</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
</body>
    <script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/bootstrap-switch.js"></script>
    <script src="../assets/js/plugins/chartist.min.js"></script>
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <script src="../assets/js/ckeditor.js"></script>
    <script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
    <script src="../assets/js/demo.js"></script>
    <script src="../assets/evo-calendar/js/evo-calendar.js"></script>
    <script src="../assets/js/style.js"></script>
    <script type="text/javascript">
      <?php if ($_SESSION["menu"] == "setKelas"){ ?>
        function disableF5(e) { if ((e.which || e.keyCode) == 116 || ((e.which || e.keyCode) == 82)) e.preventDefault(); };
        $(document).on("keydown", disableF5);
      <?php } ?>

        $(".alertFile").hide();
        function goUpload() {
            var formData = new FormData($('#Myform')[0]);
            $.ajax({
               url: 'ajax/upload_image.php',
               data: formData,
               async: false,
               contentType: false,
               processData: false,
               cache: false,
               type: 'POST',
               success: function(data)
               {
                  if (data.indexOf('Error') == -1) {
                    $('.imgShow').empty();
                    $('.imgShow').html("<img class='img-responsive' src='../assets/img/upload/" + data + "' style='width: 50%' alt='...'>");
                    $('#imageInput').val(data);
                  }else{
                    $(".alertFile").show();
                    $(".alertFile").html("<i class='fa fa-warning'></i> " + data);
                  }
               },
            });    
            return false; 
        }

        function goUploadFile() {
            var formData = new FormData($('#Myform')[0]);
            $.ajax({
               url: 'ajax/upload_file.php',
               data: formData,
               async: false,
               contentType: false,
               processData: false,
               cache: false,
               type: 'POST',
               success: function(data)
               {
                  if (data.indexOf('Error') == -1) {
                    $('#fileInput').val(data);
                  }else{
                    $(".alertFile").show();
                    $(".alertFile").html("<i class='fa fa-warning'></i> " + data);
                  }
               },
            });    
            return false; 
        }
    </script>
</html>

