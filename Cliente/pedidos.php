<?php require_once("../Template/header_cliente.php"); 
require_once("../conexion/conexion.php");

?>
<?php 
$id=$_SESSION['id'];
$sql="SELECT * FROM pedidos where id_cli=$id";
$result=mysqli_query($con,$sql);
$num =mysqli_num_rows($result);
?> 
		<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('https://image.shutterstock.com/image-photo/fresh-vegetables-fruits-over-green-260nw-344971007.jpg');">
			<h2 style="color: white;" class="ltext-105 cl0 txt-center">
				Mis Pedidos
			</h2>
		</section>
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<thead >
								<tr class="table_head">
									<th class="text-center">Pedidos</th>
									<th class="text-center">Fecha</th>
									<th class="text-center">Accion</th>
								</tr>
							</thead>
								
							<tbody>
								<?php if ($num){
									  while($fila=mysqli_fetch_assoc($result)){
								 ?>
									<tr class="table_row">
									<td class="text-center">PED00<?php echo $fila['id_ped'];?></td>
									<td class="text-center"><?php echo $fila['fecha'];?></td>
									<td class="text-center">
										<a type="button" data-toggle="modal" data-target="#detcli<?php echo $fila['id_ped']; ?>" href="#"><i class="fa fa-info"></i> Detalles</a>
									</td>
								</tr>							
								<?php include('process/detalle.php');?>
							<?php
						}
							}else{
								echo "<tr class='table_row'><td class='text-center' colspan='3'>No solicitaste ningún pedido</td></tr>";
									
							} ?>
							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php require_once("../Template/footer_cliente.php"); ?>