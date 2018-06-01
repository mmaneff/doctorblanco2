<?php
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


}
