<?php
//https://www.scalablepath.com/blog/using-quill-js-build-wysiwyg-editor-website/
require_once 'model/noticia.php';
require_once 'model/user.php';

class NoticiaController{

    private $model;
    private $user;

    public function __CONSTRUCT(){
        $this->model = new noticia();
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
        require_once 'view/header.php';
        require_once 'view/noticia/noticia.php';
        require_once 'view/footer.php';
    }

    public function Listar()
    {
      if($this->user->is_logged_in()){
        require_once 'view/header-admin.php';
        require_once 'view/admin/noticia/noticia-listar.php';
        //require_once 'view/footer.php';
      } else {
        header('Location: login.php', true);
        exit();
      }
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
      if($this->user->is_logged_in()){
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
      } else {
        header('Location: login.php', true);
        exit();
      }
    }

    public function Nuevo(){
      if($this->user->is_logged_in()){
        try {
          $noti = new noticia();

          require_once 'view/header-admin.php';
          require_once 'view/admin/noticia/noticia-nuevo.php';
          //require_once 'view/footer.php';
        } catch (Exception $e) {
          $this->showError("Application error", $e->getMessage());
        }
      } else {
        header('Location: login.php', true);
        exit();
      }
    }

    public function Guardar(){
      if($this->user->is_logged_in()){
        try {
          $noti = new noticia();

          $noti->detalles = $_REQUEST['detalles'];
          $noti->detalle_corto = $_REQUEST['detalle_corto'];
          $noti->fecha = $_REQUEST['fecha'];
          $noti->foto = $_REQUEST['foto'];
          $noti->titulo = $_REQUEST['titulo'];

          $this->model->Registrar($noti);

          header('Location: admin.php?c=noticia&a=Listar');
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
          $noti = new noticia();

          $noti->noticia_id = $_REQUEST['noticia_id'];
          $noti->detalles = $_REQUEST['detalles'];
          $noti->detalle_corto = $_REQUEST['detalle_corto'];
          $noti->fecha = $_REQUEST['fecha'];
          $noti->foto = $_REQUEST['foto'];
          $noti->titulo = $_REQUEST['titulo'];

          $this->model->Actualizar($noti);

          header('Location: admin.php?c=noticia&a=Listar');
        } catch (Exception $e) {
          $this->showError("Application error", $e->getMessage());
        }
      } else {
        header('Location: login.php', true);
        exit();
      }
    }

    public function Eliminar(){
      if($this->user->is_logged_in()){
        try {
          $this->model->Eliminar($_REQUEST['noticia_id']);
          header('Location: admin.php?c=noticia&a=Listar');
        } catch (Exception $e) {
          $this->showError("Application error", $e->getMessage());
        }
      } else {
        header('Location: login.php', true);
        exit();
      }
    }
}
