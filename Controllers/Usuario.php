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
    public function validar()
    {
        if (empty($_POST["usuario"]) and empty($_POST["clave"])) {
            $msg = "Los campos están vacios";
        } else {
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
            $data = $this->model->getUsuario($usuario, $clave);
            if ($data) {
                $_SESSION['Id'] = $data['Id_usu'];
                $_SESSION['Dni'] = $data['Dni_usu'];
                $_SESSION['Correo'] = $data['Correo'];
                $msg = "Ok";
            }else{
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
