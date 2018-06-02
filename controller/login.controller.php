<?php
//session_start();

//Se incluye el modelo donde conectará el controlador.
require_once 'model/user.php';

class LoginController{

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
        require_once 'view/login/login.php';
        require_once 'view/footer2.php';
    }

    public function Login()
    {
      try {
        if($this->model->is_logged_in()){
          header('Location: admin.php');
          exit();
        }
        if (!isset($_POST['username'])) $error[] = "Por favor ingrese el nombre";
        if (!isset($_POST['password'])) $error[] = "Por favor ingrese la contraseña";

        $username = $_POST['username'];
        if ($this->model->isValidUsername($username)){
          if (!isset($_POST['password'])){
            $error[] = 'Ingrese una contraseña';
          }
          $password = $_POST['password'];
          if($this->model->login($username, $password)){
            $_SESSION['username'] = $username;
            header('Location: admin.php');
            exit;
          } else {
            $error[] = 'El usuario no esta activado o no existe';
          }
        }else{
          $error[] = 'Usernames are required to be Alphanumeric, and between 3-16 characters long';
        }
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage(), "500");
      }
    }

    public function Logout()
    {
      try {
          $this->model->logout();
          header('Location: index.php');
          exit;
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage(), "500");
      }
    }

}
