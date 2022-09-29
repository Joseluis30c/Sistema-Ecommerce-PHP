<?php 
//para trear nombre del usuario
  session_start();
  if (empty($_SESSION['active'])) {
    header('location:salir.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>To' Eat | Tienda de Abarrotes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="../Assets/home/images/icons/c.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Assets/home/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/home/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/home/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/home/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/home/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../Assets/home/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/home/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/home/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../Assets/home/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/home/vendor/slick/slick.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/home/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/home/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/home/css/util.css">
    <link rel="stylesheet" type="text/css" href="../Assets/home/css/main.css">
<!--===============================================================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
</head>
<body class="animsition">
    
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
                        <a href="about.php" class="flex-c-m trans-04 p-lr-25">
                           Nosotros
                        </a>
                        <a class="flex-c-m trans-04 p-lr-25">

                        </a>
                        <a href="carrito.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-shopping-cart"> Mi carrito</i>
                        </a>
                        <a href="pedidos.php" class="flex-c-m trans-04 p-lr-25">Mis Pedidos
                        </a>
                        <a href="perfil.php" class="flex-c-m trans-04 p-lr-25">
                           <?php echo $_SESSION['nomb']; ?>
                           <?php echo $_SESSION['ape']; ?>
                        </a>
                        <a href="salir.php" class="flex-c-m trans-04 p-lr-25">
                           Salir
                        </a>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->       
                    <a href="index.php" class="logo">
                        <img src="../Assets/home/images/icons/log.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop --> 

                    <!-- Icon header -->
                   
                </nav>
            </div>  
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="index.php"><img src="../Assets/home/images/icons/log.png" alt="IMG-LOGO"></a>
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
                        <a href="about.php" class="flex-c-m trans-04 p-lr-25">
                           Nosotros
                        </a>
                        <a class="flex-c-m trans-04 p-lr-25">

                        </a>
                        <a href="carrito.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-shopping-cart"> Mi carrito</i>
                        </a>
                        <a href="pedidos.php" class="flex-c-m trans-04 p-lr-25">Mis Pedidos
                        </a>
                        <a href="perfil.php" class="flex-c-m trans-04 p-lr-25">
                           <?php echo $_SESSION['nomb']; ?>
                           <?php echo $_SESSION['ape']; ?>
                        </a>
                        <a href="salir.php" class="flex-c-m trans-04 p-lr-25">
                           Salir
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </header>

