<?php
class Compras extends Controller{
    public function __construct(){
      
        session_start();
        parent::__construct();
    }
    public function index(){
        $this->view->mostrarView($this, "index");
    }
    public function buscarCodigo($cod){
        $data = $this->model->getProCod($cod);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function calcularPrecio(){
        
    }
}