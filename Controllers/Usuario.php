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
        $datos= $this->model->getUsuarios();
        for($i=0; $i<count($datos);$i++){
            $datos[$i]['accion']=  '<div>
            <button class="btn btn-primary mb-3" type="button">EDITAR</button>
            <button class="btn btn-danger mb-3" type="button">ELIMINAR</button>
            <div/>';
        }
        echo json_encode($datos, JSON_UNESCAPED_UNICODE);
        die();
    }

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

        if(empty($dni) || empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($clave) || empty($tipo)){
            $msg = "Todos los campos son obligatorios";
        }else if ($clave != $confirmar){
            $msg = "Las contraseñas no coinciden";
        }else{
            $data= $this->model->registrarUsuario($dni, $nombre, $apellido, $correo, $telefono, $clave,$tipo);
            if($data == "ok"){
                $msg = "Usuario registrado exitosamente!!";
            }else{
                $msg = "Error al registrar el usuario";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
