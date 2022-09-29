<?php require_once("../Template/header_admin.php"); ?>
<main class="app-content">
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="../Assets/img/per.png">
              <h4><?php echo $_SESSION['nomb'];?> <?php echo $_SESSION['ape']; ?></h4>
              <p><?php echo $_SESSION['usu'];?></p>
              <label><?php echo $_SESSION['est'];?> <i style="color: green" class="fa fa-circle"></i></label> 
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Settings</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-settings">
              <div class="tile user-settings">
                <h1 class="line-head">Settings</h1>
                <form action="../Crud/Usuarios/modPerfil.php?id=<?php echo $_SESSION['id'];?>" method="POST">
                  <div class="row mb-4">
                    <input type="hidden" id="idTUsuario" name="id" value="<?php echo $_SESSION['id'];?>">
                    <div class="col-md-4">
                      <label>Nombre</label>
                      <input class="form-control" name="nom" type="text" value="<?php echo $_SESSION['nomb'];?>" required>
                    </div>
                    <div class="col-md-4">
                      <label>Apellido</label>
                      <input class="form-control" name="ape" type="text" value="<?php echo $_SESSION['ape'];?>" required>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>DNI</label>
                      <input class="form-control" name="dni"type="text" value="<?php echo $_SESSION['dni'];?>" required>
                    </div>
                    <div class="col-md-4">
                      <label>Teléfono</label>
                      <input class="form-control" name="tel" type="text" value="<?php echo $_SESSION['tel'];?>" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Email</label>
                      <input class="form-control" name="email" type="email" value="<?php echo $_SESSION['usu'];?>" required>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Contraseña</label>
                      <input class="form-control" name="pass" type="password"required>
                      
                    </div>

                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php require_once("../Template/footer_admin.php"); ?>