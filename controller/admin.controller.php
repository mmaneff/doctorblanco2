<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/user.php';

class AdminController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new User();
    }

    public function showError($title, $message) {
      include 'view/error.php';
    }

    public function redirect($location) {
      header('Location: '.$location);
    }

    //Llamado plantilla principal
    public function Index(){
      if($this->model->is_logged_in()){
        require_once 'view/header-admin.php';
        require_once 'view/admin/admin.php';
        //require_once 'view/footer.php';
      } else {
        header('Location: login.php', true);
        exit();
      }
    }

}
