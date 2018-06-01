<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/tratamiento.php';

class TratamientoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new tratamiento();
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
        $array = array();
        $titulo = "";

        //Se obtienen los datos del tratamiento a editar.
        if(isset($_REQUEST['tipo_tratamiento_id'])){
            $array = $this->model->ObtenerPor($_REQUEST['tipo_tratamiento_id']);
        }

        if($_REQUEST['tipo_tratamiento_id'] == 1) {
          $titulo = "Cirugia Facial";
        } elseif ($_REQUEST['tipo_tratamiento_id'] == 2) {
          $titulo = "Cirugia Mamaria";
        } elseif ($_REQUEST['tipo_tratamiento_id'] == 3) {
          $titulo = "Cirugia Corporal";
        } elseif ($_REQUEST['tipo_tratamiento_id'] == 4) {
          $titulo = "Cirugia Reparadora";
        } elseif ($_REQUEST['tipo_tratamiento_id'] == 5) {
          $titulo = "Tratamiento No Quirurgico";
        }

        require_once 'view/header.php';
        require_once 'view/tratamiento/tratamiento.php';
        require_once 'view/footer.php';
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function VerDetalle(){
      try {
        $array = array();

        //Se obtienen los datos del tratamiento a editar.
        if(isset($_REQUEST['tratamiento_id'])){
            $array = $this->model->VerDetalle($_REQUEST['tratamiento_id']);
        }

        require_once 'view/header.php';
        require_once 'view/tratamiento/verdetalle.php';
        require_once 'view/footer.php';
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function Listar()
    {
        require_once 'view/header-admin.php';
        require_once 'view/admin/tratamiento/tratamiento-listar.php';
        //require_once 'view/footer.php';
    }

    //Llamado a la vista tratamiento-editar
    public function Crud(){
      try {
        $trat = new tratamiento();

        //Se obtienen los datos del tratamiento a editar.
        if(isset($_REQUEST['tratamiento_id'])){
            $trat = $this->model->Obtener($_REQUEST['tratamiento_id']);
        }

        //Llamado de las vistas.
        require_once 'view/header-admin.php';
        require_once 'view/admin/tratamiento/tratamiento-editar.php';
        //require_once 'view/footer.php';
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
  }

    //Llamado a la vista tratamiento-nuevo
    public function Nuevo(){
      try {
        $trat = new tratamiento();

        //Llamado de las vistas.
        require_once 'view/header-admin.php';
        require_once 'view/admin/tratamiento/tratamiento-nuevo.php';
        //require_once 'view/footer.php';
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    //Método que registrar al modelo un nuevo tratamiento.
    public function Guardar(){
      try {
        $trat = new tratamiento();

        //Captura de los datos del formulario (vista).
        $trat->creador_id = $_REQUEST['creador_id'];
        $trat->detalles = $_REQUEST['detalles'];
        $trat->detalle_corto = $_REQUEST['detalle_corto'];
        $trat->fecha = $_REQUEST['fecha'];
        $trat->foto = $_REQUEST['foto'];
        $trat->tipo_tratamiento_id = $_REQUEST['tipo_tratamiento_id'];
        $trat->titulo = $_REQUEST['titulo'];

        //Registro al modelo tratamiento.
        $this->model->Registrar($trat);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: index.php');
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    //Método que modifica el modelo de un tratamiento.
    public function Editar(){
      try {
        $trat = new tratamiento();

        $trat->tratamiento_id = $_REQUEST['tratamiento_id'];
        $trat->creador_id = $_REQUEST['creador_id'];
        $trat->detalles = $_REQUEST['detalles'];
        $trat->detalle_corto = $_REQUEST['detalle_corto'];
        $trat->fecha = $_REQUEST['fecha'];
        $trat->foto = $_REQUEST['foto'];
        $trat->tipo_tratamiento_id = $_REQUEST['tipo_tratamiento_id'];
        $trat->titulo = $_REQUEST['titulo'];

        $this->model->Actualizar($trat);

        header('Location: index.php');
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }

    //Método que elimina la tupla tratamiento con el idTratamiento dado.
    public function Eliminar(){
      try {
        $this->model->Eliminar($_REQUEST['tratamiento_id']);
        header('Location: index.php');
      } catch (Exception $e) {
        $this->showError("Application error", $e->getMessage());
      }
    }
}
