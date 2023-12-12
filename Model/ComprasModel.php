<?php
class ComprasModel extends Query
{
    private $codigoc,$descripcion, $estado, $id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getProCod(string $cod){
        $sql = "SELECT * FROM producto WHERE Cod_producto= '$cod'";
        $data = $this->select($sql);
        return $data;
    }
}