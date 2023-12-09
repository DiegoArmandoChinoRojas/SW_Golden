<?php
class CategoriaModel extends Query
{
    private $descripcion, $estado, $id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getCategorias()
    {
        $sql = "SELECT * FROM categoria";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarCategoria(string $descripcion)
    {
        $this->descripcion =  $descripcion;
        $verificar = "SELECT * FROM categoria WHERE Nom_cate='$this->descripcion'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO categoria(Nom_cate) VALUES (?)";
            $datos = array($this->descripcion);
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
    public function modificarCategoria(string $descripcion, int $id)
    {
        $this->descripcion = $descripcion;
        $this->id = $id;

        $sql = "UPDATE categoria SET Nom_cate = ? WHERE Id_categoria= ?";
        $datos = array($this->descripcion, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function editarCategoria(int $id)
    {
        $sql = "SELECT * FROM categoria WHERE Id_categoria=$id";
        $data = $this->select($sql);
        return $data;
    }
    public function eli_act_Categoria(int $estado,int $id){
        $this->id=$id;
        $this->estado=$estado;
        $sql= "UPDATE categoria SET Estado= ? WHERE Id_categoria= ?";
        $datos= array($this->estado, $this->id);
        $data=$this->save($sql,$datos);
        return $data;
    }
}