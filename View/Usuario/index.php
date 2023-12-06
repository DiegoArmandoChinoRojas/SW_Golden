<?php include "View/layout/principal.php"; ?>

<head>
    <title>PRINCIPAL</title>
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/contenido.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="modelo">
        <div class="contenedor">
            <table class="tb" id="tblUsuario">
                <button class="btn btn-primary mb-2" onclick="frmUsuario();" type="button">REGISTRAR</button>
                <thead class="contenido">
                    <tr>
                        <th>Id</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Tipo</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title" id="my-modal-title">NUEVO USUARIO</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmUsuario">
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input id="dni" class="form-control" type="text" name="dni">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input id="apellido" class="form-control" type="text" name="apellido">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input id="correo" class="form-control" type="text" name="correo">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input id="telefono" class="form-control" type="text" name="telefono">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input id="direccion" class="form-control" type="text" name="direccion">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contraseña">Contraseña</label>
                                    <input id="contraseña" class="form-control" type="password" name="contraseña">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmar">Confirmar Contraseña</label>
                                    <input id="confirmar" class="form-control" type="password" name="confirmar">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <select id="tipo" class="form-control" name="tipo">
                                <?php foreach ($data['tipo'] as $row) { ?>
                                    <option value="<?php echo $row['Id_tipo_usu']; ?>"><?php echo $row['Desc_tipo_usu'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="button" onclick="registrarUsuario(event);">REGISTRAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    const base_url = "<?php echo base_url; ?>";
</script>
<script src="<?php echo base_url; ?>JS/funciones.js"></script>
<script src="<?php echo base_url; ?>JS/jszip.min.js"></script>
<script src="<?php echo base_url; ?>JS/pdfmake.min.js"></script>
<script src="<?php echo base_url; ?>JS/vfs_fonts.js"></script>
<script src="<?php echo base_url; ?>JS/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url; ?>JS/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url; ?>JS/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url; ?>JS/buttons.bootstrap5.min.js"></script>
<script src="<?php echo base_url; ?>JS/buttons.colVis.min.js"></script>
<script src="<?php echo base_url; ?>JS/buttons.html5.min.js"></script>
<script src="<?php echo base_url; ?>JS/buttons.print.min.js"></script>
<script src="<?php echo base_url; ?>JS/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="<?php echo base_url; ?>JSON/es-ES.json"></script>


</body>
