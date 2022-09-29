
<?php require_once("conexion/conexion.php") ?>
<?php 
$id=$_GET['id'];
$cat=$_GET['cat']; 
$sql="SELECT * FROM productos p INNER JOIN categoria c on p.id_categoria=c.id_categoria where id_producto='$id'"; 
$resultado=mysqli_query($con,$sql);

$sql2="SELECT * FROM productos p INNER JOIN categoria c on p.id_categoria=c.id_categoria where id_producto!='$id' and nombre_cat='$cat'"; 
$res=mysqli_query($con,$sql2); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Detalle del Producto</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================--> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
<link rel="icon" type="image/png" href="Assets/home/images/icons/c.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="Assets/home/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="Assets/home/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="Assets/home/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="Assets/home/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--==============================================================================================-->
<link rel="stylesheet" type="text/css" href="Assets/home/vendor/animate/animate.css">
<!--===============================================================================================-->  
<link rel="stylesheet" type="text/css" href="Assets/home/vendor/css-hamburgers/hamburgers.min.css">
<!--==============================================================================================-->
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


<br><br><br>

<!-- breadcrumb -->
<?php foreach ($resultado as $row) {?>
<div class="container">
<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
    <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
        Home
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <a href="#" class="stext-109 cl8 hov-cl1 trans-04">
        <?php echo $row['nombre_cat']; ?>
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <span class="stext-109 cl4">
        <?php echo $row['nombre_produ']; ?>
    </span>
</div>
</div>

<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-7 p-b-30">
            <div class="p-l-25 p-r-30 p-lr-0-lg">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>
                    <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                    <div class="slick3 gallery-lb">

                        <div class="item-slick3"                    <?php
                                echo 'data-thumb="data:image/jpeg;base64,'.base64_encode($row['img_produ']).'"';
                                ?>>
                            <div class="wrap-pic-w pos-relative">
                                <?php
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img_produ']).'"/>';
                                ?>

                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php
                                    echo 'data:image/jpeg;base64,'.base64_encode($row['img_produ']).'"';
                                ?>">
                                    <i class="fa fa-expand"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-5 p-b-30">
            <div class="p-r-50 p-t-5 p-lr-0-lg">
                <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                    <?php echo $row['nombre_produ']; ?>
                </h4>

                <span class="mtext-106 cl2">
                    S/. <?php echo $row['precio_produ']; ?>
                </span>
                <p class="mtext-15 text-center" >
                    <u>Descripción</u>
                </p><br>
                <p class="mtext-15" >
                    <?php echo $row['detalle']; ?>
                </p>
                <!--  -->
                <div class="p-t-33">
                    
                    <div class="flex-w flex-m p-l-150 p-t-8">

                        <div class="size-204 flex-w flex-m respon6-next">
                           <p class="flex-w flex-m p-l-40" >
                                Cantidad
                            </p><br>
                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                </div>

                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                </div>
                            </div>
                            <style> 
                             #ac:hover {  
                              color: white;   
                              text-decoration: none;} 
                            </style>
                            <a id="ac" href="#"class="flex-c-m cl0 size-101 bg1 bor1" onclick="logueate()" >
                                Agregar Carrito
                            </a>
                        </div>
                    </div>  
                </div>

                <!--  -->
                <div class="flex-w flex-m p-l-210 p-t-40 respon7">
                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
    <span class="stext-107 cl6 p-lr-25">
        ID:  <?php echo $row['id_producto']; ?>
    </span>

    <span class="stext-107 cl6 p-lr-25">
        Categorías:  <?php echo $row['nombre_cat']; ?>
    </span>
</div>
</section>
<?php } ?>

<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Productos Relacionados
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                <?php foreach ($res as $row) {?>
                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <?php
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img_produ']).'"/>';
                                ?>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="detail_producto.php?id=<?php echo $row['id_producto']; ?>&cat=<?php echo $row['nombre_cat']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?php echo $row['nombre_produ']; ?>
                                </a>

                                <span class="stext-105 cl3">
                                    <?php echo $row['precio_produ']; ?>
                                </span>
                            </div>
                        </div>
                        
                    </div>  
                </div>
                <?php } ?>
            </div>
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

<script>
    function logueate(){
     swal({
      title: "Registrate o Inicia Sesión",
      html: 'Para poder realizar tu solicitud',
      type: 'warning',
      confirmButtonText: 'Ir'
    }).then(function () {
      window.location.href = "login.php";
    }, function (dismiss) {
      // dismiss can be 'cancel', 'overlay',
      // 'close', and 'timer'
      if (dismiss === 'cancel') {
        window.location.href = "detail_producto.php";
      }
    });
    }
</script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</body>
</html>