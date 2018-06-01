<h1 class="page-header">
    <?php echo $trat->tratamiento_id != null ? $trat->titulo : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=tratamiento">tratamiento</a></li>
  <li class="active"><?php echo $trat->tratamiento_id != null ? $trat->titulo : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-tratamiento" action="?c=tratamiento&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="tratamiento_id" value="<?php echo $trat->tratamiento_id; ?>" />

    <div class="form-group">
        <label>titulo</label>
        <input type="text" name="titulo" value="<?php echo $trat->titulo; ?>" class="form-control" placeholder="Ingrese Razón Social" data-validacion-tipo="requerido|min:100" />
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
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-tratamiento").submit(function(){
            return $(this).validate();
        });
    })
</script>
