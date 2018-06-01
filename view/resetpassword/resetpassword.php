<div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form id="frmResetPwd" action="?c=resetpassword&a=ResetPwd" method="post" enctype="multipart/form-data" autocomplete="off">
					<h2>Cambiar Contraseña</h2>
					<hr>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="1">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="1">
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
            <div class="col-xs-6 col-md-6">
              <button class="btn btn-primary btn-block btn-lg">Reset Password</button>
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
        $("#frmResetPwd").submit(function(){
            return $(this).validate();
        });
    })
</script>
