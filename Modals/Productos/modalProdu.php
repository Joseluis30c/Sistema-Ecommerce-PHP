<?php 
require_once("../conexion/conexion.php");
  
  $query = "SELECT * FROM categoria ORDER BY nombre_cat";
  $resultado=mysqli_query($con,$query);
?>
 

<div class="modal fade" id="modalFormProdu" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h4 class="modal-title" id="titleModal">Nuevo Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form id="formProdu" name="formProdu" class="form-horizontal" action=".././Crud/Productos/insertProdu.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="idPro" name="idPro" value="">
                <p class="text-primary text-center">Todos los campos son obligatorios!</p><hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Producto</label>
                    <input class="form-control" id="txtProdu" name="txtProdu" type="text" placeholder="Name Product" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Imagen</label>
                    <input name="image" class="form-control" id="uploadImage1" type="file" onchange="previewImage(1);" required accept="image/*">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Detalle</label>
                    <textarea class="form-control" id="txtDetalle" rows="3" name="txtDetalle" type="text" placeholder="Enter details"></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <div align="center"><img id="uploadPreview1" width="100" height="100" src="https://ru.seaicons.com/wp-content/uploads/2015/06/Preview-icon1.png"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Precio</label>
                    <input class="form-control" id="txtPrecio" name="txtPrecio" type="text" placeholder="Enter Price" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Categoría</label>
                   <select name="idcat" class="form-control" required>
                    <option value="0">Seleccionar Categoría</option>
                    <?php while($row = $resultado->fetch_assoc()) { ?>
                      <option value="<?php echo $row['id_categoria']; ?>"><?php echo $row['nombre_cat']; ?></option>
                    <?php } ?>
                  </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Cantidad</label>
                   <input class="form-control" id="txtStock" name="txtStock" type="text" placeholder="Enter Stock" required>
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
