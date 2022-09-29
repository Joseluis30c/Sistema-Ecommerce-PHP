<?php 
$idd=$fila['id_categoria'];
$query = "SELECT * FROM categoria where id_categoria!=$idd order by nombre_cat";
  $r=mysqli_query($con,$query); ?>
<!-- modal-->
<style>
  .notItemOne option:first-child{
    display: none;
  }
</style>
<div class="modal fade" id="produ<?php echo $fila['id_producto']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h4 class="modal-title" id="titleModal">Actualizar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form id="formProdu" name="formProdu" class="form-horizontal" action=".././Crud/Productos/modProdu.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value="<?php echo $fila['id_producto']; ?>">
                <p class="text-primary text-center">Todos los campos son obligatorios!</p><hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Producto</label>
                    <input class="form-control" id="txtProdu" name="txtProdu" type="text" value="<?php echo $fila['nombre_produ']; ?>" requerid>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Imagen</label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Detalle</label>
                    <textarea class="form-control" id="txtDetalle" rows="3" name="txtDetalle" type="text" requerid ><?php echo $fila['detalle']; ?></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <div align="center"><?php
                        echo '<img width="100" heigth="100" src="data:image/jpeg;base64,'.base64_encode($fila['img_produ']).'"/>';
                        ?>
                          
                        </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Precio</label>
                    <input class="form-control" id="txtPrecio" name="txtPrecio" type="text" value="<?php echo $fila['precio_produ']; ?>" requerid>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Categoría</label>
                   <select name="idcat" class="form-control" class="notItemOne" requerid>
                    <option value="<?php echo $fila['id_categoria']; ?>" selected><?php echo $fila['nombre_cat']; ?></option>
                    <?php while($row = $r->fetch_assoc()) { ?>
                      <option value="<?php echo $row['id_categoria']; ?>"><?php echo $row['nombre_cat']; ?></option>
                    <?php } ?>
                  </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Cantidad</label>
                   <input class="form-control" id="txtStock" name="txtStock" type="text" value="<?php echo $fila['stock']; ?>" requerid>
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
