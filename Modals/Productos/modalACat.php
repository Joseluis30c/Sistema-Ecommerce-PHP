
<!--ventana para Update--->
<div class="modal fade" id="cat<?php echo $dataCliente['id_categoria']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h4 class="modal-title" id="titleModal">Modificar Categoría</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
              <form id="formCat" name="formCat" class="form-horizontal" method="POST" action=".././Crud/Productos/modCat.php">
                <input type="hidden" id="id" name="id" value="<?php echo $dataCliente['id_categoria']; ?>">
                <div class="container">
                  <div class="form-group">
                    <label>Categoría</label>
                    <input class="form-control" id="txtCat" name="txtCat" type="text" value="<?php echo $dataCliente['nombre_cat']; ?>" requerid>
                  </div>
                </div>     
              <div class="tile-footer">
              <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Modificar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!---fin ventana Update --->
