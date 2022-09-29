<?php 
//para trear nombre del usuario
  session_start();
  if (empty($_SESSION['active'])) {
    header('location:../Views/saliradmin.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
    <meta name="description" content="Tienda Virtual de Abarrotes To' eat">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jose Luis">
    <meta name="theme-color" content="#FFFFFF">
    <link rel="icon" type="image/png" href="../Assets/home/images/icons/c.ico"/>
    <title>Online Store</title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../Assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
  </head>
  
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php">To' Eat</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="dropdown">
            <a class="app-nav__item" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope"></i>
              <span class="count bg-success"></span>
            </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Ejemplo de Mensaje</p>
                    </div>
                  </a>

                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">New Messages</p>
                </div>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;<?php echo $_SESSION['usu'];?></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i><?php echo $_SESSION['nomb'];?> <?php echo $_SESSION['ape'];?></a></li>
            <li><a class="dropdown-item" href="./perfil.php"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="./saliradmin.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>

    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" width="48" height="48" src="../Assets/img/per.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['nomb'];?> <?php echo $_SESSION['ape']; ?></p>
          <p class="app-sidebar__user-designation">Bienvenido</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="./dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="./usuarios.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users</span></a></li>
        <li><a class="app-menu__item" href="./clientes.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Customers</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shopping-basket"></i><span class="app-menu__label">Products</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="./productos.php"><i class="icon fa fa-circle-o"></i> Products</a></li>
            <li><a class="treeview-item" href="./categorias.php"><i class="icon fa fa-circle-o"></i> Category</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="orders.php"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Orders</span></a></li>
        <li><a class="app-menu__item" href="./saliradmin.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
      </ul>
    </aside>