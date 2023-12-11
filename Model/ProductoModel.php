<?php
class ProductoModel extends Query
{
    private $codigo, $descripcion,$precio,$stock, $color, $estilo, $categoria,$talla, $id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getProductos()
    {
        $sql = "SELECT p.*, c.Nom_cate,m.Descripcion FROM producto as p INNER JOIN categoria as c ON p.Id_cate=c.Id_categoria INNER JOIN medida as m ON p.Id_medida=m.Id_medida";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarProducto(string $codigo,  string $descripcion, int $precio, int $stock , string $color, string $estilo, string $categoria, string $talla)
    {
        $this->codigo =  $codigo;
        $this->descripcion =  $descripcion;
        $this->precio =  $precio;
        $this->stock =  $stock;
        $this->color =  $color;
        $this->estilo = $estilo;
        $this->categoria =  $categoria;
        $this->talla =  $talla;
        $verificar = "SELECT * FROM producto WHERE Cod_producto='$this->codigo'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO producto(Cod_producto, Detalle_pro, Precio_pro, Cantidad_pro, Color_pro, Estilo_pro, Id_cate, Id_medida) VALUES (?,?,?,?,?,?,?,?)";
            $datos = array($this->codigo, $this->descripcion, $this->precio,$this->stock, $this->color, $this->estilo, $this->categoria, $this->talla);
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
    public function modificarProducto(string $codigo,  string $descripcion, float $precio, int $stock , string $color, string $estilo, string $categoria, string $talla, int $id)
    {
        $this->codigo =  $codigo;
        $this->descripcion =  $descripcion;
        $this->precio =  $precio;
        $this->stock =  $stock;
        $this->color =  $color;
        $this->estilo = $estilo;
        $this->categoria =  $categoria;
        $this->talla =  $talla;
        $this->id = $id;
        $sql = "UPDATE producto SET Cod_producto= ?, Detalle_pro=?, Precio_pro=?, Cantidad_pro=?, Color_pro=?, Estilo_pro=?, Id_cate=?, Id_medida=? WHERE Id_pro= ?";
        $datos = array($this->codigo, $this->descripcion, $this->precio,$this->stock, $this->color, $this->estilo, $this->categoria, $this->talla, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function editarProducto(int $id)
    {
        $sql = "SELECT * FROM producto WHERE Id_pro=$id";
        $data = $this->select($sql);
        return $data;
    }
    public function eli_act_Producto(int $talla,int $id){
        $this->id=$id;
        $this->talla=$talla;
        $sql= "UPDATE usuario SET talla= ? WHERE Id_usu= ?";
        $datos= array($this->talla, $this->id);
        $data=$this->save($sql,$datos);
        return $data;
    }
}
