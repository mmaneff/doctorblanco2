<div class="container-fluid" style="margin-top:80px;">
  <div class="row container-bgk">
    <form id="frm-doctor" action="?c=doctor&a=Editar" method="post" enctype="multipart/form-data">
      <input type="hidden" name="principal_id" value="<?php echo $prin->principal_id; ?>" />
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <label>Titulo</label>
            <input type="text" name="titulo" value="<?php echo $prin->titulo; ?>" class="form-control" data-validacion-tipo="requerido|min:20" />
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="form-group">
            <label>Foto</label>
            <input type="text" name="foto" value="<?php echo $prin->foto; ?>" class="form-control" data-validacion-tipo="requerido|min:240" />
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            <label>Detalle Largo</label>
            <div id="editor"><?php echo $prin->detalles; ?></div>
            <input type="hidden" name="detalles" id="detalles" value="" />
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="text-right">
            <button class="btn btn-success">Guardar</button>
            <a class="btn btn-default" href="?c=doctor&a=Listar">Cancelar</a>
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
        $("#frm-doctor").submit(function(){
            $('#detalles').attr("value", quill.root.innerHTML);
            return $(this).validate();
        });
    })
    var quill = new Quill('#editor', {
      theme: 'snow'
    });
</script>
