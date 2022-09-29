<?php require_once("../Template/header_cliente.php");
require_once("../conexion/conexion.php"); ?>
<br>

<?php if(isset($_POST["add_to_cart"]))
{

if(isset($_SESSION["shopping_cart"]))
{
$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["shopping_cart"]);
$item_array = array(
'item_id' => $_GET["id"],
'item_name' => $_POST["hidden_name"],
'item_price' => $_POST["hidden_price"],
'item_quantity' => $_POST["cantidad"]
);
$_SESSION["shopping_cart"][$count] = $item_array;

}
else
{

echo '<script>
    swal({
      title: "Producto ya agregado",
      html: "Elimina el producto si ya no lo deseas",
      type: "error",
      confirmButtonText: "Ver",
      showCancelButton: true,
    }).then(function () {
      window.location.href = "carrito.php";
    }, function (dismiss) {
      if (dismiss === "cancel") {
        window.location.href = "index.php#produc";
      }
    });
    </script>';
}
}
else
{
$item_array = array(
'item_id' => $_GET["id"],
'item_name' => $_POST["hidden_name"],
'item_price' => $_POST["hidden_price"],
'item_quantity' => $_POST["cantidad"]
);
$_SESSION["shopping_cart"][0] = $item_array;
}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["shopping_cart"] as $keys => $values)
{
if($values["item_id"] == $_GET["id"])
{
unset($_SESSION["shopping_cart"][$keys]);
echo '<script>
    swal({
      title: "Producto Eliminado",
      type: "success",
      confirmButtonText: "OK",
    }).then(function () {
    }, function (dismiss) {
      if (dismiss === "cancel") {
      }
    });
    </script>';
}
}
}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "vaciar")
{
foreach($_SESSION["shopping_cart"] as $keys => $values)
{
if($values["item_id"])
{
unset($_SESSION["shopping_cart"][$keys]);

echo '<script>
    swal({
      title: "Solicitud de tu pedido exitosa",
      type: "success",
      confirmButtonText: "OK",
    }).then(function () {
      window.location.href = "carrito.php";
    }, function (dismiss) {
      if (dismiss === "cancel") {
      }
    });
    </script>';
}
}
}
} ?>

<script>
	function borrar(idd){
		
    swal({
      title: "Seguro que quieres eliminar este producto?",
      html: "Esta acción no se revertirá",
      type: "warning",
      confirmButtonText: "Confirmar",
      showCancelButton: true,
    }).then(function () {
    	//wal.fire("Saved!", "", "success");
    	window.location.href = "carrito.php?action=delete&id="+idd;
      
    }, function (dismiss) {
      // dismiss can be "cancel", "overlay",
      // "close", and "timer"
      if (dismiss === "cancel") {
        window.location.href = "carrito.php";
      }
    });
}
</script>
<!-- Shoping Cart -->
<div class="container">
<form method="POST" action="process/carrito.php" class="bg0 p-t-75 p-b-85">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<a class="btn btn-dark" href="index.php#produc">Seguir Comprando</a><br><br>
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="text-center">COD</th>
									<th class="text-center">Producto</th>
									<th  class="text-center">Precio</th>
									<th  class="text-center">Cantidad</th>
									<th  class="text-center">Total</th>
									<th class="text-center" >Accion</th>
								</tr>
								<?php
									if(!empty($_SESSION["shopping_cart"]))
									{
									$total = 0;
									
									
									foreach($_SESSION["shopping_cart"] as $keys => $values)
									{
									?>
                           		<tr id="car" class="table_row">
                           			<td  class="text-center"><?php echo $values["item_id"]; ?></td>
									<td style="max-width:230px; overflow: hidden;white-space: nowrap;
  										text-overflow: ellipsis;"><?php echo $values["item_name"]; ?></td>
									<td class="text-center">S/. <?php echo number_format($values["item_price"], 2); ?></td>
									<td class="text-center"><?php echo $values["item_quantity"]; ?></td>

									<td  class="text-center">S/. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>

									<td  class="text-center">
                                        <a href="#" onclick="borrar(<?php echo $values['item_id'];?>)"><i class="fa fa-trash-o"></i></a>

                                    </td>
								</tr>
								<?php
									$total = $total + ($values["item_quantity"] * $values["item_price"]);
									$total2=$total;
									}
									?>
							</table>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Total Carrito
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Total:
								</span>
							</div>
							<div class="size-209">
								<input type="hidden" id="totalp" name="totalp" value="<?php echo number_format($total2, 2); ?>">
								<span class="mtext-110 cl2">
									S/. <?php echo number_format($total2, 2); ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Datos: 
									</span><br><br>
									<div class="bor8 bg0 m-b-12">
										<input type="hidden" name="nombre" value="<?php echo $_SESSION['id']; ?>">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" value="<?php echo $_SESSION['nomb']; ?> <?php echo $_SESSION['ape']; ?>" readonly>
									</div>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" value="<?php echo $_SESSION['tel']; ?>" readonly>
									</div>

									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" value="<?php echo $_SESSION['dir']; ?>" required>
									</div>
								</div>
							</div><br>
							
							<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Solicitar Pedido
						</button>
						
						</div><?php
								}else{
									echo "<tr class='table_row'><td class='text-center' colspan='6'>Carrito Vacío</td></tr>";
								}
								?>
					</div>
				</div>
		</div>
	</form>
</div>

<script src="../Assets/home/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="../Assets/home/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="../Assets/home/vendor/bootstrap/js/popper.js"></script>
    <script src="../Assets/home/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="../Assets/home/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
<!--===============================================================================================-->
    <script src="../Assets/home/vendor/daterangepicker/moment.min.js"></script>
    <script src="../Assets/home/vendor/daterangepicker/daterangepicker.js"></script>
<!--==============================================================================================-->
    <script src="../Assets/home/vendor/slick/slick.min.js"></script>

    <script src="../Assets/home/js/slick-custom.js"></script>
<!--===============================================================================================-->
    <script src="../Assets/home/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
<!--===============================================================================================-->
    <script src="../Assets/home/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled:true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
<!--===============================================================================================-->
    <script src="../Assets/home/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
    <script src="../Assets/home/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e){
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function(){
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    
    </script>
<!--===============================================================================================-->
    <script src="../Assets/home/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){
                ps.update();
            })
        });
    </script>
<!--===============================================================================================-->
    <script src="../Assets/home/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>