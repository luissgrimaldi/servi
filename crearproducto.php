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
                    <div class="main__title"><i class="fa-solid fa-box main__h1--emoji"></i><h1 class="main__h1">Agregar producto</h1></div>                    
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">             
                    <form autocomplete="off" id="addProductForm" class="form__busqueda-propiedad form" name="form" method="POST" action="backend/crearproducto.php" enctype="multipart/form-data">                                     
                        <h2 class="main__h2">Producto</h2>                              
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="name">Nombre</label>
                                <input type="text" class="form__text content__text" name="name" id="name"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="cod">Codigo</label>
                                <input type="text" class="form__text content__text" name="cod" id="cod"> 
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="marca">Marca</label>
                                <select class="form__select" name="marca" id="marca">                               
                                            <?php                          
                                                $sentencia = $connect->prepare("SELECT * FROM `brands`") or die('query failed');
                                                $sentencia->execute();
                                                $rows = $sentencia->fetchAll();                         
                                                foreach($rows as $row){
                                                $idMarca = $row['id'];
                                                $marcaNombre = $row['name'];
                                                ?>
                                            <option value="<?php echo $idMarca;?>"><?php echo $marcaNombre;?></option>
                                        <?php };?>
                                </select>
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="categoria">Categoria</label>
                                <select class="form__select" name="categoria" id="categoria">                               
                                            <?php                          
                                                $sentencia = $connect->prepare("SELECT * FROM `categories`") or die('query failed');
                                                $sentencia->execute();
                                                $rows = $sentencia->fetchAll();                         
                                                foreach($rows as $row){
                                                $idCategoria = $row['id'];
                                                $categoriaNombre = $row['name'];
                                                ?>
                                            <option value="<?php echo $idCategoria;?>"><?php echo $categoriaNombre;?></option>
                                        <?php };?>
                                </select>
                            </div>                          
                        </div>
                        <div class="main__decoration"></div>
                        <input type="hidden" name="submit">
                        <input id="submit-button" type="submit" name="submit" class="form__button form__bloque__button" value="Agregar producto">                                                             
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
        let form = document.getElementById('addProductForm');

        form.addEventListener('submit', (event) => {
        event.preventDefault();
            let url = form.getAttribute('action');
            let datos = new FormData(form);

        // Hacer solicitud con fetch
        fetch(url, {
            method:'POST',
            body: datos,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
        .then(data => {
            if(data.status == "success"){
                alert(data.message);  
                window.location.href= "productos.php";
            }else{
                alert(data.message);
            } 
        })
        .catch(err => console.log(err))
        });
    </script>
</body>
</html>