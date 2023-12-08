let tblUsuario;
document.addEventListener("DOMContentLoaded", function () {
    tblUsuario = $('#tblUsuario').DataTable({
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
            'data': "acciones"
        }],
    });
})
function frmLogin(e) {
    e.preventDefault();
    const url = base_url + "Usuario/validar";
    const frm = document.getElementById("frmLogin");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res == "Ok") {
                window.location = base_url + "Usuario";
            } else {
                document.getElementById("alerta").innerHTML = res;
            }
        }
    }
}
function frmUsuario() {
    document.getElementById("title").innerHTML = "NUEVO USUARIO";
    document.getElementById("btnAccion").innerHTML = "REGISTRAR";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value= "";
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
            position: "top-end",
            icon: "error",
            title: "Todos los campos son obligatorios!!",
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
                        position: "top-end",
                        icon: "success",
                        title: "Usuario registrado exitosamente!!",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nuevo_usuario").modal("hide");
                    tblUsuario.ajax.reload();
                } else if (res == "modificado"){
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Usuario modificado exitosamente!!",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_usuario").modal("hide");
                    tblUsuario.ajax.reload();
                }else{
                    Swal.fire({
                        position: "top-end",
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
            const res= JSON.parse(this.responseText);
            // id de la fila selecionado index
            document.getElementById("id").value= res.Id_usu;
            //datos de los campos
            document.getElementById("dni").value= res.Dni_usu;
            document.getElementById("nombre").value= res.Nom_usu;
            document.getElementById("apellido").value= res.Ape_usu;
            document.getElementById("correo").value= res.Correo;
            document.getElementById("telefono").value= res.Telefono;
            document.getElementById("tipo").value= res.Id_tipo_usu;
            document.getElementById("claves").classList.add("d-none");
            $("#nuevo_usuario").modal("show");
        }
    }
}

