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
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        $data['tipo'] = $this->model->getTipo();
        $this->view->mostrarView($this, "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getUsuarios();
        for ($i = 0; $i < count($data); $i++) {
            if($data[$i]["Estado"] == 1){
                $data[$i]["Estado"] = '<b-badge variant="success">Activo</b-badge>';
                $data[$i]['acciones']= '<div class="btn-group">
            <button class="btn btn-primary btn-sm" type="button" onclick="btnEditarUsuario('.$data[$i]['Id_usu'].');"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-danger btn-sm" type="button" onclick="btnEliminarUsuario('.$data[$i]['Id_usu'].');"><i class="bi bi-trash3-fill"></i></button>
            </div>';
            }else{
                $data[$i]["Estado"] = '<b-badge variant="danger">Inactivo</b-badge>';
                $data[$i]['acciones']= '<div class="btn-group">
            <button class="btn btn-success mb-2" type="button" onclick="btnActivarUsuario('.$data[$i]['Id_usu'].');"><i class="bi bi-person-arms-up"></i></button>
            </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }         
    // Validación de datos LOGIN
    public function validar()
    {
        $correo = $_POST["usuario"];
        $clave = $_POST["clave"];
        // Encryptación de contraseña
        //$hash= hash("SHA256", $clave);
        if (empty($correo) || empty($clave)) {
            $msg = "Usuario o contraseña no ingresado";
        } else {
            $data = $this->model->getUsuario($correo, $clave);
            if ($data) {
                $_SESSION['Id_usu'] = $data['Id_usu'];
                $_SESSION['nombre'] = $data['Nom_usu'];
                $_SESSION['activo'] = true;
                $msg = "valido";
            } else {
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
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
        //$hash= hash("SHA256", $clave);

        if (empty($dni) || empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($tipo)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            if ($id == "") {
                if ($clave != $confirmar) {
                    $msg = "Las contraseñas no coinciden";
                } else {
                    $data = $this->model->registrarUsuario($dni, $nombre, $apellido, $correo, $telefono, $clave, $tipo);
                    if ($data == "registro") {
                        $msg = "registro";
                    } else if ($data == "existe") {
                        $msg = "El usuario ya esta registrado";
                    } else {
                        $msg = "Error al registrar el usuario";
                    }
                }
            } else {
                $data = $this->model->modificarUsuario($dni, $nombre, $apellido, $correo, $telefono, $tipo, $id);
                if ($data == "modificado") {
                    $msg = "modificado";
                } else {
                    $msg = "Error al registrar el usuario";
                }
            }
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        $data = $this->model->editarUsuario($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
        $data = $this->model->eli_act_Usuario(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function activar(int $id)
    {
        $data = $this->model->eli_act_Usuario(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al activar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function salir()
    {
        session_destroy();
        header("location:" . base_url);
    }
}
