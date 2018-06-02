<div class="container-fluid" style="margin-top:80px;">
  <div class="row container-bgk">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h1 class="page-header" style="margin:0 0 10px 0;">Doctor </h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th style="width:40px;">#</th>
                  <th style="width:120px;">Titulo</th>
                  <th style="width:120px;">Foto</th>
                  <th style="width:60px;text-align:center;">Editar</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach($this->model->Listar() as $r): ?>
            <tr>
                <td><?php echo $r->principal_id; ?></td>
                <td><?php echo $r->titulo; ?></td>
                <td><?php echo $r->foto; ?></td>
                <td style="text-align:center;">
                    <a href="?c=doctor&a=Crud&principal_id=<?php echo $r->principal_id; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
