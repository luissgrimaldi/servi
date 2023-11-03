let sidebarBtn = document.querySelector(".header__logo")


sidebarBtn.addEventListener("click", function(){
    let sidebar=document.getElementById("sidebar");
    let main=document.getElementById("main");
    sidebar.classList.toggle("sidebar--toggle");
    main.classList.toggle("main--toggle")
    
});

let headerBtn = document.getElementById("header__plus")
headerBtn.addEventListener("click", function(){
    let headerNav=document.getElementById("header__nav");
    headerNav.classList.toggle("header__nav--toggle")
});

let profile = document.querySelector(".header__li-user");
profile.addEventListener("click",function(){
    let profileMenu = document.querySelector(".header__li-user__ul");

    profileMenu.classList.toggle("header__li-user__ul--toggle");
    if(profile.style.transform == "scale(1)"){
        profile.removeAttribute("style")
    }else{
        profile.style.transform = "scale(1)"
    }
})


document.getElementById("campo").addEventListener("keyup", getCodigos)

function getCodigos() {

    let buscador = document.getElementById("campo").value
    let lista = document.getElementById("lista")

    if (buscador.length > 0) {

        let url = "backend/buscador.php"
        let formData = new FormData()
        formData.append("campo", buscador)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'flex'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}

if (document.getElementById("buscadorclientes") !== null) { document.getElementById("buscadorclientes").addEventListener("keyup", getClientes)};

function getClientes() {
    let buscador = document.getElementById("buscadorclientes").value
    let lista = document.getElementById("listaClientes")

    if (buscador.length > 0) {

        let url = "backend/buscadorclientes.php"
        let formData = new FormData()
        formData.append("buscadorclientes", buscador)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}

function seleccionarCliente(id,nombre,email,telefono) {

    let buscador = document.getElementById("buscadorclientes")
    let inputContacto = document.getElementById("inputContacto")
    let inputEmail = document.getElementById("inputEmail")
    let inputTelefono = document.getElementById("inputTelefono")
    let inputHide = document.getElementById("contacto_id")
    let lista = document.getElementById("listaClientes")

    buscador.value = '';
    inputContacto.value = nombre;
    inputEmail.value = email;
    inputHide.value = id;

    lista.style.display = 'none'
    
}

if (document.getElementById("buscadorproductos") !== null) { document.getElementById("buscadorproductos").addEventListener("keyup", getProductos)};

function getProductos() {

    let buscador = document.getElementById("buscadorproductos").value
    let lista = document.getElementById("listaProductos")

    if (buscador.length > 0) {

        let url = "backend/buscadorproductos.php"
        let formData = new FormData()
        formData.append("buscadorproductos", buscador)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}


function seleccionarProducto(id,nombre,cod,precio) {

    let buscador = document.getElementById("buscadorproductos")
    let inputIdProducto = document.getElementById("inputIdProducto")
    let inputCodigoProducto = document.getElementById("inputCodigoProducto")
    let inputNombreProducto = document.getElementById("inputNombreProducto")
    let inputPrecioProducto = document.getElementById("inputPrecioProducto")
    let lista = document.getElementById("listaProductos")

    buscador.value = '';
    inputIdProducto.value = id;
    inputNombreProducto.value = nombre;
    inputCodigoProducto.value = cod;
    inputPrecioProducto.value = precio;

    lista.style.display = 'none'
    
}

if (document.getElementById("buscadorproductos2") !== null) { document.getElementById("buscadorproductos2").addEventListener("keyup", getProductos2)};

function getProductos2() {

    let buscador = document.getElementById("buscadorproductos2").value
    let lista1 = document.getElementById("listaProductos")
    let lista = document.getElementById("listaProductos2")
    let pagination = document.querySelector(".pagination")

    if (buscador.length > 0) {
        pagination.style.display = "none";
        lista1.style.display = "none";
        lista.style.display = "block"; 
        let url = "backend/buscadorproductos2.php"
        let formData = new FormData()
        formData.append("buscadorproductos2", buscador)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = "none"; // Muestra la lista
        lista1.removeAttribute("style");
        pagination.removeAttribute("style");
    }
}

if (document.getElementById("buscadorpropiedad") !== null) { document.getElementById("buscadorpropiedad").addEventListener("keyup", getPropiedad)};

function getPropiedad() {

    let buscador = document.getElementById("buscadorpropiedad").value
    let lista = document.getElementById("listaPropiedades")

    if (buscador.length > 0) {

        let url = "backend/buscadorpropiedad.php"
        let formData = new FormData()
        formData.append("buscadorpropiedad", buscador)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}

function seleccionarPropiedad(id,ref,titulo,direccion,altura) {

    let buscador = document.getElementById("buscadorpropiedad")
    let inputPropiedad = document.getElementById("inputPropiedadNombre")
    let inputHide = document.getElementById("inputPropiedad")
    let lista = document.getElementById("listaPropiedades")

    buscador.value = '';
    inputPropiedad.value = 'REF '+ref+': '+titulo+' ('+direccion+' '+altura+')';
    inputHide.value = id;
    lista.style.display = 'none'
    
}

function delUser(id) {
        let url = 'backend/eliminar.php?page=usuario&id='+id;
        let lista = document.getElementById('li'+id);

        fetch(url, {
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response =>{       
                lista.style.display = 'none';
        })
            .catch(err => console.log(err))

}

function delCiudad(id) {
        let url = 'backend/eliminar.php?page=ciudad&id='+id;
        let lista = document.getElementById('li'+id);

        fetch(url, {
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response =>{       
                lista.style.display = 'none';
        })
            .catch(err => console.log(err))

}

function delZona(id) {

        let url = 'backend/eliminar.php?page=zona&id='+id;
        let lista = document.getElementById('li'+id);

        fetch(url, {
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response =>{       
                lista.style.display = 'none';
        })
            .catch(err => console.log(err))

}

function delContacto(id) {

        let url = 'backend/eliminar.php?page=contacto&id='+id;
        let lista = document.getElementById('li'+id);

        fetch(url, {
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response =>{       
                lista.style.display = 'none';
        })
            .catch(err => console.log(err))

}

function delConsulta(id) {

        let url = 'backend/eliminar.php?page=consulta&id='+id;
        let lista = document.getElementById('li'+id);

        fetch(url, {
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response =>{       
                lista.style.display = 'none';
        })
            .catch(err => console.log(err))

}

function delPropiedad(id) {

        let url = 'backend/eliminar.php?page=propiedad&id='+id;
        let lista = document.getElementById('li'+id);

        fetch(url, {
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response =>{       
                lista.style.display = 'none';
        })
            .catch(err => console.log(err))

}

function delDocumento(id) {

        let url = 'backend/eliminar.php?page=documento&id='+id;
        let lista = document.getElementById('li'+id);
        let noDocument = document.querySelector('.no--tareas');

        fetch(url, {
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response =>{       
                lista.remove();
                noDocument.style.display = 'block';
        })
            .catch(err => console.log(err))

}

function tipoTarea(tarea) {
    if(tarea==1){
        $("#radioVisitaAgregar").prop('checked', true);
        $("#tareaAgregar option").prop('selected', false);
        $('#tareaAgregar option[value=5]').prop('selected', true);
        $("#propiedadContent").show();
    }else if(tarea==2){
        $("#radioTareaAgregar").prop('checked', true);
        $("#tareaAgregar option").prop('selected', false);
        $('#tareaAgregar option[value=19]').prop('selected', true);
        $("#propiedadContent").hide();
    }
}

function tipoTareaEdit(tarea) {
    if(tarea==1){
        $("#radioVisitaEditar").prop('checked', true);
        $("#tareaEditar option").prop('selected', false);
        $('#tareaEditar option[value=5]').prop('selected', true);
        $("#propiedadContentEditar").show();
    }else if(tarea==2){
        $("#radioTareaEditar").prop('checked', true);
        $("#tareaEditar option").prop('selected', false);
        $('#tareaEditar option[value=19]').prop('selected', true);
        $("#propiedadContentEditar").hide();
    }
}


if (document.getElementById("tareaEditar") !== null){document.getElementById("tareaEditar").addEventListener("change", selectRadioEditar);};

function selectRadioEditar(){
    let tareaEditar = document.getElementById("tareaEditar");

    if(tareaEditar.selectedIndex == 5){
        $("#radioVisitaEditar").prop('checked', true);
        $("#propiedadContentEditar").show();
    }else{
        $("#radioTareaEditar").prop('checked', true);
        $("#propiedadContentEditar").hide();
    }

}

if (document.getElementById("tareaAgregar") !== null){document.getElementById("tareaAgregar").addEventListener("change", selectRadioAgregar);};

function selectRadioAgregar(){
    let tareaAgregar = document.getElementById("tareaAgregar");

    if(tareaAgregar.selectedIndex == 5){
        $("#radioVisitaAgregar").prop('checked', true);
        $("#propiedadContent").show();
    }else{
        $("#radioTareaAgregar").prop('checked', true);
        $("#propiedadContent").hide();
        
    }

}

if (document.getElementById("buscadorconsulta") !== null) { document.getElementById("buscadorconsulta").addEventListener("keyup", getConsulta)};

function getConsulta() {

    let buscador = document.getElementById("buscadorconsulta").value
    let lista = document.getElementById("listaConsultas")

    if (buscador.length > 0) {

        let url = "backend/buscadorconsulta.php"
        let formData = new FormData()
        formData.append("buscadorconsulta", buscador)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}


function seleccionarConsulta(id,nombre,apellido) {
    let buscador = document.getElementById("buscadorconsulta")
    let inputHide = document.getElementById("consulta_id")
    let lista = document.getElementById("listaConsultas")

    buscador.value = id+' - '+nombre+' '+apellido;
    inputHide.value = id;

    lista.style.display = 'none'  
}


if (document.getElementById("buscadorpropiedad2") !== null) { document.getElementById("buscadorpropiedad2").addEventListener("keyup", getPropiedad2)};

function getPropiedad2() {

    let buscador = document.getElementById("buscadorpropiedad2").value
    let lista = document.getElementById("listaPropiedades")

    if (buscador.length > 0) {

        let url = "backend/buscadorpropiedad2.php"
        let formData = new FormData()
        formData.append("buscadorpropiedad2", buscador)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}


function seleccionarPropiedad2(id,calle,referencia) {
    let buscador = document.getElementById("buscadorpropiedad2")
    let inputHide = document.getElementById("propiedad_id")
    let lista = document.getElementById("listaPropiedades")

    buscador.value = referencia+' - '+calle;
    inputHide.value = id;

    lista.style.display = 'none'  
}






if (document.getElementById("buscadorconsulta2") !== null) { document.getElementById("buscadorconsulta2").addEventListener("keyup", getConsulta2)};

function getConsulta2() {

    let buscador = document.getElementById("buscadorconsulta2").value
    let lista = document.getElementById("listaConsultasEditar")

    if (buscador.length > 0) {

        let url = "backend/buscadorconsulta2.php"
        let formData = new FormData()
        formData.append("buscadorconsulta2", buscador)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}


function seleccionarConsulta2(id,nombre,apellido) {
    let buscador = document.getElementById("buscadorconsulta2")
    let inputHide = document.getElementById("editar_consulta_id")
    let lista = document.getElementById("listaConsultasEditar")

    buscador.value = id+' - '+nombre+' '+apellido;
    inputHide.value = id;

    lista.style.display = 'none'  
}


if (document.getElementById("buscadorpropiedad3") !== null) { document.getElementById("buscadorpropiedad3").addEventListener("keyup", getPropiedad3)};

function getPropiedad3() {

    let buscador = document.getElementById("buscadorpropiedad3").value
    let lista = document.getElementById("listaPropiedadesEditar")

    if (buscador.length > 0) {

        let url = "backend/buscadorpropiedad3.php"
        let formData = new FormData()
        formData.append("buscadorpropiedad3", buscador)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}


function seleccionarPropiedad3(id,calle,referencia) {
    let buscador = document.getElementById("buscadorpropiedad3")
    let inputHide = document.getElementById("editar_propiedad_id")
    let lista = document.getElementById("listaPropiedadesEditar")

    buscador.value = referencia+' - '+calle;
    inputHide.value = id;

    lista.style.display = 'none'  
}

function nuevoSeguimiento(){
    let modal = document.getElementById('modal');          
    modal.style.display='block';
    $("#radioTareaAgregar").prop('checked', true);
    $('#tareaAgregar option[value=19]').prop('selected', true);
}

function sacarSeguimiento(){
    let modal = document.getElementById('modal');          
    modal.removeAttribute('style');
}

function nuevaVisita(){
    let modal = document.getElementById('modalVisita');          
    modal.style.display='block';
}

function sacarVisita(){
    let modal = document.getElementById('modalVisita');          
    modal.removeAttribute('style');
}

function marcarLeido(id) {

    let url = 'backend/notificacionleida.php?id='+id;
    let notificacion = document.getElementById('li'+id);
    let numeroNotificacion = document.querySelector('.notificacion__numero');
    let numero = parseInt(numeroNotificacion.textContent);
    let campanaNotificaciones = document.getElementById('notificacionesCampana');
    let noNotificacion = document.querySelector('.no--tareas');

    fetch(url, {
        mode: "cors" //Default cors, no-cors, same-origin
    }).then(response =>{       
        notificacion.remove();
        if(numero == 1){
            numeroNotificacion.style.display = 'none';
            campanaNotificaciones.classList.remove('header__a--notificacion');
            noNotificacion.style.display = 'block';
        }else{
            numeroNotificacion.textContent = numero - 1;
        }
    })
        .catch(err => console.log(err))

}

function desmarcarLeido(id) {

    let url = 'backend/notificacionnoleida.php?id='+id;
    let notificacion = document.getElementById('li'+id);
    let numeroNotificacion = document.querySelector('.notificacion__numero');
    let numero = parseInt(numeroNotificacion.textContent);
    let campanaNotificaciones = document.getElementById('notificacionesCampana');
    let noNotificacion = document.querySelector('.no--tareas');
    let cantidadNotificaciones = parseInt(document.querySelectorAll(".notificaciones__li").length);

    fetch(url, {
        mode: "cors" //Default cors, no-cors, same-origin
    }).then(response =>{      
        notificacion.remove();
        console.log(cantidadNotificaciones); 
        if(!numero){
            numeroNotificacion.textContent = numero + 1
            numeroNotificacion.style.display = 'block';
            campanaNotificaciones.classList.remove('header__a--notificacion');
        }else{
            if(cantidadNotificaciones == 1){
                noNotificacion.style.display = 'block';
            }
            numeroNotificacion.textContent = numero + 1;
        }
    })
        .catch(err => console.log(err))

}
