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
                        <input type="text" class="form__text content__text" placeholder="Buscar producto" name="buscadorproductos" id="buscadorproductos3" autocomplete="off">               
                    </div>                         
                    <ul class="propiedades__ul" id="listaProductos">
                    <?php
                        $sentencia = $connect->prepare("SELECT p.id, p.name, p.cod, b.name AS b_name, c.name AS c_name FROM products p
                        LEFT JOIN brands b ON  p.brand =b.id
                        LEFT JOIN categories c ON  p.category =c.id
                        ") or die('query failed');
                        $sentencia->execute();
                        $rows = $sentencia->fetchAll();
                        $consultasTotalesActuales = $sentencia->rowCount();
                        foreach($rows as $row){
                            $id = $row['id'];                                                             
                            $nombre = $row['name'];                                                                                                                        
                            $cod = $row['cod'];                                                                                                                     
                            $marca = $row['b_name'];                                                                                                                     
                            $categoria = $row['c_name'];                                                                                                                     
                        ?>
                        <li class="propiedades__li" id="li<?php echo $id?>">
                            <div class="propiedades__nombre-detalles-precio">
                                <span class="propiedades__nombre"><?php echo $marca.' '.$nombre.' ('.$cod.')';?></span>
                                <span class="propiedades__precio"><?php echo $categoria;?></span>
                            </div>                       
                            <div class="consultas__bloque consultas__bloque--edit-search-reload"> 
                                <div class="consultas__bloque__content consultas__edit-search-reload">
                                    <a class="consultas__edit-search-reload__content selectProduct" data-codproduct="<?php echo $cod;?>"><i class="consultas__accion fa-solid fa-pencil"></i><span>Seleccionar</span></a>
                                </div>   
                            </div>
                        </li> 
                        <?php };?>
                    </ul>   
                    <ul class="propiedades__ul" id="listaProductos3" style="display:none"></ul> 
                    <div class="main__decoration"></div> 
                    <button type="button" class="form__button form__button--salir" id="salirProducto">Salir</button> 
                </div>                      
            </div>
            <div id="modalBuscarCliente" class="modal-BG">
                <div class="modal"> 
                    <div class="form__bloque__content content">
                        <input type="text" class="form__text content__text" placeholder="Buscar cliente" name="buscadorclientes" id="buscadorclientes3" autocomplete="off">               
                    </div>                         
                    <ul class="propiedades__ul" id="listaClientes">
                    <?php
                        $sentencia = $connect->prepare("SELECT * FROM customers") or die('query failed');
                        $sentencia->execute();
                        $rows = $sentencia->fetchAll();
                        $consultasTotalesActuales = $sentencia->rowCount();
                        foreach($rows as $row){
                            $id = $row['id'];                                                             
                            $nombre = $row['name'];                                                                                                                        
                            $cod = $row['cod'];                                                                                                                   
                        ?>
                        <li class="propiedades__li" id="li<?php echo $id?>">
                            <div class="propiedades__nombre-detalles-precio">
                                <span class="propiedades__nombre"><?php echo $nombre.' ('.$cod.')';?></span>
                            </div>                       
                            <div class="consultas__bloque consultas__bloque--edit-search-reload"> 
                                <div class="consultas__bloque__content consultas__edit-search-reload">
                                    <a class="consultas__edit-search-reload__content selectCustomer" data-codcustomer="<?php echo $cod;?>"><i class="consultas__accion fa-solid fa-pencil"></i><span>Seleccionar</span></a>
                                </div>   
                            </div>
                        </li> 
                        <?php };?>
                    </ul>   
                    <ul class="propiedades__ul" id="listaClientes3" style="display:none"></ul> 
                    <div class="main__decoration"></div> 
                    <button type="button" class="form__button form__button--salir" id="salirCliente">Salir</button> 
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
                                <input type="text" class="form__text content__text editableFormCodCliente" placeholder="Ingrese codigo del cliente" name="codigoCliente" autocomplete="off">               
                            </div>       
                        </div>                               
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nombre</label>
                                <input type="text" class="form__text content__text readonly" name="inputNombre" id="inputContacto" readonly="readonly"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Codigo Cliente</label>
                                <input type="text" class="form__text content__text readonly" id="inputCodigoCliente" readonly="readonly"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Teléfono</label>
                                <input type="text" class="form__text content__text readonly" id="inputTelefono" readonly="readonly"> 
                            </div>                          
                            <input type="hidden" class="form__text content__text readonly" name="cliente_id" id="cliente_id">
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <input type="text" class="form__text content__text" name="codigoCondicionPago"  placeholder="Ingrese condición de pago" id="codigoCondicionPago"> 
                            </div>  
                        </div>
                        <div class="form__bloque"> 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Condicion de pago</label>                                                    
                                <input type="text" class="form__text content__text readonly" name="inputCondicionPago" id="inputCondicionPago" readonly="readonly"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Bonificación</label>
                                <input type="text" class="form__text content__text readonly" name="inputBonifCondicionPago" id="inputBonifCondicionPago" readonly="readonly"> 
                            </div>                          
                            <input type="hidden" class="form__text content__text" name="cliente_id" id="cliente_id">
                        </div>

                        <div class="form__bloque">                       
                            <div class="form__bloque__content content">                         
                                <select class="form__select content__select" name="" id="tipoProducto">
                                    <option value="1">B. Cambios</option>
                                    <option value="2">Servicios</option>
                                    <option value="3">Ambos</option>
                                </select>
                            </div>                                              
                        </div>

                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Bonificación</label>
                                <div><input type="text" class="form__text content__text" id="bonificación" placeholder="0" autocomplete="off"><span>%</span></div>                           
                            </div>       
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Lista de precios</label>
                                <input type="text" class="form__text content__text" id="listaPrecios" autocomplete="off">                          
                            </div>       
                        </div> 

                        <div class="form__bloque">   
                            <div class="form__bloque__content content">
                                <input type="text" class="form__text content__text" name="codigoVendedor" id="codigoVendedor" placeholder="Ingrese código de vendedor" autocomplete="off">                          
                            </div>       
                        </div> 
                        <div class="form__bloque">   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Vendedor</label>
                                <input type="text" class="form__text content__text readonly" id="inputVendedor" autocomplete="off" readonly>                          
                            </div>       
                        </div> 
                        <div class="main__decoration"></div>
                        <h2 class="main__h2">Producto</h2>                               
                        <div class="form__bloque">
                            <table id="productsTable">
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
                                </tr>
                            </table>                         
                            <input type="hidden" name="inputCodigoProducto[]" id="inputCodigoProducto" readonly="readonly"> 
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
        var eventoManejado = false;

        $(document).on("keypress focusout", ".editableFormCodProducto", function (e) {
            // Verifica si el evento ya fue manejado
            if (eventoManejado) {
                return;
            }
            
            if (e.which === 13 || e.type === 'focusout') {
                e.preventDefault();
                var codigoProducto = $(this).text().trim();
                var currentEditable = $(this);

                if (codigoProducto === "00") {
                    $("#modalBuscarProducto").show();
                    $(document).on("click", "#salirProducto", function (e){
                        $("#modalBuscarProducto").hide();
                        currentEditable.text('');
                        currentEditable.focus();
                        // Actualiza el contenido de la celda vacía con el nombre del producto obtenido
                        currentEditable.next('td').text('');                       
                        currentEditable.next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').next('td').next('td').text('');
                        currentEditable.next('td').next('td').next('td').next('td').next('td').next('td').text('');
                    })
                    $(document).off("click", ".selectProduct").on("click", ".selectProduct", function (e) {
                        codigoProducto = $(this).data("codproduct");
                        $("#modalBuscarProducto").hide();
                        currentEditable.text(codigoProducto);
                        buscarNombreProducto(codigoProducto, currentEditable);                   
                    })
                } else {
                    buscarNombreProducto(codigoProducto, currentEditable);
                }

                // Marca el evento como manejado
                eventoManejado = true;

                // Restablece la variable después de un breve tiempo
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
            }
        });

        $(document).on("keypress", ".editableFormCodCliente", function (e) {
            if (eventoManejado) {
                return;
            }
            if ((e.which === 13)) {
                e.preventDefault(); // Evita el comportamiento predeterminado (enviar el formulario)
                var codigoCliente = $(this).val().trim();
                var currentEditableCliente = $(this);
                if (codigoCliente === "00") {
                    $("#modalBuscarCliente").show();
                    $(document).on("click", "#salirCliente", function (e){
                        $("#modalBuscarCliente").hide();
                        currentEditableCliente.val('');
                        currentEditableCliente.select();
                        // Actualiza el contenido de la celda vacía con el nombre del producto obtenido
                        $('#inputContacto').val('');
                    })
                    $(document).off("click", ".selectCustomer").on("click", ".selectCustomer", function (e) {
                        codigoCliente = $(this).data("codcustomer");
                        $("#modalBuscarCliente").hide();
                        currentEditableCliente.val(codigoCliente);
                        buscarNombreCliente(codigoCliente, currentEditableCliente);                  
                    })
                } else {
                    buscarNombreCliente(codigoCliente, currentEditableCliente);
                }
                // Marca el evento como manejado
                eventoManejado = true;

                // Restablece la variable después de un breve tiempo
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
            }
        });

        $(document).on("keypress", "#codigoCondicionPago", function (e) {
            if (eventoManejado) {
                return;
            }
            if ((e.which === 13)) {
                e.preventDefault(); // Evita el comportamiento predeterminado (enviar el formulario)
                var codigoCondicionPago = $(this).val().trim();
                var currentEditableCondicionPago = $(this);               
                buscarCondicionPago(codigoCondicionPago, currentEditableCondicionPago);
                // Marca el evento como manejado
                eventoManejado = true;

                // Restablece la variable después de un breve tiempo
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
            }
        });

        $(document).on("keypress", "#tipoProducto", function (e) {
            e.preventDefault();
            if (eventoManejado) {
                return;
            }
            if ((e.which === 13)) {

                $('#bonificación').select();
                
                // Marca el evento como manejado
                eventoManejado = true;

                // Restablece la variable después de un breve tiempo
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
            }
        });

        $(document).on("keypress", "#bonificación", function (e) {
            if (eventoManejado) {
                return;
            }
            if ((e.which === 13)) {
                e.preventDefault();
                $('#listaPrecios').select();
                
                // Marca el evento como manejado
                eventoManejado = true;

                // Restablece la variable después de un breve tiempo
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
            }
        });

        $(document).on("keypress", "#listaPrecios", function (e) {
            if (eventoManejado) {
                return;
            }
            if ((e.which === 13)) {
                e.preventDefault();
                $('#codigoVendedor').select();           
                
                // Marca el evento como manejado
                eventoManejado = true;

                // Restablece la variable después de un breve tiempo
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
            }
        });

        $(document).on("keypress", "#codigoVendedor", function (e) {
            if (eventoManejado) {
                return;
            }
            if ((e.which === 13)) {
                e.preventDefault();

                var codigoVendedor = $(this).val().trim();
                var currentEditableVendedor = $(this);               
                buscarNombreVendedor(codigoVendedor, currentEditableVendedor);  
                
                // Marca el evento como manejado
                eventoManejado = true;

                // Restablece la variable después de un breve tiempo
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
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
                
                if ($(this).hasClass('editableQty') && parseFloat($(this).text()) > 0){
                    var qty = $(this).text();
                    var price = $(this).next().text();
                    price = price*qty;
                    var bonif1 = $(this).next().next().text();
                    var bonif2 = $(this).next().next().next().text();
                    if(!isNaN(bonif1)){
                        var descuento1 = (price*bonif1)/100;
                        price = price-descuento1;
                    }
                    if(!isNaN(bonif2)){
                        var descuento2 = (price*bonif2)/100;
                        price = price-descuento2;
                    }
                    $(this).next('td').next('td').next().next('td').text(price.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                }
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
                    $(this).next('td').next('td').next('td').text(price.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                }

                if ($(this).hasClass('editableB1')){
                    var qty = $(this).prev().prev('td').text();
                    var price = $(this).prev().text();
                    price = qty*price;
                    var bonif1 = $(this).text();
                    var bonif2 = $(this).next().text();
                    if(isNaN(bonif1) || bonif1 == ""){
                        $(this).text(0);
                    }

                    if (parseFloat(bonif1) > 0) {
                        var descuento1 = (price*bonif1)/100;
                        price = price-descuento1;
                    }

                    if (parseFloat(bonif2) > 0) {
                        var descuento2 = (price*bonif2)/100;
                        price = price-descuento2;
                    }

                    $(this).next('td').next('td').text(price.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                }

                if ($(this).hasClass('editableB2')){
                    var qty = $(this).prev().prev().prev('td').text();
                    var price = $(this).prev().prev().text();
                    price = qty*price;
                    var bonif1 = $(this).prev().text();
                    var bonif2 = $(this).text();
                    if(isNaN(bonif2) || bonif2 == ""){
                        $(this).text(0);
                    }

                    if (parseFloat(bonif1) > 0) {
                        var descuento1 = (price*bonif1)/100;
                        price = price-descuento1;
                    }

                    if (parseFloat(bonif2) > 0) {
                        var descuento2 = (price*bonif2)/100;
                        price = price-descuento2;
                    }
                    $(this).next('td').text(price.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
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
                        agregarFila();
                        var nextEditable = currentEditable.closest('td').nextAll('td.editable:first');
                        var condicionPagoPorcentaje = $('#inputBonifCondicionPago').val();
                        var precioProducto = precioProducto + (respuesta.precioProducto*condicionPagoPorcentaje)
                        // Actualiza el contenido de la celda vacía con el nombre del producto obtenido
                        currentEditable.next('td').text(respuesta.nombreProducto);                       

                        // Actualiza el contenido de la celda vacía con el precio del producto obtenido
                        currentEditable.next('td').next('td').next('td').text(precioProducto);

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
                        
                        currentEditable.text('');
                        currentEditable.focus();
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
                        $('#inputCodigoCliente').val(respuesta.codigoCliente);                       

                        // Establece el atributo contenteditable, enfoca y selecciona todo el texto
                        $('#codigoCondicionPago').select();


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

        function buscarCondicionPago(codigoCondicionPago, currentEditableCondicionPago) {
            // Realiza una solicitud AJAX para obtener el nombre del producto desde nombre_producto.php
            $.ajax({
                type: "POST",
                url: "backend/buscadorcondicionpago.php",
                data: { codigoCondicionPago: codigoCondicionPago },
                dataType: "json", // Indica que esperamos un JSON como respuesta
                success: function (respuesta) {
                    if (respuesta.success) {
                        // Actualiza el contenido de la celda vacía con el nombre del producto obtenido
                        $('#inputCondicionPago').val(respuesta.nombreCondicionPago);                       
                        $('#inputBonifCondicionPago').val(respuesta.bonifCondicionPago);                       

                        // Encuentra el siguiente elemento editable en la misma fila o siguiente fila
                        //var nextEditable = ($)

                        // Establece el atributo contenteditable, enfoca y selecciona todo el texto
                        $('#tipoProducto').focus();


                    } else {
                        alert(respuesta.mensaje);
                        $('#inputCondicionPago').val('');
                        $('#inputBonifCondicionPago').val('');
                        currentEditableCondicionPago.select();
                    }
                },
                error: function () {
                    alert("Error al buscar la condición de pago.");
                }
            });
        }

        function buscarNombreVendedor(codigoVendedor, currentEditableVendedor) {
            // Realiza una solicitud AJAX para obtener el nombre del producto desde nombre_producto.php
            $.ajax({
                type: "POST",
                url: "backend/buscadorvendedores.php",
                data: { codigoVendedor: codigoVendedor },
                dataType: "json", // Indica que esperamos un JSON como respuesta
                success: function (respuesta) {
                    if (respuesta.success) {
                        // Actualiza el contenido de la celda vacía con el nombre del producto obtenido
                        $('#inputVendedor').val(respuesta.nombreVendedor);                       
                        $('#codigoVendedor').val(respuesta.codigoVendedor);                       

                        // Establece el atributo contenteditable, enfoca y selecciona todo el texto
                        $('.editableFormCodProducto:first').attr('contenteditable', 'true').focus();


                    } else {
                        alert(respuesta.mensaje);
                        $('#inputVendedor').val('');
                        currentEditableVendedor.select();
                    }
                },
                error: function () {
                    alert("Error al buscar el nombre del Vendedor.");
                }
            });
        }
        

        $('#addPropiedadFom').submit(function (e) {
            e.preventDefault();

            var allIds = [];
            var allQty = [];
            var allPrice = [];
            var allBonif1 = [];
            var allBonif2 = [];
            
            // Obtener valores de arrays
            $('td.editableFormCodProducto').each(function () {
                var id = $(this).text().trim();
                if (id) {
                    allIds.push(id);
                }
            });
            $('td.editableQty').each(function () {
                var qty = $(this).text().trim();
                if (qty) {
                    allQty.push(qty);
                }
            });
            $('td.editablePrice').each(function () {
                var price = $(this).text().trim();
                if (price) {
                    allPrice.push(price);
                }
            });
            $('td.editableB1').each(function () {
                var b1 = $(this).text().trim();
                if (b1) {
                    allBonif1.push(b1);
                }
            });
            $('td.editableB2').each(function () {
                var b2 = $(this).text().trim();
                if (b2) {
                    allBonif2.push(b2);
                }
            });

            // Verificar si los arrays tienen al menos un elemento
            if (allIds.length > 0 && allQty.length > 0 && allPrice.length > 0 && allBonif1.length > 0 && allBonif2.length > 0) {
                // Preguntar al usuario si desea crear la factura
                var confirmacion = confirm("¿Desea crear la factura?");

                if (confirmacion) {
                    // Concatenar los arrays en la cadena de consulta de la URL
                    var queryString = 'backend/crearfactura.php?arrayIds=' + JSON.stringify(allIds) +
                        '&arrayQty=' + JSON.stringify(allQty) +
                        '&arrayPrice=' + JSON.stringify(allPrice) +
                        '&arrayBonif1=' + JSON.stringify(allBonif1) +
                        '&arrayBonif2=' + JSON.stringify(allBonif2);
                        
                    // Redirigir a la página con la cadena de consulta
                    window.location.href = queryString;
                }
            } else {
                // Informar al usuario que los arrays están vacíos
                alert("Debe agregar al menos un producto antes de crear la factura.");
                $('.editableFormCodProducto:first').focus();
                eventoManejado = true;
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
            }
        });

});
</script>
</body>
</html>
