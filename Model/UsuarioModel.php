<?php
class UsuarioModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }
    public function getUsuario(string $usuario, string $clave){
        $sql= "select * from usuario where Nom_usu='$usuario' and Ape_usu='$clave'";
        $data= $this->select($sql);
        return $data;   
    }
}
?>