<?php require_once("../Template/header_cliente.php"); ?>
 <?php require_once("../conexion/conexion.php") ?>
 <?php 
$sql1="SELECT * FROM categoria ORDER BY nombre_cat"; 
$resul=mysqli_query($con,$sql1); 

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $pro="SELECT * FROM productos p INNER JOIN categoria c on p.id_categoria=c.id_categoria where c.id_categoria=$id and p.stock>0";
    $res=mysqli_query($con,$pro);
}else{
    $pro="SELECT * FROM productos p INNER JOIN categoria c on p.id_categoria=c.id_categoria and p.stock>0";
    $res=mysqli_query($con,$pro);
}
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function buscar() {
    var textoBusqueda = $("input#busqueda").val();
 
     if (textoBusqueda != "") {
        $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
            
         }); 
     } ;};
</script>
        <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(../Assets/home/images/slider1.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    La mejor bebida para las mejores personas
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    AGUAS Y BEBIDAS
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="#produc" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Compra Ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(../Assets/home/images/slider2.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Come mejor para sentirte mejor
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    FRUTAS Y VERDURAS
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="#produc" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Comprar Ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(../Assets/home/images/slider3.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Aliméntate con lo mejor
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    ABARROTES
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="#produc" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Comprar Ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div id="produc" class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Productos
                </h3> 

            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <a href="index.php?#resultadoBusqueda" type="button" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                        Todos
                    </a>
                    <?php while ($row=mysqli_fetch_array($resul)) {
                        $id=$row['id_categoria'];
                        ?>
                    <a href="index.php?id=<?php echo $id;?>&#resultadoBusqueda" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                       <?php echo $row['nombre_cat']; ?>
                    </a>
                <?php } ?>
                </div>

                <div class="flex-w flex-c-m m-tb-10">

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>
                
                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="fa fa-shopping-cart"></i>
                        </button>

                        <form accept-charset="utf-8" method="POST">
                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="busqueda" id="busqueda" value="" maxlength="40" autocomplete="off" placeholder="Search" onKeyUp="buscar();">
                        </form>
                    </div>  
                </div>
            </div>
            <div  id="resultadoBusqueda" class="row isotope-grid">
            <?php while ($row=mysqli_fetch_array($res)) {?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                    <!-- Block2 -->
                    <form action="carrito.php?action=add&id=<?php echo $row["id_producto"]; ?>" method="POST">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <?php echo '<img name"img" src="data:image/jpeg;base64,'.base64_encode($row['img_produ']).'"/>';
                            ?>
                            
                            <a type="button" data-toggle="modal" data-target="#detail<?php echo $row['id_producto']; ?>" href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                Ver Producto
                            </a>
                            <?php  include('detail_product.php'); ?>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                
                                <a type="button" data-toggle="modal" data-target="#detail<?php echo $row['id_producto']; ?>" href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?php echo $row['nombre_produ']; ?>
                                </a><br>
 
                                <span class="stext-105 cl3">
                                    S/. <?php echo number_format($row['precio_produ'],2); ?>
                                </span><br>
                                <input class="form-control" type="number" value="1" min="1" max="<?php echo $row['stock']; ?>" name="cantidad"><button name="add_to_cart" class="btn btn-dark form-control"><i class="fa fa-shopping-cart"> Agregar</i></button>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["nombre_produ"]; ?>" />
                                <input type="hidden" name="hidden_price" value="<?php echo $row["precio_produ"]; ?>" />


                            </div>    
                        </div>
                    </div>
                </form>
                </div>

            <?php } ?>
            </div>
        </div>
        </div>
    </section>
<?php require_once("../Template/footer_cliente.php"); ?>