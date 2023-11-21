<link rel="stylesheet" href="../Vista/css/index.css">
<?php
if(!empty($_POST["btnIngresar"])){
    if(empty($_POST["txtusuario"]) and empty($_POST["txtpass"])){
        echo "<p>Campos Vacios</p>";
    }else{
       $usuario=$_POST["txtusuario"];
       $password=$_POST["txtpass"];
       $sql=$conexion->query("Select * from vista_login where id_Usuario='$usuario' and Password='$password'");
       if($datos=$sql->fetch_object()){
            header("location:Vista/layout/principal.php");
       }else{
            echo "<p>Acceso Denegado</p>";
       }
    }
}
   
?>