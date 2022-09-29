<?php 

?>
<div class="modal fade" id="detail<?php echo $row['id_producto']; ?>">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <!-- cuerpo del diálogo -->
<div class="modal-body">
  
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
<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-7 p-b-30">
            <div class="p-l-25 p-r-30 p-lr-0-lg">
                <div class="wrap-slick3 flex-sb flex-w">
                    
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img_produ']).'"/>';?>
                    
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
            </div>
        </div>
    </div>
</section>
          </div>
        </div>
      </div>
</div> 