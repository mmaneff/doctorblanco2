<div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form id="frmLogin" action="?c=login&a=Login" method="post" enctype="multipart/form-data" autocomplete="off">
				<h2>Please Login</h2>
				<p><a href='./'>Ir al inicio</a></p>
				<hr>
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="" tabindex="1">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9">
						 <a href='reset.php'>¿Olvido su contraseña?</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6">
            <button class="btn btn-primary btn-block btn-lg">Iniciar Sesión</button>
          </div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="assets/js/jquery-1.11.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){
        $("#frmLogin").submit(function(){
            return $(this).validate();
        });
    })
</script>
