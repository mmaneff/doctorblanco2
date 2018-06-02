<?php
include('phpmailer/mail.php');

define('SITEEMAIL','info@drblanco.com.ar');

//Se incluye el modelo donde conectará el controlador.
require_once 'model/noticia.php';

class InicioController{

    private $model;
    //private $primero;
    private $segundo;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new noticia();
        //$this->primero = new noticia();
        $this->segundo = new noticia();
    }

    public function showError($title, $message) {
      include 'view/error.php';
    }

    public function redirect($location) {
      header('Location: '.$location);
    }


    //Llamado plantilla principal
    public function Index(){
        $array = [];
        $noti1 = new noticia();
        $noti2 = new noticia();
        //$aux = new noticia();

        $array = $this->model->ObtenerUltimasNoticias();
        $noti1 = $array[0];
        $noti2 = $array[1];
        //$noti->titulo = $aux->titulo;

        require_once 'view/header.php';
        require_once 'view/inicio/slider.php';
        require_once 'view/inicio/acercade.php';
        require_once 'view/inicio/tratamiento.php';
        require_once 'view/inicio/noticia.php';
        require_once 'view/inicio/link.php';
        require_once 'view/inicio/contacto.php';
        require_once 'view/inicio/ubicacion.php';
        require_once 'view/footer.php';
    }

    /*
    * Configurar el reCapcha
    * http://jonsegador.com/2017/05/configurar-recaptcha-2-0-con-php/
    */
    public function EnviarMail()
    {
      try {
        if (!isset($_POST['nombre'])) $error[] = "Por favor ingrese el nombre";
        if (!isset($_POST['mail'])) $error[] = "Por favor ingrese el mail";
        if (!isset($_POST['asunto'])) $error[] = "Por favor ingrese un asunto";
        if (!isset($_POST['consulta'])) $error[] = "Por favor ingrese la consulta";

        $recaptcha = $_POST["g-recaptcha-response"];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
      	$data = array(
      		'secret' => '6Le7FVgUAAAAANQq0zKdQ1aFdiE2QxwOF93z5XXY',
      		'response' => $recaptcha
      	);
      	$options = array(
      		'http' => array (
      			'method' => 'POST',
      			'content' => http_build_query($data)
      		)
      	);
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);
        if ($captcha_success->success) {
          // No eres un robot, continuamos con el envío del email
          $nombre = $_POST['nombre'];
          $consulta = $_POST['consulta'];
          //send email
          $from = $_POST['mail'];
    			$to = SITEEMAIL;
    			$subject = $_POST['asunto'];
    			$body = "<p>Soy </p>". $nombre . "<br>" . $consulta;

    			$mail = new Mail();
    			$mail->setFrom($from);
    			$mail->addAddress($to);
    			$mail->subject($subject);
    			$mail->body($body);
    			$mail->send();

          header('Location: index.php#contacto');
        } else {
          // Eres un robot!
        }
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

}
