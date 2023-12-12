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
    public function ingresar(){
        $id = $_POST["id"];
        $datos =$this->model->getProductos($id);
        //$datos1= $this->model->getPagos($id);

        $id_producto= $datos["Id_pro"];
        $id_usuario=  $_SESSION["Id_usu"] ;
        //$id_pago= $datos1['Id_metodo_pago'];
        $cantidad= $_POST["stock_c"];
        $precio= $datos["Precio_pro"];
        $total= $precio*$cantidad;

        $data = $this->model->registrarDetalle($cantidad, $precio, $total, $id_usuario, $id_producto);
        if($data== "ok"){
            $msg ="ok";
        }else{
            $msg = "Error al ingresar el producto";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function listar(){
        $id_usuario= $_SESSION["Id_usu"];
        $data=$this->model->getDetalles($id_usuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}