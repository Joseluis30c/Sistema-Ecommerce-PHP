<?php 
  require_once("../Template/header_admin.php"); 
  require_once("../Modals/Productos/modalProdu.php");
  require_once("../conexion/conexion.php");
?>
<script>
  function borrarpro(id){
    
    swal({
      title: "Seguro que quieres eliminar el Producto?",
      html: "Esta acción no se revertirá",
      type: "question",
      confirmButtonText: "Confirmar",
      showCancelButton: true,
    }).then(function () {
      //wal.fire("Saved!", "", "success");
      window.location.href = "../Crud/Productos/eliProdu.php?id="+id;
      
    }, function (dismiss) {
      // dismiss can be "cancel", "overlay",
      // "close", and "timer"
      if (dismiss === "cancel") {
        window.location.href = "productos.php";
      }
    });
}
</script>
<?php $sql="SELECT * FROM productos p INNER JOIN categoria c on p.id_categoria=c.id_categoria"; $resultado=mysqli_query($con,$sql); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-shopping-basket"></i> Productos
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalFormProdu" ><i class="fa fa-plus-circle"></i> Nuevo</button>
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="productos.php">Products</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile"><a href="excel/productos.php" target="blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> EXCEL</a>&nbsp;<a href="pdf/productos.php" target="blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
            <div class="tile-body"><br>
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead class="text-center">
                    <tr>
                      <th>ID</th>
                      <th>Producto</th>
                      <th>Descripción</th>
                      <th>Imagen</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Categoría</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($fila=mysqli_fetch_assoc($resultado)){ ?>
                    <tr >
                      <td><?php echo $fila['id_producto']; ?></td>
                      <td style="max-width:230px; overflow: hidden;white-space: nowrap;
                        text-overflow: ellipsis;"><?php echo $fila['nombre_produ']; ?></td>
                      <td style="max-width:230px; overflow: hidden;white-space: nowrap;
                        text-overflow: ellipsis;"><?php echo $fila['detalle']; ?></td>
                      <td class="text-center">
                        <?php
                        echo '<img width="80" heigth="80" src="data:image/jpeg;base64,'.base64_encode($fila['img_produ']).'"/>';
                        ?>
                      </td>
                      <td>S/. <?php echo $fila['precio_produ']; ?></td>
                      <td class="text-center"><?php echo $fila['stock']; ?></td>
                      <td><?php echo $fila['nombre_cat']; ?></td>
                      <td class="text-center">
                        <a type="button" data-toggle="modal" data-target="#imagen<?php echo $fila['id_producto']; ?>" href="#"><i class="fa fa-picture-o"></i></a>
                        &nbsp;&nbsp;/&nbsp;&nbsp;
                        <a type="button" data-toggle="modal" data-target="#produ<?php echo $fila['id_producto']; ?>" href="#"><i class="fa fa-pencil-square-o"></i></a>
                        &nbsp;&nbsp;/&nbsp;&nbsp;
                        <a href="#" onclick="borrarpro(<?php echo $fila['id_producto']; ?>)"><i class="fa fa-trash-o"></i></a>
                      </td>
                    </tr>
                    <?php include("../Modals/Productos/modalAProdu.php"); ?>
                    <?php include("../Modals/Productos/modalImg.php"); ?>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php require_once("../Template/footer_admin.php"); ?>