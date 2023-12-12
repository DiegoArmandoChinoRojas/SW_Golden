<?php
class Producto extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        // ENTRADA Y ENVIO DE DATOS X TABLA
        $data['medidas'] = $this->model->getTallas();
        $data['categorias'] = $this->model->getCategorias();
        $data['colores'] = $this->model->getColores();
        $data['estilos'] = $this->model->getEstilos();

        $this->view->mostrarView($this, "index", $data);
    }

    public function listar(){
        $data= $this->model->getProductos();
        for($i=0; $i<count($data);$i++){
            if($data[$i]["Estado"] == 1){
                $data[$i]["Estado"] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['acciones']= '
            <div class="btn-group">
            <button class="btn btn-primary btn-sm" type="button" onclick="btnEditarProducto('.$data[$i]['Id_pro'].');"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-danger btn-sm" type="button" onclick="btnEliminarProducto('.$data[$i]['Id_pro'].');"><i class="bi bi-trash3-fill"></i></button></div>';
            }else{
                $data[$i]["Estado"] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones']= '<div class="btn-group">
            <button class="btn btn-success mb-1 btn-sm" type="button" onclick="btnActivarProducto('.$data[$i]['Id_pro'].');"><i class="bi bi-person-arms-up"></i></button>
             </div>';
            }
            if($data[$i]["Cantidad_pro"] >=10 and $data[$i]["Cantidad_pro"]<=50){
                $data[$i]["Cantidad_pro"] = '<span class="badge bg-warning">Revisar Stock</span>';
            }
            if($data[$i]["Cantidad_pro"] <10){
                $data[$i]["Cantidad_pro"] = '<span class="badge bg-danger">Menor a 10</span>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar(){
        $codigop = $_POST["codigop"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        $color = $_POST["color"];
        $estilo = $_POST["estilo"];
        $categoria = $_POST["categoria"];
        $talla = $_POST["talla"];

        $id = $_POST["id"];

        if(empty($codigop) || empty($descripcion) || empty($precio) || empty($stock)){
            $msg = "Todos los campos son obligatorios";
        }else{
            if($id == ""){
                        $data= $this->model->registrarProducto($codigop,  $descripcion,  $precio,  $stock ,  $categoria,  $talla,  $color, $estilo);
                        if($data == "registro"){
                            $msg = "registro";
                        }else if ($data == "existe"){
                            $msg = "El producto ya existe";
                        }else{
                            $msg = "Error al registrar el producto";
                        } 
                }else{
                    $data= $this->model->modificarProducto($codigop,  $descripcion,  $precio,  $stock ,  $categoria,  $talla,  $color, $estilo, $id);
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
