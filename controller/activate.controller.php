<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/user.php';

class ActivateController{

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
        require_once 'view/activate/activate.php';
        require_once 'view/footer2.php';
    }

    public function Activate()
    {
      try {
        
      } catch (Exception $e) {
        $this->showError("Unautorizer","Error", "500");
      }
    }

}
