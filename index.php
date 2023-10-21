<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACESSO SW-GOLDEN</title>
    <link rel="stylesheet" href="Vista/css/index.css">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="contenedor-formulario contenedor">
            <div class="imagen"> <h3 class="entrada">Bienvenido al sistema de ventas</h3></div>
        <form class="formulario" method="post">
            <div class="texto">
                <h1>LOGIN SISTEMA DE VENTA</h1>
            </div>
            <div id="input">
            <label for="usuario">Usuario</label>
            <input type="text" name="txtusuario" placeholder=" Ingrese su usuario">
            </div>
            <div id="input">
            <label for="contraseña">Contraseña</label>
            <input type="password" name="txtpassword" placeholder="Ingrese su contraseña">
            </div>
            <div class="submit">
            <input type="submit" id="btn"name="btnIngresar" value="INGRESAR">
            </div>
            <?php
                include("Config/conexion_bd.php");
                include("Config/controller.php");
                ?>
        </form>
    </div>
</body>
</html>