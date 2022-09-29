    <!-- Essential javascripts for application to work-->
    <script src="../Assets/js/jquery-3.3.1.min.js"></script>
    <script src="../Assets/js/popper.min.js"></script>
    <script src="../Assets/js/bootstrap.min.js"></script>
    <script src="../Assets/js/main.js"></script>


    <!-- The javascript plugin to display page loading on top-->
    <script src="../Assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->

      <!-- Data table plugin-->
    <script type="text/javascript" src="../Assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../Assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script>
  function previewImage(nb) {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
    reader.onload = function (e) {
      document.getElementById('uploadPreview' + nb).src = e.target.result;
    };
  }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
  </body>
</html>