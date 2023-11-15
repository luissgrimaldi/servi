<?php include 'header.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="loader-container">
                <div class="loader"></div>
            </div>
            <div id="modalEditar" class="modal-BG">                                              
                <div class="modal">      
                    <form autocomplete="off" class="form__busqueda-propiedad form" id="formEventoEditar" method="POST">
                        <input type="hidden" value="" id="idEditar" name="idEditar">      
                        <h2 class="main__h2">Ficha de agenda</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content--radio content">
                                <label  class="form__label content__label" for="">Visita</label>
                                    <input type="radio" name="tipoActividad" id="radioVisitaEditar" onclick=" tipoTareaEdit(1); " value="1">
                                    <label  class="form__label content__label" for="">Tarea</label>
                                    <input type="radio" name="tipoActividad" id="radioTareaEditar" onclick=" tipoTareaEdit(2); " value="1">
                            </div>
                        
                        </div>                 
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Asunto</label>
                                <input type="text" class="form__text content__text" name="asuntoEditar" value="" id="asuntoEditar">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Fecha</label>
                                <input type="date" class="form__text content__text" name="fechaEditar" value="" id="fechaEditar">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Observaciones</label>
                                <textarea class="form__textarea content__textarea" name="observacionesEditar" id="observacionesEditar"></textarea>                                 
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Hora de inicio</label>
                                <input type="time" class="form__text content__text" name="horaEditar" id="horaEditar">                                  
                            </div>
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Terminada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="finalizadaEditar" id="finalizadaEditar" value="1">
                            </div>  
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content" id="propiedadContentEditar" style="display:none">
                                <label  class="form__label content__label" for="">Propiedad</label>
                                <input type="text" class="form__text content__text" name="buscadorpropiedad3" id="buscadorpropiedad3">
                                <input type="hidden" class="form__text content__text" name="editar_propiedad_id" id="editar_propiedad_id">  
                                <ul class="content_ul" id="listaPropiedadesEditar"></ul>
                                                            
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Consulta</label>
                                <input type="text" class="form__text content__text" name="buscadorconsulta2" id="buscadorconsulta2">
                                <input type="hidden" class="form__text content__text" name="editar_consulta_id" id="editar_consulta_id">   
                                <ul class="content_ul" id="listaConsultasEditar"></ul>                               
                            </div>
                        </div>                
                        <input type="hidden" name="submit">
                        <div class="main__decoration"></div>
                        <input type="submit" class="form__button" value="Guardar cambios">  
                        <button type="button" class="form__button form__button--salir" id="salirEditar">Salir</button>                                                          
                    </form>
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
                                <input type="text" class="form__text content__text" placeholder="Ingrese nombre del cliente" name="buscadorclientes" id="buscadorclientes" autocomplete="off"> 
                                <ul class="content_ul" id="listaClientes"></ul>                
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
                            <div class="form__bloque__content content">
                                <input type="text" class="form__text content__text" placeholder="Ingrese nombre del producto" name="buscadorproductos" id="buscadorproductos" autocomplete="off"> 
                                <ul class="content_ul" id="listaProductos"></ul>                
                            </div>     
                        </div>                               
                        <div class="form__bloque">
                            <table>
                                <tr>
                                    <td>Cod</td>
                                    <td>Producto</td>
                                    <td>Precio</td>
                                </tr>
                                <tr>
                                    <td class="editableForm editable" contenteditable="true"></td>
                                    <td></td>
                                    <td class="editable" contenteditable="true"></td>
                                    <input type="hidden" name="inputCodigoProducto" id="inputCodigoProducto" readonly="readonly"> 
                                </tr>
                                <tr>
                                    <td class="editableForm editable" contenteditable="true"></td>
                                    <td></td>
                                    <td class="editable" contenteditable="true"></td>
                                    <input type="hidden" name="inputCodigoProducto" id="inputCodigoProducto" readonly="readonly"> 
                                </tr>
                                <tr>
                                    <td class="editableForm editable" contenteditable="true"></td>
                                    <td></td>
                                    <td class="editable" contenteditable="true"></td>
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
        $(".editableForm").on("keypress", function (e) {
            if (e.which === 13) { // Verifica si la tecla presionada es "Enter"
                e.preventDefault(); // Evita el comportamiento predeterminado (enviar el formulario)
                var codigoProducto = $(this).text().trim();
                var currentEditable = $(this);
                buscarNombreProducto(codigoProducto, currentEditable);
            }
        });

        $(".editable").on("keypress", function (e) {
            if (e.which === 13) { // Verifica si la tecla presionada es "Enter"
            e.preventDefault();

            // Verifica si el elemento actual tiene la clase 'editableForm'
            if ($(this).hasClass('editableForm')) {
                return; // No hagas nada si tiene la clase 'editableForm'
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

            nextEditable.attr('contenteditable', 'true').focus();
    }
});



        function buscarNombreProducto(codigoProducto, currentEditable) {
            // Realiza una solicitud AJAX para obtener el nombre del producto desde nombre_producto.php
            $.ajax({
                type: "POST",
                url: "backend/buscadorproductos.php",
                data: { codigoProducto: codigoProducto },
                dataType: "json", // Indica que esperamos un JSON como respuesta
                success: function (respuesta) {
                    if (respuesta.success) {
                        // Actualiza el contenido de la celda vacía con el nombre del producto obtenido
                        currentEditable.next('td').text(respuesta.nombreProducto);

                        // Actualiza el contenido de la celda vacía con el precio del producto obtenido
                        currentEditable.next('td').next('td').text(respuesta.precioProducto);

                        // Encuentra el siguiente elemento editableForm y le da foco
                        // Encuentra el siguiente elemento editable en la misma fila o siguiente fila
                        var nextEditable = currentEditable.closest('td').nextAll('td.editable:first');
                        if (nextEditable.length === 0) {
                            var nextRow = currentEditable.closest('tr').next('tr');
                            nextEditable = nextRow.find('td.editable:first');
                        }

                        // Establece el atributo contenteditable, enfoca y selecciona todo el texto
                        nextEditable.attr('contenteditable', 'true').focus();

                        // Espera un breve momento antes de seleccionar para asegurar que el enfoque se complete
                        setTimeout(function () {
                            var range = document.createRange();
                            range.selectNodeContents(nextEditable[0]);
                            var sel = window.getSelection();
                            sel.removeAllRanges();
                            sel.addRange(range);
                        }, 10);

                    } else {
                        alert(respuesta.mensaje);
                    }
                },
                error: function () {
                    alert("Error al buscar el nombre del producto.");
                }
            });
        }

        // Manejar el evento submit del formulario
        $("#tuFormulario").submit(function (e) {
            e.preventDefault(); // Evita el comportamiento predeterminado del formulario
            // Puedes agregar lógica adicional aquí si es necesario
        });
    });
</script>
</body>
</html>