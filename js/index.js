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
        if(pagination){
            pagination.style.display = "none";
        }
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

if (document.getElementById("buscadorproductos3") !== null) { document.getElementById("buscadorproductos3").addEventListener("keyup", getProductos3)};

function getProductos3() {

    let buscador = document.getElementById("buscadorproductos3").value
    let lista1 = document.getElementById("listaProductos")
    let lista = document.getElementById("listaProductos3")

    if (buscador.length > 0) {
        lista1.style.display = "none";
        lista.style.display = "block"; 
        let url = "backend/buscadorproductos3.php"
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
        lista.style.display = "none"; // Muestra la lista
        lista1.removeAttribute("style");
    }
}

if (document.getElementById("buscadorclientes3") !== null) { document.getElementById("buscadorclientes3").addEventListener("keyup", getClientes3)};

function getClientes3() {
    let buscador = document.getElementById("buscadorclientes3").value
    let lista1 = document.getElementById("listaClientes")
    let lista = document.getElementById("listaClientes3")

    if (buscador.length > 0) {
        lista1.style.display = "none";
        let url = "backend/buscadorclientes3.php"
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
        lista1.removeAttribute("style");
        lista.style.display = 'none';
    }
}




function delUser(id) {
        let url = 'backend/eliminar.php?page=producto&id='+id;
        let lista = document.getElementById('li'+id);

        fetch(url, {
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response =>{       
                lista.style.display = 'none';
        })
            .catch(err => console.log(err))

}


