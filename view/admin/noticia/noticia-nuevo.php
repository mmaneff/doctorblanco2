<div class="container-fluid" style="margin-top:80px;">
  <div class="row container-bgk">
    <form id="frm-noticia" action="?c=noticia&a=Guardar" method="post" enctype="multipart/form-data">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <label>Titulo</label>
            <input type="text" name="titulo" value="<?php echo $noti->titulo; ?>" class="form-control" data-validacion-tipo="requerido|min:20" />
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="form-group">
            <label>Foto</label>
            <input type="text" name="foto" value="<?php echo $noti->foto; ?>" class="form-control" data-validacion-tipo="requerido|min:240" />
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="form-group">
            <label>Fecha</label>
            <input type="text" name="fecha" value="<?php echo $noti->fecha; ?>" class="form-control" data-validacion-tipo="requerido|min:100" />
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            <label>Detalle Corto</label>
            <textarea id="detalle_corto" name="detalle_corto" rows="3" class="form-control"><?php echo $noti->detalle_corto; ?></textarea>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            <label>Detalle Largo</label>
            <div id="editor"><?php echo $noti->detalles; ?></div>
            <input type="hidden" name="detalles" id="detalles" value="" />
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="text-right">
            <button class="btn btn-success">Guardar</button>
            <a class="btn btn-default" href="?c=noticia&a=Listar">Cancelar</a>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="assets/js/jquery-1.11.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>
<script>
    $(document).ready(function(){
        $("#frm-noticia").submit(function(){
            return $(this).validate();
        });
    })
    var quill = new Quill('#editor', {
      theme: 'snow'
    });
</script>
