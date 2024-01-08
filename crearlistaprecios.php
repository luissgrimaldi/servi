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
                verificarLista(currentEditable);
                $('.editablePrice:first').attr('contenteditable', 'true').focus();
            
                // Marca el evento como manejado
                eventoManejado = true;

                // Restablece la variable después de un breve tiempo
                setTimeout(function () {
                    eventoManejado = false;
                }, 100);
            }
        });

        function verificarLista(currentEditable) {
            // Realiza una solicitud AJAX para obtener el nombre del producto desde nombre_producto.php
            var verificarLista = $('#inputLista').val();
            $.ajax({
                type: "POST",
                url: "backend/verificarlista.php",
                data: { verificarLista: verificarLista },
                dataType: "json", // Indica que esperamos un JSON como respuesta
                success: function (respuesta) {
                    if (respuesta.success) {
                        $('.editablePrice:first').attr('contenteditable', 'true').focus();
                    } else {
                        alert(respuesta);
                    }
                },
                error: function () {
                    alert("Error al buscar la lista");
                    $("#inputLista").select();
                }
            });
        }

        
        function cambiarPrecio(currentEditable) {                                 
            var nextRow = currentEditable.closest('tr').next('tr');
            var nextEditable = nextRow.find('td.editable');
            if (nextEditable.length != 0){
                nextEditable.focus();
            }else{
                $('#submit-button').focus();
            }
        }


        $('#addPropiedadFom').submit(function (e) {
            e.preventDefault();
            var list = $("#inputLista").val();
            var allCod = [];
            var allPrice = [];
            
            // Obtener valores de arrays
            $('td.editableFormCodProducto').each(function () {
                var cod = $(this).text().trim();
                if (cod) {
                    allCod.push(cod);
                }
            });
            $('td.editablePrice').each(function () {
                var price = $(this).text().trim();
                if (price) {
                    allPrice.push(price);
                }
            });   
            

            var confirmacion = confirm("¿Desea crear la factura?");

            if (confirmacion) {
                // Concatenar los arrays en la cadena de consulta de la URL
                var queryString = 'backend/crearlistaprecios.php?&arrayCod=' + JSON.stringify(allCod) +
                    '&arrayPrice=' + JSON.stringify(allPrice) +
                    '&list=' + list;
                    
                // Redirigir a la página con la cadena de consulta
                window.location.href = queryString;
            }
           
        });
});
</script>
</body>
</html>
