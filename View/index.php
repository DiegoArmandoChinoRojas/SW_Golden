<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA GOLDEN</title>
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="contenedor-formulario contenedor">
        <div class="imagen">
            <h3 class="entrada">Bienvenido al sistema de ventas</h3>
        </div>
        <form class="formulario" id="frmLogin">
            <div class="texto">
                <h1>LOGIN SISTEMA DE VENTA</h1>
            </div>
            <div id="input">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder=" Ingrese su usuario">
            </div>
            <div id="input">
                <label for="clave">Contraseña</label>
                <input type="text" id="clave" name="clave" placeholder="Ingrese su contraseña">
            </div>
            <div id="alerta" style="margin-top: 20px; text-align:center;background-color: rgba(255, 0, 0, 0.479);font-size: 25px; font-family: 'Dancing Script', cursive;color: #fff;"></div>
            <div class="submit">
                <button id="btn" type="submit" onclick="frmLogin(event);">INGRESAR</button>
            </div>
        </form>
    </div>
    <script src="<?php echo base_url; ?>JS/funciones.js"></script>
    <script>
        const base_url = "<?php echo base_url; ?>";
    </script>
</body>

</html>