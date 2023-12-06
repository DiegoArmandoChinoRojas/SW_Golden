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
                $_SESSION['Usuario'] = $data['Correo'];
                $_SESSION['Contraseña'] = $data['Pass_emp'];
                $msg = "Ok";
            }else{
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar(){
        print_r($_POST);
    }
}
