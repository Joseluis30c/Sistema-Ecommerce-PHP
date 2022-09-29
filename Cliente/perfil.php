<?php require_once("../Template/header_cliente.php"); ?>
		<section class=" txt-center">
			<br><br><br><br>
			<h2 style="color: black;" class="ltext-105 cl0 txt-center">
				Mi Perfil
			</h2>
		</section>	
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<form action="../Crud/Cliente/modPerfil.php?id=<?php echo $_SESSION['id'];?>" method="POST">
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
                  	<label>Dirección</label>
                  	<input class="form-control" name="dir" type="text" value="<?php echo $_SESSION['dir'];?>" required>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Email</label>
                      <input class="form-control" name="email" type="email" value="<?php echo $_SESSION['usu'];?>" readonly>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Contraseña</label>
                      <input class="form-control" name="pass" type="password" placeholder="Cambiar contraseña">
                    </div>

                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-dark" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>
                    </div>
                  </div>
                </form>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor">
						<div class="hov-img0">
							<img src="#" alt="IMG">
						</div>
					</div>
				</div>
			</div>
</div></section>
<?php require_once("../Template/footer_cliente.php"); ?>