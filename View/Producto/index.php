<?php include "View/layout/principal.php"; ?>

<body>
    <div class="modelo">
        <div class="contenedor">
            <table id="tblProducto" class="cell-border compact stripe order-column ">
                <thead>
                    <h1 class="encabezado">Listado de Productos</h1>
                    <button class="btn btn-primary" onclick="frmProducto();" type="button"><i class="bi bi-plus-circle-fill"></i></button>
                    <tr>
                        <p style="display:flex;  justify-content: center; margin-top:-45px; width: 100%;">Stock minimo 50</p>
                        <th class="bg-info bg-gradient">Id</th>
                        <th>Código</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Estilo</th>
                        <th>Color</th>
                        <th>Talla</th>
                        <th>Precio</th>
                        <th>Stock</th>
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
                                    <label for="codigop">Código</label>
                                    <input id="codigop" class="form-control" type="text" name="codigop" placeholder="codigop">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input id="precio" class="form-control" type="text" name="precio" placeholder="precio">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="descripcion">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input id="stock" class="form-control" type="text" name="stock" placeholder="stock">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-m-6">
                            <div class="form-group">
                                    <label for="estilo">Estilo</label>
                                    <select id="estilo" class="form-control" name="estilo">
                                        <?php foreach ($data['estilos'] as $row) { ?>
                                            <option value="<?php echo $row['Id_estilo']; ?>"><?php echo $row['Detalle_estilo'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-m-6">
                                <div class="form-group">
                                    <label for="talla">Talla</label>
                                    <select id="talla" class="form-control" name="talla">
                                        <?php foreach ($data['medidas'] as $row) { ?>
                                            <option value="<?php echo $row['Id_medida']; ?>"><?php echo $row['Descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-m-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <select id="color" class="form-control" name="color">
                                        <?php foreach ($data['colores'] as $row) { ?>
                                            <option value="<?php echo $row['Id_color']; ?>"><?php echo $row['Detalle_color'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-m-6">
                                <div class="form-group">
                                    <label for="categoria">Categoría</label>
                                    <select id="categoria" class="form-control" name="categoria">
                                        <?php foreach ($data['categorias'] as $row) { ?>
                                            <option value="<?php echo $row['Id_categoria']; ?>"><?php echo $row['Nom_cate'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
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


    <script src="<?php echo base_url; ?>JS/jquery-3.7.1.min.js"></script>
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