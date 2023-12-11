let tblUsuario, tblCliente, tblCategoria, tblMedida, tblProducto;

// Parametro de código
var ep = /^[A-Za-z0-9\-]+$/;
// Parametro de cadena
var regex = /^[ÁÉÍÓÚáéíóúüÜA-Za-z]+\s([ÁÉÍÓÚáéíóúüÜA-Za-z]+\s?)*$|^[A-Za-zÁÉÍÓÚáéíóúüÜ]+$/;
// Parametro por dominio
var rc = /^[A-Za-z0-9._-]+@(gmail|hotmail|outlook)\.com$/;


// Tabla de Usuarios
document.addEventListener("DOMContentLoaded", function () {
    tblUsuario = $('#tblUsuario').DataTable({
        //  Agregando caracteristicas de DataTable
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
        info: false,
        ordering: false,
        lengthMenu: [10],
        pagingType: "simple",
        dom: '<"top"i>fr<"bottom"p><"clear">',
        /* //  Fin d*/
        ajax: {
            url: base_url + "Usuario/listar",
            dataSrc: ''
        },
        columns: [{
            'data': "Id_usu"
        },
        {
            'data': "Dni_usu"
        },
        {
            'data': "Nom_usu"
        },
        {
            'data': "Ape_usu"
        },
        {
            'data': "Correo"
        },
        {
            'data': "Telefono"
        },
        {
            'data': "Desc_tipo_usu"
        },
        {
            'data': "Estado"
        },
        {
            'data': "acciones"
        }],
    });
})

// Tabla de Clientes
document.addEventListener("DOMContentLoaded", function () {
    tblCliente = $('#tblCliente').DataTable({
        //  Agregando caracteristicas de DataTable
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
        info: false,
        ordering: false,
        lengthMenu: [9],
        pagingType: "simple",
        dom: '<"top"i>fr<"bottom"p><"clear">',

        /* //  Fin d*/
        ajax: {
            url: base_url + "Cliente/listar",
            dataSrc: ''
        },
        columns: [{
            'data': "Id_cliente"
        },
        {
            'data': "RUC"
        },
        {
            'data': "Nom_cli"
        },
        {
            'data': "Ape_cli"
        },
        {
            'data': "Correo"
        },
        {
            'data': "Telefono"
        },
        {
            'data': "Estado"
        },
        {
            'data': "acciones"
        }],
    });
})
// Tabla de Categorias
document.addEventListener("DOMContentLoaded", function () {
    tblCategoria = $('#tblCategoria').DataTable({
        //  Agregando caracteristicas de DataTable
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
        info: false,
        ordering: false,
        lengthMenu: [3],
        pagingType: "simple",
        dom: '<"top"i>fr<"bottom"p><"clear">',
        /* //  Fin d*/
        ajax: {
            url: base_url + "Categoria/listar",
            dataSrc: ''
        },
        columns: [{
            'data': "Id_categoria"
        },
        {
            'data': "Cod_categoria"
        },
        {
            'data': "Nom_cate"
        },
        {
            'data': "Estado"
        },
        {
            'data': "acciones"
        }],
    });
})
// Tabla de Medidas
document.addEventListener("DOMContentLoaded", function () {
    tblMedida = $('#tblMedida').DataTable({
        //  Agregando caracteristicas de DataTable
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
        info: false,
        ordering: false,
        lengthMenu: [4],
        pagingType: "simple",
        dom: '<"top"i><"bottom"p><"clear">',

        /* //  Fin d*/
        ajax: {
            url: base_url + "Categoria/listarM",
            dataSrc: ''
        },
        columns: [{
            'data': "Id_medida"
        },
        {
            'data': "Descripcion"
        }],
    });
})

