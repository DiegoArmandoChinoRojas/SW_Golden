<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/principal.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/contenido.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/b-2.4.2/datatables.min.css" rel="stylesheet">
    <title>SISTEMA GOLDEN</title>
</head>
<body>
<div class="portada"></div>
<div class="container-menu">
    <div class="cont-menu">
        <div class="imagen"></div>
            <nav class="menu">
                <a href="<?php echo base_url ?>Usuario"><i class="bi bi-people-fill"></i>Usuarios</a>
                <a href="<?php echo base_url ?>Cliente"><i class="bi bi-person-fill"></i>Gestión Cliente</a>
                <a href=""><i class="bi bi-hexagon-half"></i>Categoria Producto</a>
                <a href=""><i class="bi bi-cup-hot-fill"></i>Gestión Producto</a>
                <a href=""><i class="bi bi-person-standing"></i></i>Proveedor</a>
                <a href=""><i class="bi bi-bag-fill"></i>Nueva Venta</a>
                <a href=""><i class="bi bi-card-checklist"></i>Gestión Venta</a>
                <a href="<?php echo base_url; ?>Usuario/salir"><i class="bi bi-box-arrow-left"></i>Logout</a>
            </nav>
    </div>
</div>
<script>
    const base_url = "<?php echo base_url; ?>";
</script>
<script src="<?php echo base_url; ?>JS/funciones.js"></script>
<script src="<?php echo base_url; ?>JS/jquery-3.7.1.min.js"></script>
<script src="<?php echo base_url; ?>JS/jquery.min.js" ></script>
<script src="<?php echo base_url; ?>JS/sweetalert2.all.min.js"></script>
</body>
</html>