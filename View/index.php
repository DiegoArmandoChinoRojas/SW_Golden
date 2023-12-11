<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA GOLDEN</title>
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url; ?>Assets/img/icon/icon.png"">
</head>
<body>
    <div class=" contenedor-formulario contenedor">
    <div class="imagen">
        <h3 class="entrada">Bienvenido al sistema de ventas</h3>
    </div>
    <form class="formulario" id="frmLogin">
        <div class="texto">
            <h1>Acceso al sistema</h1>
        </div>
        <div id="input">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" placeholder=" Ingrese su usuario">
        </div>
        <label for="clave">Contraseña</label>
        <div class="password-container">
            <input type="password" id="clave" name="clave" placeholder="Ingrese su contraseña">
            <span id="togglePassword" onclick="togglePasswordVisibility()">
                👁️
            </span>
        </div>
        <div id="alerta" style="margin-top: 20px; text-align:center;background-color: rgba(255, 0, 0, 0.479);font-size: 25px; font-family: 'Dancing Script', cursive;color: #fff;"></div>
        <div class="submit">
            <button id="btn" type="submit" onclick="frmLogin(event);">INGRESAR</button>
        </div>
    </form>
    </div>
    <script src="<?php echo base_url; ?>JS/login.js"></script>
    <script>
        const base_url = "<?php echo base_url; ?>";

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('clave');
            const toggleIcon = document.getElementById('togglePassword');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '👁️';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }
    </script>
    </body>

</html>