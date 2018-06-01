<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=noticia">Noticias</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-noticia" action="?c=noticia&a=Guardar" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label>Nit Proveedor</label>
        <input type="text" name="detalle_corto" value="<?php echo $noti->detalle_corto; ?>" class="form-control" placeholder="Ingrese NIT Proveedor" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Nombre Producto</label>
        <input type="text" name="fecha" value="<?php echo $noti->fecha; ?>" class="form-control" placeholder="Ingrese nombre producto" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Precio Unitario</label>
        <input type="text" name="titulo" value="<?php echo $noti->titulo; ?>" class="form-control" placeholder="Ingrese precio unitario" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Descripción del Producto</label>
        <input type="text" name="foto" value="<?php echo $noti->foto; ?>" class="form-control" placeholder="Ingrese descripción producto" data-validacion-tipo="requerido|min:240" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-noticia").submit(function(){
            return $(this).validate();
        });
    })
</script>
