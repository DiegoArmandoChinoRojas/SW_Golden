<?php include "View/layout/principal.php"; ?>

<body>
    <div class="modelo1">
        <div class="contenedor1">
            <table id="tblCategoria" class="cell-border compact stripe order-column ">
                <thead> <h1 class="encabezado">Listado de Categorías</h1>
                <button class="btn btn-primary" onclick="frmCategoria();" type="button"><i class="bi bi-plus-circle-fill"></i></button>
                    <tr>
                        <th class="bg-info bg-gradient">Id</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Editar / Eliminar</th>
                    </tr>
                </thead>
            </table>
            <h1 class="encabezado">Listado de Tallas</h1>
        </div>
        <div class="contenedor2">
            <table id="tblMedida" class="cell-border compact stripe">
                <thead>
                    <tr>
                        <th class="bg-info bg-gradient">Id</th>
                        <th>Tallas</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    </div>
    <div id="nueva_categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning bg-gradient">
                    <h5 class="title text-white" id="title">NUEVA CATEGORÍA</h5>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmCategoria">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="codigoc">Código</label>
                            <input id="codigoc" class="form-control" type="text" name="codigoc" placeholder="códigoc">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="descripción">
                        </div>
                        <div class="botones">
                            <button class="btn btn-primary" id="btnAccion" type="button" onclick="registrarCategoria(event);">REGISTRAR</button>
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