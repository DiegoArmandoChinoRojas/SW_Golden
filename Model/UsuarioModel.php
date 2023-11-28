<?php
class UsuarioModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }
    public function getUsuario(string $usuario, string $clave){
        $sql= "SELECT * FROM vista_login WHERE Usuario='$usuario' and Contraseña='$clave'";
        $data= $this->select($sql);
        return $data;   
    }
    public function getUsuarios(){
        $sql= "SELECT * FROM usuario";
        $datos= $this->selectAll($sql);
        return $datos; 
    }
    public function AgregarUsuario($dni,$nombre,$apellido,$correo,$telefono,$dirección){
        $sql= "INSERT INTO `usuario`(`Dni_usu`, `Nom_Usu`, `Ape_Usu`, `Correo`, `Telefono`, `Dirección`) VALUES ('$dni','$nombre','$apellido','$correo','$telefono','$dirección')";
        $data= $this->select($sql);
        return $data; 
    }
}
?>