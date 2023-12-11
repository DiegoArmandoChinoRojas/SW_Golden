<?php include "View/layout/principal.php"; ?>

<body>
    <div class="modelo">
        <div class="contenedor">
            <table id="tblProducto" class="cell-border compact stripe order-column ">
                <thead>
                    <h1 class="encabezado">Listado de Productos</h1>
                    <button class="btn btn-primary" onclick="frmProducto();" type="button"><i class="bi bi-plus-circle-fill"></i></button>
                    <tr>
                        <th class="bg-info bg-gradient">Id</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Color</th>
                        <th>Estilo</th>
                        <th>Categoría</th>
                        <th>Talla</th>
                        <th>Estado</th>
                        <th>Editar / Eliminar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary bg-gradient">
                    <h5 class="title text-white" id="title">NUEVO CLIENTE</h5>
                </div>
                <div class="modal-body">

                    <form method="post" id="frmProducto">
                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="codigo">Código</label>
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="codigo">
                        </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input id="precio" class="form-control" type="text" name="precio" placeholder="precio">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="descripcion">
                                </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input id="stock" class="form-control" type="text" name="stock" placeholder="stock">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input id="color" class="form-control" type="text" name="color" placeholder="color">
                                </div>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="estilo">Estilo</label>
                            <input id="estilo" class="form-control" type="text" name="estilo" placeholder="estilo">
                        </div>
                        <div class="form-group">
                            <label for="cate">Categoria</label>
                            <input id="cate" class="form-control" type="text" name="cate" placeholder="cate">
                        </div>
                        <div class="form-group">
                            <label for="talla">Talla</label>
                            <input id="talla" class="form-control" type="text" name="talla" placeholder="talla">
                        </div>
                        
                        <div class="botones">
                            <button class="btn btn-primary" id="btnAccion" type="button" onclick="registrarProducto(event);">REGISTRAR</button>
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