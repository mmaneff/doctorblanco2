<?php
require_once 'model/principal.php';

class DoctorController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new principal();
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

    public function Crud(){
      try {
        $prin = new principal();

        if(isset($_REQUEST['idPrincipal'])){
            $prin = $this->model->Obtener($_REQUEST['principal_id']);
        }

        require_once 'view/header-admin.php';
        require_once 'view/principal/principal-editar.php';
        //require_once 'view/footer.php';
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function Nuevo(){
      try {
        $prin = new principal();

        require_once 'view/header-admin.php';
        require_once 'view/principal/principal-nuevo.php';
        //require_once 'view/footer.php';
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function Guardar(){
      try {
        $prin = new principal();

        $prin->principal_id = $_REQUEST['principal_id'];
        $prin->detalles = $_REQUEST['detalles'];
        $prin->foto = $_REQUEST['foto'];
        $prin->titulo = $_REQUEST['titulo'];

        $this->model->Registrar($prin);

        header('Location: index.php?c=principal');
        //$this->redirect('index.php');
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function Editar(){
      try {
        $prin = new principal();

        $prin->principal_id = $_REQUEST['principal_id'];
        $prin->detalles = $_REQUEST['detalles'];
        $prin->foto = $_REQUEST['foto'];
        $prin->titulo = $_REQUEST['titulo'];

        $this->model->Actualizar($prin);

        header('Location: index.php?c=principal');
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function Eliminar(){
      try {
        $this->model->Eliminar($_REQUEST['principal_id']);
        header('Location: index.php');
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }
}
