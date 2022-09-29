 <?php 
$idd=$fila['id_ped'];
$det="SELECT a.id_producto, a.nombre_produ,a.img_produ, d.precio,d.cantidad FROM detalle_ped d INNER JOIN pedidos p on d.id_ped=p.id_ped INNER JOIN productos a on d.id_pro=a.id_producto where d.id_ped=$idd";
$r=mysqli_query($con,$det); ?>
<!-- modal--> 
<div class="modal fade" id="detcli<?php echo $fila['id_ped']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
              <form >
                <h4 class="modal-title text-center" id="titleModal">Detalles de PED00<?php echo $fila['id_ped']; ?></h4><hr>
                <div class="form-row">
                  <?php while($fil=mysqli_fetch_assoc($r)){ ?>
                    <div class="form-group col-md-1 text-center">
                    </div>
                  <div class="form-group col-md-4">
                    <br>  
                    <label><?php echo $fil['nombre_produ']; ?></label>
                  </div>

                  <div class="form-group col-md-4 text-center">
                    <?php
                        echo '<img width="50" heigth="50" src="data:image/jpeg;base64,'.base64_encode($fil['img_produ']).'"/>';
                        ?><br><br>
                    <label style="color: red;">S/. <?php echo number_format($fil['precio'],2); ?></label>
                  </div>
                  <div class="form-group col-md-2 text-center">
                    <label class="control-label">Cantidad</label><br>
                    <label><?php echo $fil['cantidad']; ?></label>
                  </div>
                  <div class="form-group col-md-1"></div>
                <?php } ?>

                </div>
                <div class="form-row">
                <div class="form-group col-md-5"></div>
                <div class="form-group col-md-2 text-center">
                    <label >Total:</label>
                    <label><b>S/. <?php echo number_format($fila['total'],2); ?></b></label>
                </div>
                <div class="form-group col-md-5"></div>
                </div><hr>
              <div class="tile-footer">
              <a class="btn btn-primary" href="../Views/pdf/ticket.php?id=<?php echo $fila['id_ped']; ?>" target="blank"><i class="fa fa-fw fa-lg fa-download"></i>Ticket</a>
              <a class="btn btn-info" href="../Views/pdf/boleta.php?id=<?php echo $fila['id_ped']; ?>" target="blank"><i class="fa fa-fw fa-lg fa-download"></i>Boleta</a>
              <a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</a>
              </div>
            </form>
      </div>
    </div>
  </div>
</div> 
