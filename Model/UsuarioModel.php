<?php
class UsuarioModel extends Query
{
    private $dni,$nombre,$apellido,$correo,$telefono,$tipo;
    public function __construct()
    {
        parent::__construct();
    }
    public function getUsuario(string $usuario, string $clave)
    {
        $sql = "SELECT * FROM vista_login WHERE Correo='$usuario' and Pass_emp='$clave'";
        $data = $this->select($sql);
        return $data;
    }
    public function getUsuarios()
    {
        $sql = "SELECT u.*, tu.Id_tipo_usu, tu.Desc_tipo_usu FROM usuario as u INNER JOIN tipo_usuario as tu where tu.Id_tipo_usu=u.Id_tipo_usu";
        $datos = $this->selectAll($sql);
        return $datos;
    }
    public function getTipo()
    {
        $sql = "SELECT * FROM tipo_usuario where Id_tipo_usu=1 or Id_tipo_usu=2";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarUsuario(int $dni, string $nombre, string $apellido, string $correo, int $telefono, string $tipo){
        $this->dni =  $dni;
        $this->nombre =  $nombre;
        $this->apellido =  $apellido;
        $this->correo =  $correo;
        $this->telefono =  $telefono;
        $this->tipo =  $tipo;
        $sql= "INSERT INTO usuario(Dni_usu,Nom_usu,Ape_usu,Correo,Telefono,Id_tipo_usu) VALUES (?,?,?,?,?,?)";
        $datos= array($this->dni,$this->nombre,$this->apellido,$this->correo,$this->telefono,$this->tipo);
        $data=$this->save($sql, $datos);
        if($data==1){
            $res= "ok";
        }else{
            $res= "ERROR";
        }
        return $res;
    }
}
