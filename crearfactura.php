<?php include 'header.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="loader-container">
                <div class="loader"></div>
            </div>
            <div id="modalBuscarProducto" class="modal-BG">
                <div class="modal"> 
                    <div class="form__bloque__content content">
                                <input type="text" class="form__text content__text" placeholder="Buscar producto" name="buscadorclientes" id="buscadorproductos2" autocomplete="off"> 
                                <ul class="content_ul" id="listaClientes"></ul>                
                            </div>                         
                            <ul class="propiedades__ul" id="listaProductos">
                            <?php
                                $sentencia = $connect->prepare("SELECT * FROM products ORDER BY 'cod' ASC") or die('query failed');
                                $sentencia->execute();
                                $list_usuarios = $sentencia->fetchAll();
                                $consultasTotalesActuales = $sentencia->rowCount();
                                foreach($list_usuarios as $usuario){
                                    $id = $usuario['id'];                                                             
                                    $nombre = $usuario['name'];                                                                                                                        
                                    $cod = $usuario['cod'];                                                                                                                     
                                    $price = $usuario['price'];                                                                                                                     
                                ?> 
                                <li class="propiedades__li" id="li<?php echo $id?>">
                                    <div class="propiedades__nombre-detalles-precio">
                                        <span class="propiedades__nombre"><?php echo $nombre.' ('.$cod.')';?></span>
                                        <span class="propiedades__precio">$ <?php echo $price;?></span>
                                    </div>                        
                                    <div class="consultas__bloque consultas__bloque--edit-search-reload"> 
                                        <div class="consultas__bloque__content consultas__edit-search-reload">
                                            <a class="consultas__edit-search-reload__content" href="admineditar.php?page=usuario&id=<?php echo $id?>"><i class="consultas__accion fa-solid fa-pencil"></i><span>Editar</span></a>                                       
                                            <a onclick="if(confirm('¿Seguro que quieres eliminar este contacto?')) delUser(<?php echo $id?>)" class="consultas__edit-search-reload__content"><i class="consultas__accion fa-solid fa-trash"></i><span>Eliminar</span></a>
                                        </div>   
                                    </div>
                                </li> 
                                <?php };?>
                            </ul>   
                            <ul class="propiedades__ul" id="listaProductos2" style="display:none"></ul> 
                </div>                      
            </div>
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-receipt main__h1--emoji"></i><h1 class="main__h1">Crear factura</h1></div>                    
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">             
                    <form autocomplete="off" id="addPropiedadFom" class="form__busqueda-propiedad form" name="form" method="POST" action="backend/crearfactura.php" enctype="multipart/form-data">                                     
                        <h2 class="main__h2">Cliente</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <input type="text" class="form__text content__text editableFormCodCliente" placeholder="Ingrese nombre del cliente" name="codigoCliente" autocomplete="off">               
                            </div>       
                        </div>                               
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nombre</label>
                                <input type="text" class="form__text content__text" name="inputNombre" id="inputContacto" readonly="readonly"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Codigo Cliente</label>
                                <input type="text" class="form__text content__text" name="inputEmail" id="inputEmail" readonly="readonly"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Teléfono</label>
                                <input type="text" class="form__text content__text" name="inputTelefono" id="inputTelefono" readonly="readonly"> 
                            </div>                          
                            <input type="hidden" class="form__text content__text" name="cliente_id" id="cliente_id">
                        </div>
                        <div class="main__decoration"></div>
                        <h2 class="main__h2">Producto</h2>                               
                        <div class="form__bloque">
                            <table>
                                <tr>
                                    <td>Cod</td>
                                    <td>Producto</td>
                                    <td>Cantidad</td>
                                    <td>Precio</td>
                                    <td>Bonif 1</td>
                                    <td>Bonif 2</td>
                                    <td>Total</td>
                                </tr>
                                <tr>
                                <td class="editableFormCodProducto editable" contenteditable="true"></td>
                                    <td></td>
                                    <td class="editable editableQty"></td>
                                    <td class="editable editablePrice"></td>
                                    <td class="editable editableB1"></td>
                                    <td class="editable editableB2"></td>
                                    <td></td>
                                    <input type="hidden" name="inputCodigoProducto" id="inputCodigoProducto" readonly="readonly"> 
                                </tr>
                            </table>                         
                        </div>
                        <div class="main__decoration"></div>
                        <input type="hidden" name="submit">
                        <input id="submit-button" type="submit" name="submit" class="form__button form__bloque__button" value="Facturar">                                                             
                    </form>
                </div>
                </div>                
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <?php include 'sidebar.php' ?>
    <script src="js/index.js?<?php echo servicorrVersion;?>"></script>
    <script>
    $(document).ready(function () {
        $(".editableFormCodCliente").select();
        $(document).on("keypress", ".editableFormCodProducto", function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var codigoProducto = $(this).text().trim();
                var currentEditable = $(this);
                if (codigoProducto === "00") {
                    $("#modalBuscarProducto").show();
                } else {
                    buscarNombreProducto(codigoProducto, currentEditable);
                }
            }
        });

        $(".editableFormCodCliente").on("keypress", function (e) {
            if (e.which === 13) { // Verifica si la tecla presionada es "Enter"
                e.preventDefault(); // Evita el comportamiento predeterminado (enviar el formulario)
                var codigoCliente = $(this).val().trim();
                var currentEditableCliente = $(this);
                if(codigoCliente === "00"){
                    $("#modalBuscarProducto").show();
                }else{
                    buscarNombreCliente(codigoCliente, currentEditableCliente);
                }
            }
        });

        $(document).on("keypress focusout", ".editable", function (e) {
            if (e.which === 13 && e.type !== 'focusout') { // Verifica si la tecla presionada es "Enter"
                e.preventDefault();

                // Verifica si el elemento actual tiene la clase 'editableFormCodProducto'
                if ($(this).hasClass('editableFormCodProducto') ||  $(this).hasClass('editableFormCodCliente')){
                    return; // No hagas nada si tiene la clase 'editableFormCodProducto'
                }

                // Encuentra el siguiente elemento editable en la misma fila
                var nextEditable = $(this).closest('td').nextAll('td.editable:first');
                
                if (nextEditable.length === 0) {
                    // Si no hay más elementos en la misma fila, pasa a la siguiente fila
                    var nextRow = $(this).closest('tr').next('tr');
                    nextEditable = nextRow.find('td.editable:first');

                    // Si no hay más filas, no hagas nada
                    if (nextEditable.length === 0) {
                        return;
                    }
                }
                if(!$(this).hasClass('editableQty')){
                    nextEditable.attr('contenteditable', 'true').focus();
                }

                if ($(this).hasClass('editableQty') && parseFloat($(this).text()) > 0){
                    // Espera un breve momento antes de seleccionar para asegurar que el enfoque se complete
                    nextEditable.attr('contenteditable', 'true').focus();
                    setTimeout(function () {
                        var range = document.createRange();
                        range.selectNodeContents(nextEditable[0]);
                        var sel = window.getSelection();
                        sel.removeAllRanges();
                        sel.addRange(range);
                    }, 10);
                }
            }
            if (e.which === 13 || e.type === 'focusout'){
                if ($(this).hasClass('editablePrice')){
                    var qty = $(this).prev('td').text();
                    var price = $(this).text();
                    price = price*qty;
                    var bonif1 = $(this).next().text();
                    var bonif2 = $(this).next().next().text();
                    if(!isNaN(bonif1)){
                        var descuento1 = (price*bonif1)/100;
                        price = price-descuento1;
                    }
                    if(!isNaN(bonif2)){
                        var descuento2 = (price*bonif2)/100;
                        price = price-descuento2;
                    }
                    $(this).next('td').next('td').next('td').text(price.toLocaleString('es-ES'));
                }

                if ($(this).hasClass('editableB1')){
                    var qty = $(this).prev().prev('td').text();
                    var price = $(this).prev().text();
                    price = qty*price;
                    var bonif1 = $(this).text();
                    var bonif2 = $(this).next().text();
                    if(!isNaN(bonif1)){
                        var descuento1 = (price*bonif1)/100;
                        price = price-descuento1;
                    }
                    if(!isNaN(bonif2)){
                        var descuento2 = (price*bonif2)/100;
                        price = price-descuento2;
                    }
                    $(this).next('td').next('td').text(price.toLocaleString('es-ES'));
                }

                if ($(this).hasClass('editableB2')){
                    var qty = $(this).prev().prev().prev('td').text();
                    var price = $(this).prev().prev().text();
                    price = qty*price;
                    var bonif1 = $(this).prev().text();
                    var bonif2 = $(this).text();
                    if(!isNaN(bonif1)){
                        var descuento1 = (price*bonif1)/100;
                        price = price-descuento1;
                    }
                    if(!isNaN(bonif2)){
                        var descuento2 = (price*bonif2)/100;
                        price = price-descuento2;
                    }
                    $(this).next('td').text(price.toLocaleString('es-ES'));
                }
            }
        });


        function agregarFila() {
            // Obtiene el valor del código del producto ingresado
            var codigoProducto = $('.editableFormCodProducto').text().trim();

            // Verifica si el código del producto no está vacío
            if (codigoProducto !== "") {
                // Agrega una nueva fila a la tabla
                $('table').append('<tr>' +
                    '<td class="editableFormCodProducto editable" contenteditable="true"></td>' +
                    '<td></td>' +
                    '<td class="editable editableQty"></td>' +
                    '<td class="editable editablePrice"></td>' +
                    '<td class="editable editableB1"></td>' +
                    '<td class="editable editableB2"></td>' +
                    '<td></td>' +
                    '<input type="hidden" name="inputCodigoProducto" class="form__text content__text" id="inputCodigoProducto" readonly="readonly">' +
                    '</tr>');
            }
        }

        function buscarNombreProducto(codigoProducto, currentEditable) {
            // Realiza una solicitud AJAX para obtener el nombre del producto desde nombre_producto.php
            $.ajax({
                type: "POST",
                url: "backend/buscadorproductos.php",
                data: { codigoProducto: codigoProducto },
                dataType: "json", // Indica que esperamos un JSON como respuesta
                success: function (respuesta) {
                    if (respuesta.success) {
                        var nextEditable = currentEditable.closest('td').nextAll('td.editable:first');
                        var siguienteFila = nextEditable.closest('tr').next('tr');
                        if (!siguienteFila.hasClass('fila-con-datos')) {
                            agregarFila();
                        }
                        // Actualiza el contenido de la celda vacía con el nombre del producto obtenido
                        currentEditable.next('td').text(respuesta.nombreProducto);                       

                        // Actualiza el contenido de la celda vacía con el precio del producto obtenido
                        currentEditable.next('td').next('td').next('td').text(respuesta.precioProducto);

                        // Encuentra el siguiente elemento editable en la misma fila o siguiente fila
                        if (nextEditable.length === 0) {
                            var nextRow = currentEditable.closest('tr').next('tr');
                            nextEditable = nextRow.find('td.editable:first');
                        }


                        // Establece el atributo contenteditable, enfoca y selecciona todo el texto
                        nextEditable.attr('contenteditable', 'true').focus();

                    } else if(respuesta.end){
                        $('#submit-button').focus();
                        currentEditable.next('td').text('');                       
                        currentEditable.next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').next('td').next('td').next('td').text('');
                    }else {
                        alert(respuesta.mensaje);

                        setTimeout(function () {
                            var range = document.createRange();
                            range.selectNodeContents(currentEditable[0]);
                            var sel = window.getSelection();
                            sel.removeAllRanges();
                            sel.addRange(range);
                        }, 10);
                        // Actualiza el contenido de la celda vacía con el nombre del producto obtenido
                        currentEditable.next('td').text('');                       
                        currentEditable.next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').next('td').next('td').next('td').text('');
                    }
                },
                error: function () {
                    alert("Error al buscar el nombre del producto.");
                }
            });
        }

        function buscarNombreCliente(codigoCliente, currentEditableCliente) {
            // Realiza una solicitud AJAX para obtener el nombre del producto desde nombre_producto.php
            $.ajax({
                type: "POST",
                url: "backend/buscadorclientes.php",
                data: { codigoCliente: codigoCliente },
                dataType: "json", // Indica que esperamos un JSON como respuesta
                success: function (respuesta) {
                    if (respuesta.success) {
                        // Actualiza el contenido de la celda vacía con el nombre del producto obtenido
                        $('#inputContacto').val(respuesta.nombreCliente);                       

                        // Encuentra el siguiente elemento editable en la misma fila o siguiente fila
                        //var nextEditable = ($)

                        // Establece el atributo contenteditable, enfoca y selecciona todo el texto
                        $('.editableFormCodProducto:first').attr('contenteditable', 'true').focus();


                    } else {
                        alert(respuesta.mensaje);
                        $('#inputContacto').val('');
                        currentEditableCliente.select();
                    }
                },
                error: function () {
                    alert("Error al buscar el nombre del producto.");
                }
            });
        }

        $("#addPropiedadFom").on("submit", function (e) {
            // Muestra una alerta de confirmación y obtiene la respuesta del usuario
            var respuesta = confirm("¿Estás seguro de crear la factura?");

            // Si la respuesta es "No", evita el envío del formulario
            if (!respuesta) {
                e.preventDefault();
            }
        });
    });
</script>
</body>
</html>