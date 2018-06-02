<div class="container-fluid" style="margin-top:80px;">
  <div class="row container-bgk">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h1 class="page-header" style="margin:0 0 10px 0;">Tratamientos </h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <a class="btn btn-primary" href="?c=tratamiento&a=Nuevo">Nueva Tratamiento</a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width:40px;">Codigo</th>
            <th style="width:120px;">Titulo</th>
            <th style="width:120px;">Tipo Tratamiento</th>
            <th style="width:220px;">Detalle Corto</th>
            <th style="width:60px;text-align:center;">Editar</th>
            <th style="width:60px;text-align:center;">Borrar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($this->model->Listar() as $r): ?>
            <tr>
              <td><?php echo $r->tratamiento_id; ?></td>
              <td><?php echo $r->titulo; ?></td>
              <td><?php
                        if($r->tipo_tratamiento_id == 1)
                          echo "Cirugia Facial";
                        elseif ($r->tipo_tratamiento_id == 2)
                          echo "Cirugia Mamaria";
                        elseif ($r->tipo_tratamiento_id == 3)
                          echo "Cirugia Corporal";
                        elseif ($r->tipo_tratamiento_id == 4)
                          echo "Cirugia Reparadora";
                        else
                          echo "Tratamiento No Quirurgico";
               ?></td>
              <td><?php echo $r->detalle_corto; ?></td>
              <td style="text-align:center;">
                  <a href="?c=tratamiento&a=Crud&tratamiento_id=<?php echo $r->tratamiento_id; ?>">
                    <i class="glyphicon glyphicon-pencil"></i>
                  </a>
              </td>
              <td style="text-align:center;">
                  <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=tratamiento&a=Eliminar&tratamiento_id=<?php echo $r->tratamiento_id; ?>">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
