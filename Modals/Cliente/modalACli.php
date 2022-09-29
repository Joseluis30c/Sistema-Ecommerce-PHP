<!-- Modal -->
<div class="modal fade" id="modcli<?php echo $fila['id_usu_cli']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h4 class="modal-title" id="titleModal">Modificar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form id="formUsuario" name="formUsuario" class="form-horizontal" method="POST" action=".././Crud/Cliente/modCli.php">
                <input type="hidden" id="id" name="id" value="<?php echo $fila['id_usu_cli']; ?>">
                <p class="text-primary text-center">Todos los campos son obligatorios!</p><hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Nombre</label>
                    <input class="form-control" id="txtNombre" name="txtNombre" type="text" value="<?php echo $fila['nombre_cli']; ?>" requerid>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Apellido</label>
                    <input class="form-control" id="txtApellido" name="txtApellido" type="text" value="<?php echo $fila['apellido_cli']; ?>" requerid>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">DNI</label>
                    <input class="form-control" id="txtDni" name="txtDni" type="text" value="<?php echo $fila['dni_cli']; ?>" requerid>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Teléfono</label>
                    <input class="form-control" id="txtTelefono" name="txtTelefono" type="text" value="<?php echo $fila['telefono_cli']; ?>" requerid>
                  </div><hr>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Dirección</label>
                    <input class="form-control" id="txtDir" name="txtDir" type="text" value="<?php echo $fila['direccion_cli']; ?>" requerid>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Correo</label>
                    <input class="form-control" id="txtUser" name="txtUser" type="email" value="<?php echo $fila['usuario']; ?>" requerid>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Contraseña</label>
                    <input class="form-control" id="txtContraseña" name="txtContraseña" type="password" value="<?php echo $fila['contra']; ?>" requerid>
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