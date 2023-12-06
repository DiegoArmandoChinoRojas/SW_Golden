<?php
class Query extends Conexion{
    private $pdo, $con, $sql, $datos;
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
    public function save(string $sql, array $datos)
    {
        $this->sql=$sql;
        $this->datos=$datos;
        $insert =$this->con->prepare($this->sql);
        $data=$insert->execute($this->datos);
        if($data){
            $res= 1;
        }else{
            $res= 0;
        }
        return $res;
}
}
?>