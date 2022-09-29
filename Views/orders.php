<?php 
  require_once("../Template/header_admin.php");
  require_once("../conexion/conexion.php");
?>
<?php $pedido="SELECT * FROM pedidos p INNER JOIN usu_cliente c on p.id_cli=c.id_usu_cli"; $resultado=mysqli_query($con,$pedido); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-archive"></i> Pedidos
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile"><a href="excel/orders.php" target="blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> EXCEL</a>&nbsp;<a href="pdf/orders.php" target="blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
            <div class="tile-body"><br>
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead class="text-center">
                    <tr>
                      <th>ID</th>
                      <th>Fecha</th>
                      <th>Cliente</th>
                      <th>Total</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($fila=mysqli_fetch_assoc($resultado)){ ?>
                    <tr class="text-center">
                      <td><?php echo $fila['id_ped']; ?></td>
                      <td><?php echo $fila['fecha']; ?></td>
                      <td><?php echo $fila['nombre_cli']?> <?php echo $fila['apellido_cli']; ?></td>
                      <td><?php echo "S/. ".number_format($fila['total'],2,".",","); ?></td>
                      <td class="text-center">
                      	<a type="button" data-toggle="modal" data-target="#detalles<?php echo $fila['id_ped']; ?>" href="#"><i class="fa fa-info"></i> Detalles</a>
                      </td>       
                   </tr>
                   <?php include("../Modals/Cliente/modalOrder.php") ?>
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