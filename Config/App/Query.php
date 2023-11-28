<?php
class Query extends Conexion{
    private $pdo, $con, $sql;
    public function __construct(){
        $this->pdo=new Conexion();
        $this->con=$this->pdo->conect();
    }
    public function select(string $sql)
    {
        $this->sql=$sql;
        $resul=$this->con->prepare($this->sql);
        $resul->execute();
        $datos=$resul->fetch(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function selectAll(string $sql)
    {
        $this->sql=$sql;
        $resul=$this->con->prepare($this->sql);
        $resul->execute();
        $datos=$resul->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
}
?>