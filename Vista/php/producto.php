<?php require('../layout/principal.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/producto.css">
    <title>Producto</title>
</head>
<body>
<div class="contenedor_formulario">
    <form class="formulario" method="post">
        <div class="contenido">
            <div id="input">
                <label>Id Producto : </label>
                <input id="ingreso" type="text" name="txtid_pro">
            </div>
            <div id="input">
                <label>Descripción : </label>
                <input id="ingreso" type="text" name="txtdesc_pro">
            </div>
            <div id="input">
                <label>Cantidad : </label>
                <input id="ingreso" type="text" name="txtcant_pro">
            </div>
            <div id="input">
                <label>Color : </label>
                <input id="ingreso" type="text" name="txtcolor_pro">
            </div>
            <div id="input">
                <label>Estilo : </label>
                <input id="ingreso" type="text" name="txtestilo_pro">
            </div>
            <div id="input">
                <label>Precio : </label>
                <input id="ingreso" type="text" name="txtprecio_pro">
            </div>
        </div>
        <div class="submit">
            <input type="submit" name="btnBuscar" value="BUSCAR">
            <input type="submit" name="btnRegistrar" value="REGISTRAR">
            <input type="submit" name="btnActualizar" value="ACTUALIZAR">
            <input type="submit" name="btnEliminar" value="ELIMINAR">
        </div>
        <table class="tabla">
            <tr >
                <td for=" ">Id Producto</td>
                <td for=" ">Descripción</td>
                <td for=" ">Cantidad</td>
                <td for=" ">Color</td>
                <td for=" ">Estilo</td>
                <td for=" ">Precio</td>
            </tr>
            <tr>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
            </tr>
        </table>
        <?php
                include("../../Config/conexion_bd.php");
                include("../../Config/controller.php");
                include("../../Config/producto_controller.php")
                ?>
    </form>
</div>
</body>
</html>




