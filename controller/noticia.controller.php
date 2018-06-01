<?php
require_once 'model/noticia.php';

class NoticiaController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new noticia();
    }

    public function showError($title, $message) {
      include 'view/error.php';
    }

    public function redirect($location) {
      header('Location: '.$location);
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/noticia/noticia.php';
        require_once 'view/footer.php';
    }

    public function Listar()
    {
        require_once 'view/header-admin.php';
        require_once 'view/admin/noticia/noticia-listar.php';
        //require_once 'view/footer.php';
    }

    public function Noticias()
    {
      require_once 'view/header.php';
      require_once 'view/noticia/noticia.php';
      require_once 'view/footer.php';
    }

    public function VerDetalle(){
      try {
        $array = array();

        //Se obtienen los datos del tratamiento a editar.
        if(isset($_REQUEST['noticia_id'])){
            $array = $this->model->VerDetalle($_REQUEST['noticia_id']);
        }

        require_once 'view/header.php';
        require_once 'view/noticia/verdetalle.php';
        require_once 'view/footer.php';
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }
        
    public function Crud(){
      try {
        $noti = new noticia();

        if(isset($_REQUEST['noticia_id'])){
            $noti = $this->model->Obtener($_REQUEST['noticia_id']);
        }

        require_once 'view/header-admin.php';
        require_once 'view/admin/noticia/noticia-editar.php';
        //require_once 'view/footer.php';
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function Nuevo(){
      try {
        $noti = new noticia();

        require_once 'view/header-admin.php';
        require_once 'view/admin/noticia/noticia-nuevo.php';
        //require_once 'view/footer.php';
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function Guardar(){
      try {
        $noti = new noticia();

        $noti->noticia_id = $_REQUEST['noticia_id'];
        $noti->creador_id = $_REQUEST['creador_id'];
        $noti->detalles = $_REQUEST['detalles'];
        $noti->detalle_corto = $_REQUEST['detalle_corto'];
        $noti->fecha = $_REQUEST['fecha'];
        $noti->foto = $_REQUEST['foto'];
        $noti->tipo_id = $_REQUEST['tipo_id'];
        $noti->titulo = $_REQUEST['titulo'];

        $this->model->Registrar($noti);

        header('Location: index.php?c=noticia');
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function Editar(){
      try {
        $noti = new noticia();

        $noti->noticia_id = $_REQUEST['noticia_id'];
        $noti->creador_id = $_REQUEST['creador_id'];
        $noti->detalles = $_REQUEST['detalles'];
        $noti->detalle_corto = $_REQUEST['detalle_corto'];
        $noti->fecha = $_REQUEST['fecha'];
        $noti->foto = $_REQUEST['foto'];
        $noti->tipo_id = $_REQUEST['tipo_id'];
        $noti->titulo = $_REQUEST['titulo'];

        $this->model->Actualizar($noti);

        header('Location: index.php?c=noticia');
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function Eliminar(){
      try {
        $this->model->Eliminar($_REQUEST['noticia_id']);
        header('Location: index.php');
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }
}
