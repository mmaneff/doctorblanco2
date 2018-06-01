<h1 class="page-header">
    Nuevo Registro
</h1>
<ol class="breadcrumb">
  <li><a href="?c=tratamiento">Tratamiento</a></li>
  <li class="active">Nuevo Registro</li>
</ol>
<form id="frm-tratamiento" action="?c=tratamiento&a=Guardar" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>titulo</label>
      <input type="text" name="titulo" value="<?php echo $trat->titulo; ?>" class="form-control" placeholder="Ingrese Nit Proveedor" data-validacion-tipo="requerido|min:20" />
    </div>
    <div class="form-group">
        <label>detalle</label>
        <input type="text" name="detalles" value="<?php echo $trat->detalles; ?>" class="form-control" placeholder="Ingrese Razón Social" data-validacion-tipo="requerido|min:100" />
    </div>
    <div class="form-group">
        <label>foto</label>
        <input type="text" name="foto" value="<?php echo $trat->foto; ?>" class="form-control" placeholder="Ingrese dirección proveedor" data-validacion-tipo="requerido|min:100" />
    </div>
    <hr />
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>
<script>
    $(document).ready(function(){
        $("#frm-tratamiento").submit(function(){
            return $(this).validate();
        });
    })
</script>
