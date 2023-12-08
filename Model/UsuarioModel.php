<?php
class UsuarioModel extends Query
{
    private $nombre, $apellido, $correo, $clave, $dni, $telefono, $tipo, $id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getUsuario(string $usuario, string $clave)
    {
        $sql = "SELECT * FROM vista_login WHERE Correo='$usuario' and Contraseña='$clave'";
        $data = $this->select($sql);
        return $data;
    }
    public function getUsuarios()
    {
        $sql = "SELECT u.*, tu.Id_tipo_usu, tu.Desc_tipo_usu FROM usuario as u INNER JOIN tipo_usuario as tu where tu.Id_tipo_usu=u.Id_tipo_usu";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getTipo()
    {
        $sql = "SELECT * FROM tipo_usuario";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarUsuario(int $dni, string $nombre, string $apellido, string $correo, int $telefono, string $clave, int $tipo)
    {
        $this->dni =  $dni;
        $this->nombre =  $nombre;
        $this->apellido =  $apellido;
        $this->correo =  $correo;
        $this->telefono =  $telefono;
        $this->clave = $clave;
        $this->tipo =  $tipo;
        $verificar = "SELECT * FROM usuario WHERE Correo='$this->correo'";
        $verificar1 = "SELECT * FROM usuario WHERE Dni_usu='$this->dni'";
        $existe = $this->select($verificar);
        $existe1 = $this->select($verificar1);
        if (empty($existe) and empty($existe1)) {
            $sql = "INSERT INTO usuario(Dni_usu, Nom_usu, Ape_usu, Correo, Telefono, Contraseña, Id_tipo_usu) VALUES (?,?,?,?,?,?,?)";
            $datos = array($this->dni, $this->nombre, $this->apellido, $this->correo, $this->telefono, $this->clave, $this->tipo);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "registro";
            } else {
                $res = "error";
            }
        } else {
            $res = "existe";
        }
        return $res;
    }
    public function modificarUsuario(int $dni, string $nombre, string $apellido, string $correo, int $telefono, string $tipo, int $id)
    {
        $this->dni =  $dni;
        $this->nombre =  $nombre;
        $this->apellido =  $apellido;
        $this->correo =  $correo;
        $this->telefono =  $telefono;
        $this->tipo =  $tipo;
        $this->id = $id;
        $sql = "UPDATE usuario SET Dni_usu = ?, Nom_usu = ?, Ape_usu = ?, Correo = ?, Telefono = ?, Id_tipo_usu = ? WHERE Id_usu= ?";
        $datos = array($this->dni, $this->nombre, $this->apellido, $this->correo, $this->telefono,$this->tipo, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function editarUsuario(int $id)
    {
        $sql = "SELECT * FROM usuario WHERE Id_usu=$id";
        $data = $this->select($sql);
        return $data;
    }
}

