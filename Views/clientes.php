<?php 
  require_once("../Template/header_admin.php"); 
  require_once("../Modals/Cliente/modalCli.php");
  require_once("../conexion/conexion.php");
?>
<script>
  function borrarcli(id){
    
    swal({
      title: "Seguro que quieres eliminar al Cliente?",
      html: "Esta acción no se revertirá",
      type: "question",
      confirmButtonText: "Confirmar",
      showCancelButton: true,
    }).then(function () {
      //wal.fire("Saved!", "", "success");
      window.location.href = "../Crud/Cliente/eliCli.php?id="+id;
      
    }, function (dismiss) {
      // dismiss can be "cancel", "overlay",
      // "close", and "timer"
      if (dismiss === "cancel") {
        window.location.href = "clientes.php";
      }
    });
}
</script>
<?php $sql="SELECT * FROM usu_cliente"; $resultado=mysqli_query($con,$sql); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-circle-o"></i> Cliente
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalFormCli" ><i class="fa fa-plus-circle"></i> Nuevo</button>
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="clientes.php">Customers</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile"><a href="excel/clientes.php" target="blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> EXCEL</a>&nbsp;<a href="pdf/clientes.php"target="blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
            <div class="tile-body"><br>
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead class="text-center">
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>DNI</th>
                      <th>Teléfono</th>
                      <th>Dirección</th>
                      <th>Usuario</th>
                      <th>Contraseña</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($fila=mysqli_fetch_assoc($resultado)){ ?>
                    <tr>
                      <td><?php echo $fila['id_usu_cli']; ?></td>
                      <td><?php echo $fila['nombre_cli']; ?></td>
                      <td><?php echo $fila['apellido_cli']; ?></td>
                      <td><?php echo $fila['dni_cli']; ?></td>
                      <td><?php echo $fila['telefono_cli']; ?></td>
                      <td><?php echo $fila['direccion_cli']; ?></td>
                      <td><?php echo $fila['usuario']; ?></td>
                      <td><?php echo $fila['contra']; ?></td>
                      <td class="text-center">
                        <a type="button" data-toggle="modal" data-target="#modcli<?php echo $fila['id_usu_cli']; ?>" href="#"><i class="fa fa-pencil-square-o"></i></a>
                        &nbsp;&nbsp;/&nbsp;&nbsp;
                        <a href="#" onclick="borrarcli(<?php echo $fila['id_usu_cli']; ?>)"><i class="fa fa-trash-o"></i></a>
                      </td>       
                   </tr>
                   <?php  include('../Modals/Cliente/modalACli.php'); ?>
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