// Tabla de Productos
document.addEventListener("DOMContentLoaded", function () {
    tblProducto = $('#tblProducto').DataTable({
        //  Agregando caracteristicas de DataTable
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
        info: false,
        ordering: false,
        lengthMenu: [10],
        pagingType: "simple",
        dom: '<"top"i>fr<"bottom"p><"clear">',

        /* //  Fin d*/
        ajax: {
            url: base_url + "Producto/listar",
            dataSrc: ''
        },
        columns: [{
            'data': "Id_pro"
        },
        {
            'data': "Cod_producto"
        },
        {
            'data': "Detalle_pro"
        },
        {
            'data': "Precio_pro"
        },
        {
            'data': "Cantidad_pro"
        },
        {
            'data': "Color_pro"
        },
        {
            'data': "Estilo_pro"
        },
        {
            'data': "Nom_cate"
        },
        {
            'data': "Descripcion"
        },
        {
            'data': "Estado"
        },
        {
            'data': "acciones"
        }],
    });
})

// Funciones Usuarios
function frmUsuario() {
    document.getElementById("title").innerHTML = "NUEVO USUARIO";
    document.getElementById("btnAccion").innerHTML = "REGISTRAR";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
}
function registrarUsuario(e) {
    e.preventDefault();
    const dni = document.getElementById("dni");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const correo = document.getElementById("correo");
    const telefono = document.getElementById("telefono");
    const tipo = document.getElementById("tipo");

    if (dni.value == "" || nombre.value == "" || apellido.value == "" || correo.value == "" || telefono.value == "" || tipo.value == "") {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Todos los campos son obligatorios!!",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (isNaN(telefono.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Teléfono invalido, solo se permiten números",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (isNaN(dni.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "DNI invalido, solo se permiten números",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!isNaN(nombre.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Nombre invalido, no se permiten números",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!isNaN(apellido.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Apellido invalido, no se permiten números",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!regex.test(apellido.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Apellido invalido, no se permiten caracteres especiales",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!regex.test(nombre.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Nombre invalido, no se permiten caracteres especiales",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!rc.test(correo.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Correo invalido",
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Usuario/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "registro") {
                    Swal.fire({
                        position: "top",
                        icon: "success",
                        title: "Usuario registrado exitosamente!!",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nuevo_usuario").modal("hide");
                    tblUsuario.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: "top",
                        icon: "success",
                        title: "Usuario actualizado exitosamente!!",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_usuario").modal("hide");
                    tblUsuario.ajax.reload();
                } else {
                    Swal.fire({
                        position: "top",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }

        }
    }
}
function btnEditarUsuario(Id_usu) {
    document.getElementById("title").innerHTML = "ACTUALIZAR USUARIO";
    document.getElementById("btnAccion").innerHTML = "MODIFICAR";
    const url = base_url + "Usuario/editar/" + Id_usu;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            // id de la fila selecionado index
            document.getElementById("id").value = res.Id_usu;
            //datos de los campos
            document.getElementById("dni").value = res.Dni_usu;
            document.getElementById("nombre").value = res.Nom_usu;
            document.getElementById("apellido").value = res.Ape_usu;
            document.getElementById("correo").value = res.Correo;
            document.getElementById("telefono").value = res.Telefono;
            document.getElementById("tipo").value = res.Id_tipo_usu;
            document.getElementById("claves").classList.add("d-none");
            $("#nuevo_usuario").modal("show");
        }
    }
}
function btnEliminarUsuario(Id_usu) {
    Swal.fire({
        title: "¿Eliminar campo?",
        text: "El usuario pasara a estar inactivo",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuario/eliminar/" + Id_usu;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse($this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje",
                            text: "Usuario eliminado con exito",
                            icon: "success"
                        });
                        tblUsuario.ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Mensaje",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
    });
}
function btnActivarUsuario(Id_usu) {
    Swal.fire({
        title: "¿Activar usuario?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuario/activar/" + Id_usu;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse($this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje",
                            text: "La activación se realizo con exito¡¡",
                            icon: "success"
                        });
                        tblUsuario.ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Mensaje",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
    });
}

// Funciones Clientes
function frmCliente() {
    document.getElementById("title").innerHTML = "NUEVO CLIENTE";
    document.getElementById("btnAccion").innerHTML = "REGISTRAR";
    document.getElementById("frmCliente").reset();
    $("#nuevo_cliente").modal("show");
    document.getElementById("id").value = "";
}
function registrarCliente(e) {
    e.preventDefault();
    const ruc = document.getElementById("ruc");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const correo = document.getElementById("correo");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");

    if (ruc.value == "" || nombre.value == "" || apellido.value == "" || correo.value == "" || telefono.value == "" || direccion.value == "") {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Todos los campos son obligatorios!!",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (isNaN(telefono.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Teléfono invalido, solo debe contener números",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (isNaN(ruc.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "RUC invalido, solo deben contener números",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!regex.test(apellido.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Apellido invalido, no se permiten caracteres especiales",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!regex.test(nombre.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Nombre invalido, no se permiten caracteres especiales",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!rc.test(correo.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Correo invalido",
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Cliente/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "registro") {
                    Swal.fire({
                        position: "top",
                        icon: "success",
                        title: "Cliente registrado exitosamente!!",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nuevo_cliente").modal("hide");
                    tblCliente.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: "top",
                        icon: "success",
                        title: "Cliente actualizado exitosamente!!",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_cliente").modal("hide");
                    tblCliente.ajax.reload();
                } else {
                    Swal.fire({
                        position: "top",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }

        }
    }
}
function btnEditarCliente(Id_cliente) {
    document.getElementById("title").innerHTML = "ACTUALIZAR CLIENTE";
    document.getElementById("btnAccion").innerHTML = "MODIFICAR";
    const url = base_url + "Cliente/editar/" + Id_cliente;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            // id de la fila selecionado index
            document.getElementById("id").value = res.Id_cliente;
            //datos de los campos
            document.getElementById("ruc").value = res.RUC;
            document.getElementById("nombre").value = res.Nom_cli;
            document.getElementById("apellido").value = res.Ape_cli;
            document.getElementById("correo").value = res.Correo;
            document.getElementById("telefono").value = res.Telefono;
            document.getElementById("direccion").value = res.Dirección;
            $("#nuevo_cliente").modal("show");
        }
    }
}
function btnEliminarCliente(Id_cliente) {
    Swal.fire({
        title: "¿Eliminar campo?",
        text: "El Cliente pasara a estar inactivo",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Cliente/eliminar/" + Id_cliente;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse($this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje",
                            text: "Cliente eliminado con exito",
                            icon: "success"
                        });
                        tblCliente.ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Mensaje",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
    });
}
function btnActivarCliente(Id_cliente) {
    Swal.fire({
        title: "¿Activar usuario?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Cliente/activar/" + Id_cliente;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse($this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje",
                            text: "La activación se realizo con exito¡¡",
                            icon: "success"
                        });
                        tblCliente.ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Mensaje",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
    });
}

// Funciones Categorias de Producto
function frmCategoria() {
    document.getElementById("title").innerHTML = "NUEVA CATEGORÍA";
    document.getElementById("btnAccion").innerHTML = "REGISTRAR";
    document.getElementById("frmCategoria").reset();
    $("#nueva_categoria").modal("show");
    document.getElementById("id").value = "";
}
function registrarCategoria(e) {
    e.preventDefault();
    const codigo = document.getElementById("codigo");
    const descripcion = document.getElementById("descripcion");

    if (descripcion.value == "" || codigo.value == "") {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Todos los campos son obligatorios!!",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!isNaN(descripcion.value)) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Descripción invalida, no se permiten números",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!regex.test(descripcion.value)) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Descripción invalida, no se permiten caracteres especiales",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!ep.test(codigo.value)) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Código invalido, no se permiten caracteres especiales",
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Categoria/registrar";
        const frm = document.getElementById("frmCategoria");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "registro") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Categoría registrado exitosamente!!",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nueva_categoria").modal("hide");
                    tblCategoria.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Categoria actualizada exitosamente!!",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nueva_categoria").modal("hide");
                    tblCategoria.ajax.reload();
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }

        }
    }
}
function btnEditarCategoria(Id_categoria) {
    document.getElementById("title").innerHTML = "ACTUALIZAR CATEGORÍA";
    document.getElementById("btnAccion").innerHTML = "MODIFICAR";
    const url = base_url + "Categoria/editar/" + Id_categoria;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            // id de la fila selecionado index
            document.getElementById("id").value = res.Id_categoria;
            //datos de los campos
            document.getElementById("codigo").value = res.Cod_categoria;
            document.getElementById("descripcion").value = res.Nom_cate;
            $("#nueva_categoria").modal("show");
        }
    }
}
function btnEliminarCategoria(Id_categoria) {
    Swal.fire({
        title: "¿Eliminar campo?",
        text: "La Categoria pasara a estar inactivo",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categoria/eliminar/" + Id_categoria;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse($this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje",
                            text: "Categoria eliminado con exito",
                            icon: "success"
                        });
                        tblCategoria.ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Mensaje",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
    });
}
function btnActivarCategoria(Id_categoria) {
    Swal.fire({
        title: "¿Activar categoria?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categoria/activar/" + Id_categoria;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse($this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje",
                            text: "La activación se realizo con exito¡¡",
                            icon: "success"
                        });
                        tblCategoria.ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Mensaje",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
    });
}

