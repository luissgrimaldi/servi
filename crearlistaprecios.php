<?php include 'header.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="loader-container">
                <div class="loader"></div>
            </div> 
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-receipt main__h1--emoji"></i><h1 class="main__h1">Crear lista de precio</h1></div>                    
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">             
                    <form autocomplete="off" id="addPropiedadFom" class="form__busqueda-propiedad form" name="form" method="POST" action="backend/crearfactura.php" enctype="multipart/form-data">                                                         
                        <div class="form__bloque">   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Lista n°</label>
                                <input type="text" class="form__text content__text" id="inputLista" autocomplete="off">                          
                            </div>       
                        </div> 
                        <div class="main__decoration"></div>
                        <h2 class="main__h2">Producto</h2>                               
                        <div class="form__bloque">
                            <table id="productsTable">
                                <tr>
                                    <td>Cod</td>
                                    <td>Producto</td>
                                    <td>Categoria</td>
                                    <td>Precio</td>
                                </tr>
                                <?php
                                    $sentencia = $connect->prepare("SELECT * FROM products") or die('query failed');
                                    $sentencia->execute();
                                    $list_usuarios = $sentencia->fetchAll();
                                    $consultasTotalesActuales = $sentencia->rowCount();
                                    foreach($list_usuarios as $usuario){
                                        $id = $usuario['id'];                                                             
                                        $nombre = $usuario['name'];                                                                                                                        
                                        $cod = $usuario['cod'];                                                                                                                                                                                                                                       
                                        ?> 
                                <tr>
                                        <td class="editableFormCodProducto"><?php echo $cod?></td>
                                        <td class="editableQty"><?php echo $nombre?></td>
                                    <td></td>
                                    <td class="editable editablePrice" contenteditable="true"></td>
                                <?php };?>
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
        $("#inputLista").select();
        var eventoManejado = false;

        $(document).on("keypress focusout", ".editablePrice", function (e) {
            // Verifica si el evento ya fue manejado
            if (eventoManejado) {
                return;
            }
            
            if (e.which === 13 || e.type === 'focusout') {
                e.preventDefault();
                var currentEditable = $(this);
               
                cambiarPrecio(currentEditable);
                

                // Marca el evento como manejado
                eventoManejado = true;

                // Restablece la variable después de un breve tiempo
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
            }
        });

        $(document).on("keypress", "#inputLista", function (e) {
            if (eventoManejado) {
                return;
            }
            if ((e.which === 13)) {
                e.preventDefault(); // Evita el comportamiento predeterminado (enviar el formulario)
                var currentEditable = $(this);
                var nextEditable = currentEditable.closest('td').nextAll('td.editable:first');
                nextEditable.focus();
            
                
                // Marca el evento como manejado
                eventoManejado = true;

                // Restablece la variable después de un breve tiempo
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
            }
        });

        
        function cambiarPrecio(currentEditable) {                                 
            var nextEditable = currentEditable.closest('td').nextAll('td.editable:first');
            nextEditable.focus();
            console.log("hola")
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
