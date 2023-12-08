<?php
class Usuario extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $data['tipo']=$this->model->getTipo();
        $this->view->mostrarView($this, "index",$data);
    }

    public function listar(){
        $data= $this->model->getUsuarios();
        for($i=0; $i<count($data);$i++){
            if($data[$i]["Estado"] == 1){
                $data[$i]["Estado"] = '<b-badge variant="success">Activo</b-badge>';
            }else{
                $data[$i]["Estado"] = '<b-badge variant="danger">Inactivo</b-badge>';
            }
            $data[$i]['acciones']= '<div>
            <button class="btn btn-primary mb-2 btn-in-block" type="button" onclick="btnEditarUsuario('.$data[$i]['Id_usu'].');">EDITAR</button>
            <button class="btn btn-danger mb-2" type="button" onclick="btnEliminarUsuario('.$data[$i]['Id_usu'].');">ELIMINAR</button>
            <button class="btn btn-success mb-2" type="button" onclick="btnActivarUsuario('.$data[$i]['Id_usu'].');">ACTIVAR</button>
            <div/>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Validación de datos LOGIN
    public function validar()
    {
        if (empty($_POST["usuario"]) and empty($_POST["clave"])) {
            $msg = "Los campos están vacios";
        } else {
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
            $data = $this->model->getUsuario($usuario, $clave);
            if ($data) {
                $_SESSION['Correo'] = $data['Correo'];
                $_SESSION['Contraseña'] = $data['Contraseña'];
                $msg = "Ok";
            }else{
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar(){
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $clave = $_POST["contraseña"];
        $confirmar = $_POST["confirmar"];
        $tipo = $_POST["tipo"];
        $id = $_POST["id"];
        // Encryptación de contraseña
        $hash= hash("SHA256", $clave);

        if(empty($dni) || empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($tipo)){
            $msg = "Todos los campos son obligatorios";
        }else{
            if($id == ""){
                if($clave != $confirmar){
                    $msg = "Las contraseñas no coinciden";
                    }else{
                        $data= $this->model->registrarUsuario($dni, $nombre, $apellido, $correo, $telefono, $hash,$tipo);
                        if($data == "registro"){
                            $msg = "registro";
                        }else if ($data == "existe"){
                            $msg = "El usuario ya esta registrado";
                        }else{
                            $msg = "Error al registrar el usuario";
                        } 
                    }
                }else{
                    $data= $this->model->modificarUsuario($dni, $nombre, $apellido, $correo, $telefono,$tipo, $id);
                        if($data == "modificado"){
                            $msg = "modificado";
                        }else{
                            $msg = "Error al registrar el usuario";
                        } 

                }
            }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id){
        $data= $this->model->editarUsuario($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id){
        $data= $this->model->eli_act_Usuario(0,$id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al eliminar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function activar(int $id){
        $data= $this->model->eli_act_Usuario(1,$id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al activar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}





