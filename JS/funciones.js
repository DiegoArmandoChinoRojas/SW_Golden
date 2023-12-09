let tblUsuario, tblCliente, tblCategoria;


// Tabla de Usuarios
document.addEventListener("DOMContentLoaded", function () {
    tblUsuario = $('#tblUsuario').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
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
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
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
            'data': "Dirección"
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
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
        ajax: {
            url: base_url + "Categoria/listar",
            dataSrc: ''
        },
        columns: [{
            'data': "Id_categoria"
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

    // Datos paramtro 2 textos
    var regex = /^[ÁÉÍÓÚáéíóúüÜA-Za-z]+\s([ÁÉÍÓÚáéíóúüÜA-Za-z]+\s?)*$|^[A-Za-zÁÉÍÓÚáéíóúüÜ]+$/;
    // Datos parametro por dominio
    var rc = /^[A-Za-z0-9._%-]+@(gmail|hotmail)\.com$/;

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
            title: "Teléfono ingresado no es correcto",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (isNaN(dni.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "DNI ingresado no es correcto",
            showConfirmButton: false,
            timer: 3000
        })
    }  else if (!regex.test(apellido.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Apellido invalido",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!regex.test(nombre.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Nombre invalido",
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
    }else {
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

    // Datos parametro de textos
    var regex = /^[ÁÉÍÓÚáéíóúüÜA-Za-z]+\s([ÁÉÍÓÚáéíóúüÜA-Za-z]+\s?)*$|^[A-Za-zÁÉÍÓÚáéíóúüÜ]+$/;
    // Datos parametro por dominio
    var rc = /^[A-Za-z0-9._%-]+@(gmail|hotmail)\.com$/;

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
            title: "Teléfono ingresado no es correcto",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (isNaN(ruc.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "RUC ingresado no es correcto",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!regex.test(apellido.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Apellido invalido",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!regex.test(nombre.value)) {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Nombre invalido",
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

// Funciones Categoria
function frmCategoria() {
    document.getElementById("title").innerHTML = "NUEVA CATEGORÍA";
    document.getElementById("btnAccion").innerHTML = "REGISTRAR";
    document.getElementById("frmCategoria").reset();
    $("#nueva_categoria").modal("show");
    document.getElementById("id").value = "";
}
function registrarCategoria(e) {
    e.preventDefault();
    const descripcion = document.getElementById("descripcion");
    // Datos parametro de textos
    var regex = /^[ÁÉÍÓÚáéíóúüÜA-Za-z]+\s([ÁÉÍÓÚáéíóúüÜA-Za-z]+\s?)*$|^[A-Za-zÁÉÍÓÚáéíóúüÜ]+$/;

    if (descripcion.value == "") {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "El campo es obligatorio!!",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!isNaN(descripcion.value)) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Descripción invalida",
            showConfirmButton: false,
            timer: 3000
        })
    } else if (!regex.test(descripcion.value)) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Descripción invalida",
            showConfirmButton: false,
            timer: 3000
        })
    }else {
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

