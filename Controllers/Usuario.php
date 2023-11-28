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
        $this->view->mostrarView($this, "index");
    }
    public function listar(){
        $datos= $this->model->getUsuarios();
        for($i=0; $i<count($datos);$i++){
            $datos[$i]['accion']=  '<div>
            <button class="btn btn-primary mb-3" type="button">Editar</button>
            <button class="btn btn-danger mb-3" type="button">Eliminar</button>
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
                $_SESSION['Usuario'] = $data['Usuario'];
                $_SESSION['Contraseña'] = $data['Contraseña'];
                $msg = "Ok";
            }else{
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function agregar()
    {
        if (empty($_POST["dni"]) and empty($_POST["nombre"]) and empty($_POST["apellido"]) and empty($_POST["correo"]) and empty($_POST["telefono"]) and empty($_POST["dirección"])) {
            $msg = "Los campos están vacios";
        } else {
            $dni = $_POST["dni"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $correo = $_POST["correo"];
            $telefono = $_POST["telefono"];
            $dirección = $_POST["dirección"];
            $data = $this->model->AgregarUsuario($dni,$nombre,$apellido,$correo,$telefono,$dirección);
        }
        print_r($data);
        die();
    }
}
