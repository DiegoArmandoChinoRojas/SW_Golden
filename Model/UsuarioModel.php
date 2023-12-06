<?php
class UsuarioModel extends Query
{
    private $nombre,$apellido,$correo,$clave,$dni,$telefono,$tipo;

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
    public function registrarUsuario(int $dni, string $nombre, string $apellido, string $correo, int $telefono, string $clave , int $tipo){
        $this->dni =  $dni;
        $this->nombre =  $nombre;
        $this->apellido =  $apellido;
        $this->correo =  $correo;
        $this->telefono =  $telefono;
        $this->clave = $clave;
        $this->tipo =  $tipo;
        $verificar = "SELECT * FROM usuario WHERE Correo= '$this->correo'";
        $existe = $this->select($verificar);
        if(empty($existe)){
            $sql= "INSERT INTO usuario(Dni_usu, Nom_usu, Ape_usu, Correo, Telefono, Contraseña, Id_tipo_usu) VALUES (?,?,?,?,?,?,?)";
            $datos= array($this->dni,$this->nombre,$this->apellido,$this->correo,$this->telefono,$this->clave,$this->tipo);
            $data=$this->save($sql, $datos);
            if($data==1){
                $res= "ok";
            }else{
                $res= "ERROR";
            }
        }else{
            $res = "existe";
        }
        
        return $res;
    }
    // Capturar Id de usuario como Id_editar
    public function editarUsuario(int $id){
        $sql= "SELECT * FROM usuario WHERE Id_usu=$id";
        $data= $this->select($sql);
        return $data;
    }

}
?>
