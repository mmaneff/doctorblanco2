<div class="col-xs-12">
  <h1 class="page-header">Noticias </h1>
</div>
<div class="col-xs-12">
  <a class="btn btn-primary" href="?c=noticia&a=Nuevo">Nueva Noticia</a>
</div>
<div class="col-xs-12">
  <table class="table table-striped">
      <thead>
          <tr>
              <th style="width:40px;">#</th>
              <th style="width:120px;">Titulo</th>
              <th style="width:120px;">Detalle</th>
              <th style="width:60px;text-align:center;">Editar</th>
              <th style="width:60px;text-align:center;">Borrar</th>
          </tr>
      </thead>
      <tbody>
      <?php foreach($this->model->Listar() as $r): ?>
          <tr>
              <td><?php echo $r->noticia_id; ?></td>
              <td><?php echo $r->titulo; ?></td>
              <td><?php echo $r->detalle_corto; ?></td>
              <td style="text-align:center;">
                  <a href="?c=noticia&a=Crud&noticia_id=<?php echo $r->noticia_id; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
              </td>
              <td style="text-align:center;">
                  <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=noticia&a=Eliminar&noticia_id=<?php echo $r->noticia_id; ?>">
                      <i class="glyphicon glyphicon-trash"></i>
                  </a>
              </td>
          </tr>
      <?php endforeach; ?>
      </tbody>
  </table>
</div>
