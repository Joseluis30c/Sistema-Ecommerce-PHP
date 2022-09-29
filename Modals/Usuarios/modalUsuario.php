<?php 
require_once("../conexion/conexion.php");
  
  $query = "SELECT id_tipousu, nombre_usu FROM tipo_usuario";
  $resultado=mysqli_query($con,$query);
?>
<!-- modal-->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h4 class="modal-title" id="titleModal">Nuevo Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form id="formUsuario" name="formUsuario" class="form-horizontal" method="POST" action=".././Crud/Usuarios/insertUsuario.php">
                <input type="hidden" id="idUsuario" name="idUsuario" value="">
                <p class="text-primary text-center">Todos los campos son obligatorios!</p><hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Nombre</label>
                    <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Name person" requerid>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Apellido</label>
                    <input class="form-control" id="txtApellido" name="txtApellido" type="text" placeholder="Last name person" requerid>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">DNI</label>
                    <input class="form-control" id="txtDni" name="txtDni" type="text" placeholder="Enter Dni" requerid>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Teléfono</label>
                    <input class="form-control" id="txtTelefono" name="txtTelefono" type="text" placeholder="Enter phone number" requerid>
                  </div>
                </div><hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Correo</label>
                    <input class="form-control" id="txtUser" name="txtUser" type="email" placeholder="Enter Email" requerid>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Contraseña</label>
                    <input class="form-control" id="txtContraseña" name="txtContraseña" type="password" placeholder="Enter password" requerid>
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Tipo Usuario</label>
                   <select name="txtRol" class="form-control" requerid>
                    <option value="0">Seleccionar...</option>
                    <?php while($row = $resultado->fetch_assoc()) { ?>
                      <option value="<?php echo $row['id_tipousu']; ?>"><?php echo $row['nombre_usu']; ?></option>
                    <?php } ?>
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Estado</label>
                    <select class="form-control" id="listaEstado" name="Estado" requerid>
                      <option value="Activo">Activo</option>
                      <option value="Inactivo">Inactivo</option>
                    </select>
                  </div>
                </div><hr>    
              <div class="tile-footer">
              <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </div>
            </form>
      </div>
    </div>
  </div>
</div> 
