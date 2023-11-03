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
                    <div class="main__title"><i class="fa-solid fa-receipt main__h1--emoji"></i><h1 class="main__h1">Crear factura</h1></div>                    
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">             
                    <form autocomplete="off" id="addPropiedadForm" class="form__busqueda-propiedad form" name="form" method="POST" action="backend/agregar.php?page=propiedad" enctype="multipart/form-data">                                     
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
                                <input type="text" class="form__text content__text" name="inputContacto" id="inputContacto" readonly="readonly"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Codigo Cliente</label>
                                <input type="text" class="form__text content__text" name="inputEmail" id="inputEmail" readonly="readonly"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Teléfono</label>
                                <input type="text" class="form__text content__text" name="inputTelefono" id="inputTelefono" readonly="readonly"> 
                            </div>                          
                            <input type="hidden" class="form__text content__text" name="contacto_id" id="contacto_id">
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
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Codigo</label>
                                <input type="text" class="form__text content__text" name="inputCodigoProducto" id="inputCodigoProducto" readonly="readonly"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nombre Producto</label>
                                <input type="text" class="form__text content__text" name="inputNombreProducto" id="inputNombreProducto" readonly="readonly"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio</label>
                                <input type="text" class="form__text content__text" name="inputPrecioProducto" id="inputPrecioProducto"> 
                            </div>                          
                            <input type="hidden" class="form__text content__text" name="inputIdProducto" id="inputIdProducto">
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
</body>
</html>