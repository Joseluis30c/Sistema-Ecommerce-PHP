<?php require_once("../Template/header_admin.php"); require_once("../conexion/conexion.php");?>
<?php

$cli = ("SELECT * FROM usu_cliente");
$resultcli= mysqli_query($con, $cli);
$cantcli = mysqli_num_rows($resultcli);

$usu = ("SELECT * FROM usu_empleado");
$resultusu= mysqli_query($con, $usu);
$cantusu = mysqli_num_rows($resultusu);

$produ = ("SELECT * FROM productos");
$resultpro= mysqli_query($con, $produ);
$cantprodu= mysqli_num_rows($resultpro);

$pedi = ("SELECT * FROM pedidos");
$resultpe= mysqli_query($con, $pedi);
$cantpedi= mysqli_num_rows($resultpe);

$cat = ("SELECT * FROM categoria");
$resultcat= mysqli_query($con, $cat);
$cantcat= mysqli_num_rows($resultcat);

$suma = ("SELECT sum(total) t FROM pedidos");
$rsuma= mysqli_query($con, $suma);
$tsuma =mysqli_fetch_assoc($rsuma);
?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-shopping-bag"></i> <img width="100px" height="35" src="../Assets/home/images/icons/log.png"></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h1 class="text-center">Bienvenido <?php echo $_SESSION['nomb'];?> <?php echo $_SESSION['ape']; ?></h1><br>
            <div class="tile-body">
              <div class="row">
                  <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                      <div class="info">
                        <h4>Usuarios</h4>
                        <p><b><?php echo $cantusu; ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
                      <div class="info">
                        <h4>Clientes</h4>
                        <p><b><?php echo $cantcli; ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <div class="widget-small warning coloured-icon"><i class="icon fa fa-shopping-basket fa-3x"></i>
                      <div class="info">
                        <h4>Productos</h4>
                        <p><b><?php echo $cantprodu; ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-shopping-cart fa-3x"></i>
                      <div class="info">
                        <h4>Pedidos</h4>
                        <p><b><?php echo $cantpedi; ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-tasks fa-3x"></i>
                      <div class="info">
                        <h4>Categorías</h4>
                        <p><b><?php echo $cantcat; ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-usd fa-3x"></i>
                      <div class="info">
                        <h4>Ganancias</h4>
                        <p><b>S/. <?php echo $tsuma['t']; ?> </b></p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php require_once("../Template/footer_admin.php"); ?>