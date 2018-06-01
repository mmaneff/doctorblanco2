<h1 class="page-header">
    
</h1>


<form id="frm-noticia" action="?c=noticia&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="noticia_id" value="<?php echo $noti->noticia_id; ?>" />
  <div class="col-xs-6">
    <div class="form-group">
        <label>Titulo</label>
        <input type="text" name="titulo" value="<?php echo $noti->titulo; ?>" class="form-control" data-validacion-tipo="requerido|min:20" />
    </div>
  </div>
  <div class="col-xs-6">
    <div class="form-group">
        <label>Foto</label>
        <input type="text" name="foto" value="<?php echo $noti->foto; ?>" class="form-control" data-validacion-tipo="requerido|min:240" />
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
        <label>Detalle Corto</label>
        <input type="text" name="detalle_corto" value="<?php echo $noti->detalle_corto; ?>" class="form-control" data-validacion-tipo="requerido|min:100" />
    </div>
  </div>
  <div class="col-xs-12">
    <div class="form-group">
        <label>Detalle Largo</label>
        <input type="text" name="detalles" value="<?php echo $noti->detalles; ?>" class="form-control" data-validacion-tipo="requerido|min:20" />
    </div>
  </div>
  <div class="col-xs-12">
    <button class="btn btn-success">Guardar</button>
    <button class="btn btn-default">Cancelar</button>
  </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-noticia").submit(function(){
            return $(this).validate();
        });
    })
</script>
