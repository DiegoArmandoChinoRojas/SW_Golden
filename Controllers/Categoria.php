<?php
class Categoria extends Controller
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
        $data= $this->model->getCategorias();
        for($i=0; $i<count($data);$i++){
            if($data[$i]["Estado"] == 1){
                $data[$i]["Estado"] = '<b-badge variant="success">Activo</b-badge>';
                $data[$i]['acciones']= '
            <div class="btn-group">
            <button class="btn btn-primary mb-1 btn-sm" type="button" onclick="btnEditarCategoria('.$data[$i]['Id_categoria'].');"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-danger mb-1 btn-sm" type="button" onclick="btnEliminarCategoria('.$data[$i]['Id_categoria'].');"><i class="bi bi-trash3-fill"></i></button></div>';
            }else{
                $data[$i]["Estado"] = '<b-badge variant="danger">Inactivo</b-badge>';
                $data[$i]['acciones']= '
            <div class="btn-group">
            <button class="btn btn-success mb-1 btn-sm" type="button" onclick="btnActivarCategoria('.$data[$i]['Id_categoria'].');"><i class="bi bi-person-arms-up"></i></button>
             </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar(){
        
        $descripcion = $_POST["descripcion"];
        $id = $_POST["id"];

        if(empty($descripcion)){
            $msg = "El campo es obligatorio";
        }else{
            if($id == ""){
                        $data= $this->model->registrarCategoria($descripcion);
                        if($data == "registro"){
                            $msg = "registro";
                        }else if ($data == "existe"){
                            $msg = "La categoría ya esta registrada";
                        }else{
                            $msg = "Error al registrar la categoría";
                        } 
                }else{
                    $data= $this->model->modificarCategoria($descripcion, $id);
                        if($data == "modificado"){
                            $msg = "modificado";
                        }else{
                            $msg = "Error al registrar la categoría";
                        } 

                }
            }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id){
        $data= $this->model->editarCategoria($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id){
        $data= $this->model->eli_act_Categoria(0,$id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al eliminar la Categoia";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function activar(int $id){
        $data= $this->model->eli_act_Categoria(1,$id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al activar la Categoia";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function salir(){
        session_destroy();
        header("location:".base_url);
    }
}
