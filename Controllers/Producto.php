<?php
class Producto extends Controller
{
    public function __construct()
    {
        session_start();
        if(empty($_SESSION['activo'])){
            header("location: ".base_url);
        }
        parent::__construct();
    }
    public function index()
    {
        $this->view->mostrarView($this, "index");
    }

    public function listar(){
        $data= $this->model->getProductos();
        for($i=0; $i<count($data);$i++){
            if($data[$i]["Estado"] == 1){
                $data[$i]["Estado"] = '<b-badge variant="success">Activo</b-badge>';
                $data[$i]['acciones']= '
            <div class="btn-group">
            <button class="btn btn-primary mb-1 btn-sm" type="button" onclick="btnEditarProducto('.$data[$i]['Id_pro'].');"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-danger mb-1 btn-sm" type="button" onclick="btnEliminarProducto('.$data[$i]['Id_pro'].');"><i class="bi bi-trash3-fill"></i></button></div>';
            }else{
                $data[$i]["Estado"] = '<b-badge variant="danger">Inactivo</b-badge>';
                $data[$i]['acciones']= '
            <div class="btn-group">
            <button class="btn btn-success mb-1 btn-sm" type="button" onclick="btnActivarProducto('.$data[$i]['Id_pro'].');"><i class="bi bi-person-arms-up"></i></button>
             </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar(){
        $codigo = $_POST["codigo"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        $color = $_POST["color"];
        $estilo = $_POST["estilo"];
        $cate = $_POST["cate"];
        $talla = $_POST["talla"];

        $id = $_POST["id"];

        if(empty($codigo) || empty($descripcion) || empty($precio) || empty($stock) || empty($color) || empty($estilo)|| empty($cate) || empty($talla)){
            $msg = "Todos los campos son obligatorios";
        }else{
            if($id == ""){
                        $data= $this->model->registrarProcucto($codigo, $descripcion, $precio, $stock, $color, $estilo , $cate, $talla);
                        if($data == "registro"){
                            $msg = "registro";
                        }else if ($data == "existe"){
                            $msg = "El producto ya existe";
                        }else{
                            $msg = "Error al registrar el producto";
                        } 
                }else{
                    $data= $this->model->modificarProducto($codigo, $descripcion, $precio, $stock, $color, $estilo , $cate, $talla, $id);
                        if($data == "modificado"){
                            $msg = "modificado";
                        }else{
                            $msg = "Error al actualizar el producto";
                        } 

                }
            }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id){
        $data= $this->model->editarProducto($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id){
        $data= $this->model->eli_act_Producto(0,$id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al eliminar el producto";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function activar(int $id){
        $data= $this->model->eli_act_Producto(1,$id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al activar el producto";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
