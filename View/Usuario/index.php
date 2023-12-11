<?php include "View/layout/principal.php"; ?>
<body>
    <div class="modelo">
        <div class="contenedor">
            <table id="tblUsuario" class="cell-border compact stripe order-column ">
                <thead> <h1 class="encabezado">Listado de Usuarios</h1>
                <button class="btn btn-primary" onclick="frmUsuario();" type="button"><i class="bi bi-plus-circle-fill"></i></button>
                    <tr>
                        <th class="bg-info bg-gradient">Id</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Editar / Eliminar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info bg-gradient">
                    <h5 class="title text-white" id="title">NUEVO USUARIO</h5>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmUsuario">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input id="dni" class="form-control" type="text" name="dni" placeholder="dni">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="nombre">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input id="apellido" class="form-control" type="text" name="apellido" placeholder="apellido">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input id="correo" class="form-control" type="text" name="correo" placeholder="correo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input id="telefono" class="form-control" type="text" name="telefono" placeholder="teléfono">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="claves">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contraseña">Contraseña</label>
                                    <input id="contraseña" class="form-control" type="password" name="contraseña" placeholder="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmar">Confirmar Contraseña</label>
                                    <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="password">
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
                        <div class="botones">
                        <button class="btn btn-primary" id="btnAccion" type="button" onclick="registrarUsuario(event);">REGISTRAR</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">CANCELAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script src="<?php echo base_url; ?>JS/popper.min.js"></script>

    <!--DataTables ES-->
    <script src="<?php echo base_url; ?>JS/languaje.js"></script>

    <!--formulario-->
    <script src="<?php echo base_url; ?>JS/bootstrap.bundle.min.js"></script>
</body>