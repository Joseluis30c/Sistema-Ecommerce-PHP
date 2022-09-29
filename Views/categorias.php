<?php 
  require_once("../Template/header_admin.php"); 
  require_once("../Modals/Productos/modalCat.php");
?>
<script>
  function borrarcat(id){
    
    swal({
      title: "Seguro que quieres eliminar esta Categoría?",
      html: "Esta acción no se revertirá",
      type: "question",
      confirmButtonText: "Confirmar",
      showCancelButton: true,
    }).then(function () {
      //wal.fire("Saved!", "", "success");
      window.location.href = "../Crud/Productos/eliCat.php?id="+id;
      
    }, function (dismiss) {
      // dismiss can be "cancel", "overlay",
      // "close", and "timer"
      if (dismiss === "cancel") {
        window.location.href = "categorias.php";
      }
    });
}
</script>
<main class="app-content">
  <div class="app-title">
        <div>
          <h1><i class="fa fa-tasks"></i> Categorías
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalFormCate" ><i class="fa fa-plus-circle"></i> Nuevo</button>
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="categorias.php">Category</a></li>
        </ul>
      </div>
      <?php
include('../conexion/conexion.php');

$sqlCliente   = ("SELECT * FROM categoria");
$queryCliente = mysqli_query($con, $sqlCliente);
?>
      <div class="row">
        <div class="col-md-12">
          <div class="tile"><a href="excel/categorias.php" target="blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> EXCEL</a>&nbsp;<a href="pdf/categoria.php" target="blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
            <div class="tile-body"><br>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Categorías</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        while ($dataCliente = mysqli_fetch_array($queryCliente)) { 
                    ?>
                    <tr>
                      <td><?php echo $dataCliente['id_categoria']; ?></td>
                      <td><?php echo $dataCliente['nombre_cat']; ?></td>
                      <td class="text-center">
                        <a type="button" data-toggle="modal" data-target="#cat<?php echo $dataCliente['id_categoria']; ?>" href="#"><i class="fa fa-pencil-square-o"></i></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" onclick="borrarcat(<?php echo $dataCliente['id_categoria']; ?>)" ><i class="fa fa-trash-o"></i></a>
                      </td>
                    </tr>
                     <?php  include('../Modals/Productos/modalACat.php'); ?>
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
