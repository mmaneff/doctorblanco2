<?php
require_once 'model/principal.php';
require_once 'model/user.php';

class DoctorController{

    private $model;
    private $user;

    public function __CONSTRUCT(){
        $this->model = new principal();
        $this->user = new User();
    }

    public function showError($title, $message) {
      include 'view/error.php';
    }

    public function redirect($location) {
      header('Location: '.$location);
    }

    //Llamado plantilla principal
    public function Index(){
      try {
        $prin = new principal();
        $prin = $this->model->ObtenerInfo();

        require_once 'view/header.php';
        require_once 'view/doctor/doctor.php';
        require_once 'view/footer.php';
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function Listar()
    {
      if($this->user->is_logged_in()){
        require_once 'view/header-admin.php';
        require_once 'view/admin/doctor/doctor-listar.php';
        //require_once 'view/footer.php';
      } else {
        header('Location: login.php', true);
        exit();
      }
    }

    public function Crud(){
      if($this->user->is_logged_in()){
        try {
          $prin = new principal();
          if(isset($_REQUEST['principal_id'])){
              $prin = $this->model->Obtener($_REQUEST['principal_id']);
          }

          require_once 'view/header-admin.php';
          require_once 'view/admin/doctor/doctor-editar.php';
          //require_once 'view/footer.php';
        } catch (Exception $e) {
          $this->showError("Application error", $e->getMessage());
        }
      } else {
        header('Location: login.php', true);
        exit();
      }
    }

    public function Editar(){
      if($this->user->is_logged_in()){
        try {
          $prin = new principal();

          $prin->principal_id = $_REQUEST['principal_id'];
          $prin->detalles = $_REQUEST['detalles'];
          $prin->foto = $_REQUEST['foto'];
          $prin->titulo = $_REQUEST['titulo'];

          $this->model->Actualizar($prin);

          require_once 'view/header-admin.php';
          require_once 'view/doctor/doctor.php';
        } catch (Exception $e) {
          $this->showError("Application error", $e->getMessage());
        }
      } else {
        header('Location: login.php', true);
        exit();
      }
    }
}
