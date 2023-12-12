<?php
class ComprasModel extends Query
{
    private $codigoc, $descripcion, $estado, $id, $cantidad, $precio, $total, $id_producto, $id_usuario;

    public function __construct()
    {
        parent::__construct();
    }
    public function getProCod(string $cod)
    {
        $sql = "SELECT * FROM producto WHERE Cod_producto= '$cod'";
        $data = $this->select($sql);
        return $data;
    }
    public function getProductos(int $id)
    {
        $sql = "SELECT * FROM producto WHERE Id_pro= '$id'";
        $data = $this->select($sql);
        return $data;
    }
    public function getPagos(int $id)
    {
        $sql = "SELECT * FROM metodo_pago WHERE Id_metodo_pago= '$id'";
        $data = $this->select($sql);
        print_r($data);
    }
    public function registrarDetalle(int $cantidad, float $precio, float $total, int $id_usuario, int $id_producto)
    {
        $sql = "INSERT INTO detalle(Cantidad, Precio, Total, Id_usuario, Id_producto) VALUES (?,?,?,?,?)";
        $datos = array($cantidad, $precio, $total, $id_usuario, $id_producto);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getDetalles(int $id)
    {
        $sql = "SELECT d.*, p.Id_pro, p.Detalle_pro FROM detalle as d INNER JOIN producto as p ON p.Id_pro=d.Id_producto WHERE d.Id_usu=$id";
        $data = $this->selectAll($sql);
        return  $data;
    }
}
