<div class="row mg-0 section-bg-2" id="contacto" style="padding: 50px 3%;">
  <div class="col-xs-12" style="text-align:center;">
    <h1 class="">Contacto</h1>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <p class="text-center">Escribinos y preguntanos lo que necesites, estamos esperando tu contacto!</p>
  </div>
  <form id="frmSendMail" action="?c=inicio&a=EnviarMail" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-3 col-lg-3 col-lg-offset-3">
      <div class="form-group">
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Apellido y Nombre">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="mail" id="mail" placeholder="Mail">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto">
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
      <div class="form-group">
        <textarea class="form-control" name="consulta" id="consulta" placeholder="Consulta" rows="6"></textarea>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: flex;justify-content: center;">
      <div class="g-recaptcha" data-sitekey="6Le7FVgUAAAAAEeYwV0Dx8wjgYLv8SXKp2m2jI9S"></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;">
      <button class="btn btn-primary">Enviar Consulta</button>
    </div>
  </form>
</div>

<script src="assets/js/jquery-1.11.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){
        $("#frmSendMail").submit(function(){
            return $(this).validate();
        });
    })
</script>
