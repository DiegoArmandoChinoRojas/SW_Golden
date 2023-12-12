<?php
class CategoriaModel extends Query
{
    private $codigoc,$descripcion, $estado, $id;

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
    public function getMedidas()
    {
        $sql = "SELECT * FROM medida";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarCategoria(string $codigoc, string $descripcion)
    {
        $this->codigoc= $codigoc;
        $this->descripcion =  $descripcion;
        $verificar = "SELECT * FROM categoria WHERE Nom_cate='$this->descripcion'";
        $verificar1 = "SELECT * FROM categoria WHERE Cod_categoria='$this->codigoc'";
       
        $existe = $this->select($verificar);
        $existe1 = $this->select($verificar1);

        if (empty($existe) and empty($existe1)) {
            $sql = "INSERT INTO categoria(Cod_categoria,Nom_cate) VALUES (?,?)";
            $datos = array($this->codigoc,$this->descripcion);
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
    public function modificarCategoria(string $codigoc, string $descripcion, int $id)
    {
        $this->codigoc=$codigoc;
        $this->descripcion = $descripcion;

        $this->id = $id;

        $sql = "UPDATE categoria SET Cod_categoria = ? , Nom_cate = ? WHERE Id_categoria = ?";
        $datos = array($this->codigoc,$this->descripcion, $this->id);
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