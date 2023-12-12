<?php include "View/layout/principal.php"; ?>

<body>
    <div class="modelo">
        <div class="contenedor">
            <thead>
                <h1 class="encabezado">Nueva Venta</h1>
            </thead>
            <div class="card">
                <div class="card-body">
                    <form id="frmCompra">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="codigo_cp">Código</label>
                                    <input type="hidden" id="id" name="id">
                                    <input id="codigo_cp" class="form-control" type="text" name="codigo_cp" placeholder="código" onkeyup="buscarCodigo(event)">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="desc_pro">Descripción</label>
                                    <input id="desc_pro" class="form-control" type="text" name="desc_pro" placeholder="descripción" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="stock_c">Stock</label>
                                    <input id="stock_c" class="form-control" type="number" name="stock_c" placeholder="cantidad" onkeyup="calcularPrecio(event)">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input id="precio" class="form-control" type="text" name="precio" placeholder="precio" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="sub_total">Sub Total</label>
                                    <input id="sub_total" class="form-control" type="text" name="sub_total" placeholder="Sub total" disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Sub Total</th>
                            <th>Editar / Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody id="tblDetalle">
                </table>
                <div class="row">
                    <div class="col-md-4 ml-auto">
                            <div class="form-group">
                                <label for="total" class="font-weight-bold">Total</label>
                                <input id="total" class="form-control" type="text" name="total" placeholder="total" disabled>
                                <button class="btn btn-primary mt-4 btn-block" type="button">Generar Compra</button>
                            </div>
                    </div>
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