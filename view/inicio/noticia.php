<div class="row mg-0 section-bg-2" id="noticias" style="padding: 50px 3%;">
  <div class="col-xs-12" style="text-align:center;">
    <h1 class="">Noticias</h1>
  </div>
  <div class="container-anim cf">
    <!--div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="text-align:center;"-->
    <div class="animation-element slide-left testimonial" style="text-align:center;">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;">
        <img src="http://www.mateomaneff.com.ar/images/<?php echo $noti1->foto; ?>" alt=""
            class="img-responsive img-thumbnail img-animate">
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;margin-top:15px;">
        <a class="a-title" href="?c=noticia&a=VerDetalle&noticia_id=<?php echo $noti1->noticia_id; ?>">
          <?php echo $noti1->titulo; ?>
        </a>
        <p class="mx-auto text-responsive"><?php echo $noti1->detalle_corto; ?></p>
      </div>
    </div>
    <div class="animation-element slide-left testimonial" style="text-align:center;">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;">
        <img src="http://www.mateomaneff.com.ar/images/<?php echo $noti2->foto; ?>" alt=""
            class="img-responsive img-thumbnail img-animate">
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;margin-top:15px;">
        <a class="a-title" href="?c=noticia&a=VerDetalle&noticia_id=<?php echo $noti2->noticia_id; ?>">
          <?php echo $noti2->titulo; ?>
        </a>
        <p class="mx-auto text-responsive"><?php echo $noti2->detalle_corto; ?></p>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;">
    <a class="btn btn-primary" href="?c=noticia&a=Noticias">Ver Más</a>
  </div>
</div>
