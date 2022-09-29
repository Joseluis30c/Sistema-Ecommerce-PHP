 <?php require_once("conexion/conexion.php") ?>
 <?php 

$sql1="SELECT * FROM categoria ORDER BY nombre_cat"; 
$resul=mysqli_query($con,$sql1); 

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $pro="SELECT * FROM productos p INNER JOIN categoria c on p.id_categoria=c.id_categoria where c.id_categoria=$id and p.stock>0";
    $res=mysqli_query($con,$pro);
}else{
    $pro="SELECT * FROM productos p INNER JOIN categoria c on p.id_categoria=c.id_categoria and p.stock>0" ;
    $res=mysqli_query($con,$pro);
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="Assets/home/images/icons/c.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/slick/slick.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/css/util.css">
    <link rel="stylesheet" type="text/css" href="Assets/home/css/main.css">
<!--===============================================================================================-->
<script>
function buscar() {
    var textoBusqueda = $("input#busqueda").val();
 
     if (textoBusqueda != "") {
        $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
            
         }); 
     } ;};
</script>
</head>
<body class="animsition">
    
    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        <i class="fa fa-phone"> +51 999 999 999</i>
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="index.php" class="flex-c-m trans-04 p-lr-25">
                            Home
                        </a>
                        <a href="admin.php" class="flex-c-m trans-04 p-lr-25">
                            Administración
                        </a>
                        <a href="about.php" class="flex-c-m trans-04 p-lr-25">
                           About
                        </a>
                        <a class="flex-c-m trans-04 p-lr-25">
                           
                        </a>
                        <a href="index.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-shopping-cart"> Mi carrito</i>
                        </a>

                        <a href="login.php" class="flex-c-m trans-04 p-lr-25">
                            Iniciar Sesión
                        </a>
                
                        <a href="registrarcli.php" class="flex-c-m trans-04 p-lr-25">
                            Registrarse
                        </a>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->       
                    <a href="index.php" class="logo">
                        <img src="Assets/home/images/icons/log.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop --> 

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="0">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>
                </nav>
            </div>  
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="index.php"><img src="Assets/home/images/icons/log.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="0">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        <i class="fa fa-phone"> +51 999 999 999</i>
                    </div>
                </li>

                <li>
                    <div class="right-top-bar flex-w h-full">
                        <a href="admin.php" class="flex-c-m trans-04 p-lr-25">
                            Administración
                        </a>
                        <a href="about.php" class="flex-c-m trans-04 p-lr-25">
                           About
                        </a>
                        <a href="index.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-shopping-cart"> Mi carrito</i>
                        </a>

                        <a href="login.php" class="flex-c-m trans-04 p-lr-25">
                            Iniciar Sesión
                        </a>
                
                        <a href="registrarcli.php" class="flex-c-m trans-04 p-lr-25">
                            Registrarse
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Tu carrito
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>
            
            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                </ul>
                    <div class="header-cart-total w-full p-tb-40">
                    No hay productos añadidos
                    </div>
                    <div class="header-cart-buttons flex-w js-pscroll ">
                        
                        <a href="#" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Comprar
                        </a>
                    </div>
            </div>
        </div>
    </div>

        

    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(Assets/home/images/slider1.jpg);">
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
                                <a href="#product" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Compra Ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(Assets/home/images/slider2.jpg);">
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
                                <a href="#product" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Comprar Ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(Assets/home/images/slider3.jpg);">
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
                                <a href="#product" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Comprar Ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<section class="bg0 p-t-23 p-b-140">
        <div id="product" class="container">
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
                            <i class="zmdi zmdi-search"></i>
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
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img_produ']).'"/>';?>

                            <a href="detail_producto.php?id=<?php echo $row['id_producto']; ?>&cat=<?php echo $row['nombre_cat']; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                Ver Producto
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="detail_producto.php?id=<?php echo $row['id_producto']; ?>&cat=<?php echo $row['nombre_cat']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?php echo $row['nombre_produ']; ?>
                                </a>
 
                                <span class="stext-105 cl3">
                                    S/. <?php echo $row['precio_produ']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Ayuda
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Devoluciones
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Transporte
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Preguntas
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Contacto
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        ¿Alguna pregunta? Háganos saber en la tienda (Direccion de la tienda) o llámenos al +51 999 999 999 
                    </p>

                    <div class="p-t-27">
                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>

            </div>

            <div class="p-t-40">

                <p class="stext-107 cl6 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tienda Online | To' Eat | Jose Luis

                </p>
            </div>
        </div>
    </footer>

<!--===============================================================================================-->  
    <script src="Assets/home/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="Assets/home/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="Assets/home/vendor/bootstrap/js/popper.js"></script>
    <script src="Assets/home/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="Assets/home/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
<!--===============================================================================================-->
    <script src="Assets/home/vendor/daterangepicker/moment.min.js"></script>
    <script src="Assets/home/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="Assets/home/vendor/slick/slick.min.js"></script>
    <script src="Assets/home/js/slick-custom.js"></script>
<!--===============================================================================================-->
    <script src="Assets/home/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
<!--===============================================================================================-->
    <script src="Assets/home/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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
    <script src="Assets/home/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
    <script src="Assets/home/vendor/sweetalert/sweetalert.min.js"></script>
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
    <script src="Assets/home/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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
    <script src="Assets/home/js/main.js"></script>

</body>
</html>