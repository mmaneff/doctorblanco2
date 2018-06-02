<div class="container-fluid" style="margin-top:80px;">
  <div class="row">
    <div class="col-xs-12" style="text-align:center;">
      <h1><?php echo $titulo; ?></h1>
    </div>
  </div>
  <div class="row container-bgk">
    <?php
    $count0 = 0;
    $count1 = 0;
    $count2 = 0;
    foreach($array as $r): ?>
      <div class="row <?php echo (++$count0%2 ? "row-flex" : ""); ?>" style="margin:20px 20px 40px">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 <?php echo (++$count1%2 ? "flex-last" : ""); ?>"
          style="text-align: center;">
          <img src="http://www.mateomaneff.com.ar/images/<?php echo $r->foto; ?>"
          class="img-responsive img-thumbnail img-animate">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 <?php echo (++$count2%2 ? "flex-first" : ""); ?>"
          style="text-align: center;">
          <div class="col-xs-12">
            <a class="" href="?c=tratamiento&a=VerDetalle&tratamiento_id=<?php echo $r->tratamiento_id; ?>">
              <h2><?php echo $r->titulo; ?></h2>
            </a>
          </div>
          <div class="col-xs-12">
              <div><?php echo $r->detalle_corto; ?></div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>
  </div>
</div>
