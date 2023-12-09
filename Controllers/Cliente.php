<?php
class Cliente extends Controller
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
        $data= $this->model->getClientes();
        for($i=0; $i<count($data);$i++){
            if($data[$i]["Estado"] == 1){
                $data[$i]["Estado"] = '<b-badge variant="success">Activo</b-badge>';
                $data[$i]['acciones']= '
            <div class="btn-group">
            <button class="btn btn-primary mb-1 btn-sm" type="button" onclick="btnEditarCliente('.$data[$i]['Id_cliente'].');"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-danger mb-1 btn-sm" type="button" onclick="btnEliminarCliente('.$data[$i]['Id_cliente'].');"><i class="bi bi-trash3-fill"></i></button></div>';
            }else{
                $data[$i]["Estado"] = '<b-badge variant="danger">Inactivo</b-badge>';
                $data[$i]['acciones']= '
            <div class="btn-group">
            <button class="btn btn-success mb-1 btn-sm" type="button" onclick="btnActivarCliente('.$data[$i]['Id_cliente'].');"><i class="bi bi-person-arms-up"></i></button>
             </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar(){
        $ruc = $_POST["ruc"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $id = $_POST["id"];
        // Encryptación de contraseña
        //$hash= hash("SHA256", $clave);

        if(empty($ruc) || empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($direccion)){
            $msg = "Todos los campos son obligatorios";
        }else{
            if($id == ""){
                        $data= $this->model->registrarCliente($ruc, $nombre, $apellido, $correo, $telefono, $direccion);
                        if($data == "registro"){
                            $msg = "registro";
                        }else if ($data == "existe"){
                            $msg = "El cliente ya esta registrado";
                        }else{
                            $msg = "Error al registrar el cliente";
                        } 
                }else{
                    $data= $this->model->modificarCliente($ruc, $nombre, $apellido, $correo, $telefono,$direccion, $id);
                        if($data == "modificado"){
                            $msg = "modificado";
                        }else{
                            $msg = "Error al registrar al cliente";
                        } 

                }
            }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id){
        $data= $this->model->editarCliente($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id){
        $data= $this->model->eli_act_Cliente(0,$id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al eliminar el cliente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function activar(int $id){
        $data= $this->model->eli_act_Cliente(1,$id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al activar el cliente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function salir(){
        session_destroy();
        header("location:".base_url);
    }
}
