<?php
class ClienteModel extends Query
{
    private $ruc,$nombre, $apellido, $correo, $telefono, $direccion, $estado, $id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getClientes()
    {
        $sql = "SELECT * FROM cliente";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarCliente(int $ruc, string $nombre, string $apellido, string $correo, int $telefono, string $direccion)
    {
        $this->ruc =  $ruc;
        $this->nombre =  $nombre;
        $this->apellido =  $apellido;
        $this->correo =  $correo;
        $this->telefono =  $telefono;
        $this->direccion = $direccion;
        $verificar = "SELECT * FROM cliente WHERE RUC='$this->ruc'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO cliente(RUC, Nom_usu, Ape_usu, Correo, Telefono, Dirección) VALUES (?,?,?,?,?,?)";
            $datos = array($this->ruc, $this->nombre, $this->apellido, $this->correo, $this->telefono, $this->direccion);
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
    public function modificarCliente(int $ruc, string $nombre, string $apellido, string $correo, int $telefono,string $direccion, int $id)
    {
        $this->ruc =  $ruc;
        $this->nombre =  $nombre;
        $this->apellido =  $apellido;
        $this->correo =  $correo;
        $this->telefono =  $telefono;
        $this->direccion =  $direccion;
        $this->id = $id;

        $sql = "UPDATE cliente SET RUC = ?, Nom_usu = ?, Ape_usu = ?, Correo = ?, Telefono = ?, Dirección = ? WHERE Id_cliente= ?";
        $datos = array($this->ruc, $this->nombre, $this->apellido, $this->correo, $this->telefono,$this->direccion, $this->id);
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
    public function eli_act_Usuario(int $estado,int $id){
        $this->id=$id;
        $this->estado=$estado;
        $sql= "UPDATE usuario SET Estado= ? WHERE Id_usu= ?";
        $datos= array($this->estado, $this->id);
        $data=$this->save($sql,$datos);
        return $data;
    }
}