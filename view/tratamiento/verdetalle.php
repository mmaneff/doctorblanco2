<div class="container-fluid" style="margin-top:80px;">
  <div class="row">
    <div class="col-xs-12" style="text-align:center;">
      <h1><?php echo $array[0]->titulo; ?></h1>
    </div>
  </div>
  <div class="row container-bgk">
    <div class="col-xs-12">
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="text-align: center;">
        <img src="http://www.mateomaneff.com.ar/images/<?php echo $array[0]->foto; ?>"
        class="img-responsive img-thumbnail img-animate">
      </div>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="col-xs-12">
            <div><?php echo $array[0]->detalles; ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
