<link rel="stylesheet" href="../Vista/css/index.css">
<?php

if(!empty($_POST["btnIngresar"])){
    if(empty($_POST["txtusuario"]) and empty($_POST["txtpassword"])){
        echo "<p>Campos Vacios</p>";
    }else{
       $usuario=$_POST["txtusuario"];
       $password=$_POST["txtpassword"];
       $sql=$conexion->query("Select * from usuario where id_usuario='$usuario' and password_usuario='$password'");
       if($datos=$sql->fetch_object()){
            header("location:Vista/layout/principal.php");
       }else{
            echo "<p>Acceso Denegado</p>";
       }
    }
}
   
?>