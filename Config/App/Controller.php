<?php
class Controller{
    protected $model;
    protected $view;
    public function __construct(){
        $this->view = new View();
        $this->CargarModel();
    }
    public function CargarModel() 
    {
        $model = get_class($this)."Model";
        $ruta= "Model/".$model.".php";
        if(file_exists($ruta)){
            require_once $ruta;
            $this->model =new $model();
        }
    }
}

?>