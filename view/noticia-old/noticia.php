<div class="col-xs-12">
  <h1>Noticias</h1>
</div>

<?php foreach($this->model->Listar() as $r): ?>
  <div class="col-xs-12">
    <div class="col-xs-4">
      <img src="http://www.mateomaneff.com.ar/images/<?php echo $r->foto; ?>"
      class="img-responsive img-thumbnail img-animate">
    </div>
    <div class="col-xs-8">
      <div class="col-xs-12">
          <h2><?php echo $r->titulo; ?></h2>
      </div>
      <div class="col-xs-12">
          <div><?php echo $r->detalle_corto; ?></div>
      </div>
    </div>
  </div>    
<?php endforeach; ?>
