<?php include "View/layout/principal.php"; ?>
<body>
    <div class="modelo">
        <div class="contenedor">
            <table id="tblCliente" class="cell-border compact stripe order-column ">
                <thead> <h1 class="encabezado">Listado de Clientes</h1>
                <button class="btn btn-primary" onclick="frmCliente();" type="button"><i class="bi bi-plus-circle-fill"></i></button>
                    <tr >
                        <th class="bg-info bg-gradient">Id</th>
                        <th>RUC</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                        <th>Editar / Eliminar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary bg-gradient">
                    <h5 class="title text-white" id="title">NUEVO CLIENTE</h5>
                </div>
                <p class="title" id="title" style="background-color:#15798F; color:#fff; ">Para correos solo @gmail.com | @hotmail.com | @outlook.com</p>
                <div class="modal-body">
                    <form method="post" id="frmCliente">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="ruc">RUC</label>
                            <input id="ruc" class="form-control" type="text" name="ruc" placeholder="RUC">
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
                                    <input id="telefono" class="form-control" type="text" name="telefono" placeholder="telefono">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea id="direccion" class="form-control" type="text" name="direccion" placeholder="dirección"></textarea>
                        </div>
                        <div class="botones">
                            <button class="btn btn-primary" id="btnAccion" type="button" onclick="registrarCliente(event);">REGISTRAR</button>
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
    <!--formulario-->
    <script src="<?php echo base_url; ?>JS/bootstrap.bundle.min.js"></script>
</body>