// Funciones Producto

function frmProducto() {
    document.getElementById("title").innerHTML = "NUEVO PRODUCTO";
    document.getElementById("btnAccion").innerHTML = "REGISTRAR";
    document.getElementById("frmProducto").reset();
    $("#nuevo_producto").modal("show");
    document.getElementById("id").value = "";
}
function registrarProducto(e) {
    e.preventDefault();
    const codigo = document.getElementById("codigo");
    const descripcion = document.getElementById("descripcion");
    const precio = document.getElementById("precio");
    const stock = document.getElementById("stock");
    const color = document.getElementById("color");
    const estilo = document.getElementById("estilo");
    const categoria = document.getElementById("cate");
    const talla = document.getElementById("talla");

    if (codigo.value == "" || descripcion.value == "" || precio.value == "" || stock.value == "" || color.value == "" || estilo.value == "" || categoria.value == "" || talla.value == "") {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Todos los campos son obligatorios!!",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!isNaN(descripcion.value)) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Descripción invalida, no se permiten números",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!regex.test(descripcion.value)) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Descripción invalida, no se permiten caracteres especiales",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!ep.test(codigo.value)) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Código invalido, no se permiten caracteres especiales",
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Producto/registrar";
        const frm = document.getElementById("frmProducto");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "registro") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Producto registrado exitosamente!!",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nuevo_producto").modal("hide");
                    tblProducto.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Producto actualizado exitosamente!!",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_producto").modal("hide");
                    tblProducto.ajax.reload();
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }

        }
    }
}
function btnEditarProducto(Id_pro) {
    document.getElementById("title").innerHTML = "ACTUALIZAR PRODUCTO";
    document.getElementById("btnAccion").innerHTML = "MODIFICAR";
    const url = base_url + "Producto/editar/" + Id_pro;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            // id de la fila selecionado index
            document.getElementById("id").value = res.Id_pro;
            //datos de los campos
            document.getElementById("codigo").value = res.Cod_producto;
            document.getElementById("descripcion").value = res.Detalle_pro;
            document.getElementById("precio").value = res.Precio_pro;
            document.getElementById("stock").value = res.Cantidad_pro;
            document.getElementById("color").value = res.Color_pro;
            document.getElementById("estilo").value = res.Estilo_pro;
            document.getElementById("cate").value = res.Id_cate;
            document.getElementById("talla").value = res.Id_medida;
            $("#nuevo_producto").modal("show");
        }
    }
}
function btnEliminarProducto(Id_pro) {
    Swal.fire({
        title: "¿Eliminar campo?",
        text: "El Producto pasara a estar inactivo",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Producto/eliminar/" + Id_pro;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse($this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje",
                            text: "Producto eliminado con exito",
                            icon: "success"
                        });
                        tblProducto.ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Mensaje",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
    });
}
function btnActivarProducto(Id_pro) {
    Swal.fire({
        title: "¿Activar producto?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Producto/activar/" + Id_pro;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse($this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje",
                            text: "La activación se realizo con exito¡¡",
                            icon: "success"
                        });
                        tblProducto.ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Mensaje",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
    });
}