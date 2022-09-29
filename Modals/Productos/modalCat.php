<!-- Modal -->
<div class="modal fade" id="modalFormCate" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h4 class="modal-title" id="titleModal">Nueva Categoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
              <form id="formCate" name="formCate" class="form-horizontal" method="POST" action=".././Crud/Productos/insertCat.php">
                <input type="hidden" id="idcate" name="idcate" value="">
                <div class="container">
                  <div class="form-group">
                    <label>Categoría</label>
                    <input class="form-control" id="txtCat" name="txtCat" type="text" placeholder="Name Category" requerid>
                  </div>
                </div>     
              <div class="tile-footer">
              <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>