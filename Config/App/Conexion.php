<?php
class Conexion{
    /**
     * Conexion a la base de datos
     * @return PDO / conexión
     */
    private $conexion;
    public function __construct()
    {
        $pdo="mysql:host=".host.";dbname=".db.";.charset.";
        try {
            $this->conexion = new PDO($pdo, user, pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexión".$e->getMessage();
        }
    }
    public function conect()
    {
        return $this->conexion;
    }
}

