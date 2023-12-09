<?php include "View/layout/principal.php"; ?>

<body>
    <div class="modelo">
        <div class="contenedor">
            <table class="table-success" id="tblCategoria">
                <button class="btn btn-primary mb-3 mt-3" onclick="frmCategoria();" type="button"><i class="bi bi-plus-circle-fill"></i></button>
                <thead class="table-success">
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="nueva_categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title" id="title">NUEVA CATEGORÍA</h5>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmCategoria">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="descripcion">Categoría</label>
                            <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="descripcion">
                        </div>
                        <div class="botones">
                            <button class="btn btn-primary" id="btnAccion" type="button" onclick="registrarCategoria(event);">REGISTRAR</button>
                            <button class="btn btn-danger" type="button">CANCELAR</button>
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