<script>
  function Imagen(n) {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById('Image' + n).files[0]);
    reader.onload = function (a) {
      document.getElementById('Preview' + n).src = a.target.result;
    };
  }
</script>
<!--ventana para Update--->
<div class="modal fade" id="imagen<?php echo $fila['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h4 class="modal-title" id="titleModal">Modificar Imagen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
              <form id="formCat" name="formCat" class="form-horizontal" method="POST" action=".././Crud/Productos/modImg.php" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value="<?php echo $fila['id_producto']; ?>">
                <div class="container">
                  <div class="form-group">
                    <label>Imagen</label>
                    <input name="imagen" class="form-control" id="Image<?php echo $fila['id_producto']; ?>" type="file" onchange="Imagen(<?php echo $fila['id_producto']; ?>);" requerid accept="image/*">
                    <div align="center"><img id="Preview<?php echo $fila['id_producto']; ?>" width="100" height="100" src="https://ru.seaicons.com/wp-content/uploads/2015/06/Preview-icon1.png"></div>
                  </div>

                </div>     
              <div class="tile-footer">
              <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Cambiar Imagen</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!---fin ventana Update --->
