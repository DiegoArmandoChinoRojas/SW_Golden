function frmLogin(e){
    e.preventDefault();
        const url= base_url + "Usuario/validar";
        const frm= document.getElementById("frmLogin");
        const http= new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange= function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                if(res == "Ok"){
                    window.location = base_url + "Usuario";
                }else{
                    document.getElementById("alerta").innerHTML = res;
                }
            }
        }
    }
