<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/user.php';

class MemberpageController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new User();
    }

    public function showError($title, $message, $type) {
      if($type == "404") {
        include 'view/error404.php';
      }
      elseif ($type == "500") {
        include 'view/error.php';
      }
    }

    public function redirect($location) {
      header('Location: '.$location);
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header2.php';
        require_once 'view/memberpage/memberpage.php';
        require_once 'view/footer2.php';
    }

    public function Registrar()
    {
      try {
        if (!isset($_POST['username'])) $error[] = "Por favor ingrese el nombre";
        if (!isset($_POST['email'])) $error[] = "Por favor ingrese el mail";
        if (!isset($_POST['password'])) $error[] = "Por favor ingrese la contraseña";

        $username = $_POST['username'];

        //very basic validation
      	if(!$this->model->isValidUsername($username)){
      		$error[] = 'El nombre de usuario debe tener 3 caracteres alpanumericos';
      	} else {
          $existe_usuario = $this->model->ExisteUsuario($username);
      		if(!empty($existe_usuario)){
      			$error[] = 'El nombre de usuario ya existe';
      		}
      	}

        if(strlen($_POST['password']) < 5){
		      $error[] = 'La contraseña es muy corta';
	      }
        if(strlen($_POST['passwordConfirm']) < 5){
		      $error[] = 'Confirmar contraseña es muy corta';
	      }
        if($_POST['password'] != $_POST['passwordConfirm']){
          $error[] = 'Las contraseñas no soy iguales';
        }

        //email validation
    	  $email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);
    	  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    	    $error[] = 'Ingrese un mail valido';
    	  } else {
    		  $existe_email = $this->model->ExisteMail($email);
    		  if(!empty($existe_email)){
    			  $error[] = 'El mail ya existe';
    		  }
    	  }

        //if no errors have been created carry on
        if(!isset($error)){
      		//hash the password
      		$hashedpassword = $this->model->password_hash($_POST['password'], PASSWORD_BCRYPT);
      		//create the activasion code
      		$activasion = md5(uniqid(rand(),true));
      		try {
            $usuario = new User();
            //Captura de los datos del formulario (vista).
            $usuario->username = $username;
            $usuario->hashedpassword = $hashedpassword;
            $usuario->email = $email;
            //$usuario->activasion = $activasion;
            $usuario->activasion = 'S';

            //Registro al modelo tratamiento.
            $this->model->CrearUsuario($usuario);

            //send email
            /*
            $to = $_POST['email'];
            $subject = "Registration Confirmation";
            $body = "<p>Thank you for registering at demo site.</p>
            <p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
            <p>Regards Site Admin</p>";

            $mail = new Mail();
            $mail->setFrom(SITEEMAIL);
            $mail->addAddress($to);
            $mail->subject($subject);
            $mail->body($body);
            $mail->send();
            */
            //redirect to index page
            header('Location: login.php');
            exit;
          //else catch the exception and show the error.
          } catch(PDOException $e) {
            $error[] = $e->getMessage();
          }
      	}
      } catch (Exception $e) {
        $this->showError("Unautorizer","Error", "500");
      }
    }

}
