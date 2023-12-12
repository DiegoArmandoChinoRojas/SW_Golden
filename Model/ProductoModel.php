<?php
class ProductoModel extends Query
{
    private $codigop,  $descripcion, $precio, $stock , $estilo, $categoria, $talla, $color, $estado, $id;

    public function __construct()
    {
        parent::__construct();
    }

    // METODOS PARA UNIR DATOS
    public function getTallas()
    {
        $sql = "SELECT * FROM medida";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getColores()
    {
        $sql = "SELECT * FROM color";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getCategorias()
    {
        $sql = "SELECT * FROM categoria WHERE Estado=1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getEstilos()
    {
        $sql = "SELECT * FROM estilo";
        $data = $this->selectAll($sql);
        return $data;
    }

    // UNION DE TABLAS
    public function getProductos()
    {
        $sql = "SELECT p.*, ct.Nom_cate,m.Descripcion,c.Detalle_color, e.Detalle_estilo FROM producto as p INNER JOIN categoria as ct ON p.Id_cate=ct.Id_categoria INNER JOIN medida as m ON p.Id_medida=m.Id_medida INNER JOIN color as c ON c.Id_color=p.Id_color INNER JOIN estilo as e ON p.Id_estilo=e.Id_estilo";
        $data = $this->selectAll($sql);
        return $data;
    }

    // FIN DE CAPTURAS

    // INICIO DEL PROCESO
    public function registrarProducto( string $codigop, string $descripcion, float $precio, int $stock , string $categoria, string $talla, string $color, string $estilo)
    {
        $this->codigop =  $codigop;
        $this->descripcion =  $descripcion;
        $this->precio =  $precio;
        $this->stock =  $stock;
        $this->estilo = $estilo;
        $this->categoria =  $categoria;
        $this->talla =  $talla;
        $this->color =  $color;
        $verificar = "SELECT * FROM producto WHERE Cod_producto='$this->codigop'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO producto(Cod_producto, Detalle_pro, Precio_pro, Cantidad_pro,Id_cate, Id_medida, Id_color, Id_Estilo) VALUES (?,?,?,?,?,?,?,?)";
            $datos = array($this->codigop, $this->descripcion, $this->precio, $this->stock, $this->categoria, $this->talla, $this->color,$this->estilo);
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
    public function modificarProducto( string $codigop, string $descripcion, float $precio, int $stock ,  string $categoria,  string $talla, string $color, string $estilo, int $id)
    {
        $this->codigop =  $codigop;
        $this->descripcion =  $descripcion;
        $this->precio =  $precio;
        $this->stock =  $stock;
        $this->estilo = $estilo;
        $this->categoria =  $categoria;
        $this->talla =  $talla;
        $this->color =  $color;

        $this->id = $id;

        $sql = "UPDATE producto SET Cod_producto = ?, Detalle_pro = ? , Precio_pro = ?, Cantidad_pro = ?, Id_cate= ?, Id_medida = ?, Id_color = ?, Id_estilo = ? WHERE Id_pro = ?";
        $datos = array($this->codigop, $this->descripcion, $this->precio, $this->stock, $this->categoria, $this->talla, $this->color,$this->estilo, $this->id);
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
    public function eli_act_Producto(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE producto SET Estado= ? WHERE Id_pro= ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
