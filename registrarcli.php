<!DOCTYPE html>
<html lang="en">
<head>
<title>Registrarse</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="Assets/home/images/icons/c.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/home/css/util.css">
    <link rel="stylesheet" type="text/css" href="Assets/home/css/main.css">
<!--===============================================================================================-->
</head>
<style>
.divider:after,
.divider:before {
  content: "";
  flex: 1;
  height: 1px;
  background: #eee;
}
.h-custom {
  height: calc(100% - 73px);
}
@media (max-width: 450px) {
  .h-custom {
    height: 100%;
  }
</style>

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
                </nav>
            </div>  
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="index.php"><img src="Assets/home/images/icons/log.png" alt="IMG-LOGO"></a>
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
    <body><br>
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5"><br><br><br>
        <img src="https://img.freepik.com/vector-gratis/pedido-comida-linea-entrega-comestibles-mujer-compra-tienda-linea-catalogo-productos-pagina-navegador-web-cajas-compras-quedate-casa-cuarentena-o-autoaislamiento-estilo-plano_189033-143.jpg" class="img-fluid"
          alt=" IMAGEN XD">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="Crud/insertarcli.php" method="POST">
          <div class="text-center text-lg-start mt-4 pt-2">
           <h1 style="color: black"><i class="fa fa-user-plus"></i> Register</h1>
          </div><br>
          <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Nombre</label>
                    <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Name person" requerid>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Apellido</label>
                    <input class="form-control" id="txtApellido" name="txtApellido" type="text" placeholder="Last name person" requerid>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">DNI</label>
                    <input class="form-control" id="txtDni" name="txtDni" type="text" placeholder="Enter Dni" requerid>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Teléfono</label>
                    <input class="form-control" id="txtTelefono" name="txtTelefono" type="text" placeholder="Enter phone number" requerid>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Dirección</label>
                    <input class="form-control" id="txtDir" name="txtDir" type="text" placeholder="Enter Address" requerid>
                  </div>
          <!-- Email input -->
          <div class="form-outline mb-4">

            <label class="form-label" for="form3Example3">Correo Electrónico</label>
            <input type="email" name="txtEmail" id="form3Example3" class="form-control"
              placeholder="Ingrese su correo electrónico" required />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Contraseña</label>
            <input type="password" name="txtPass" id="form3Example4" class="form-control"
              placeholder="Ingrese su contraseña" requerid />
            
          </div>
          <div class="text-center text-lg-start">
          <div id="liveAlertPlaceholder"></div><hr>
      </div>
          <div class="text-center text-lg-start">
            <button type="submit" id="liveAlertBtn" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrarse</button>
            <p class="small fw-bold mt-2 pt-1 mb-0"> you have an account<a href="logincli.php"
                class="link-danger"> Iniciar Sesión</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section><br><br>
</body>

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
    <script src="Assets/home/vendor/bootstrap/js/popper.js"></script>
<!--===============================================================================================-->
    <script src="Assets/home/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->

    <script src="Assets/home/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->

    <script src="Assets/home/js/main.js"></script>

</body>
</html>