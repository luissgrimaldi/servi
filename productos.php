<?php include 'header.php'?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-box main__h1--emoji"></i><h1 class="main__h1">Productos</h1></div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__atajos atajos">
                    <div class="atajos__atajo"  onClick="window.location='crearproducto.php'">
                        <i class="fa-solid fa-box atajo__emoji"></i>
                        <h2 class="atajo__h2">Agregar producto</h2>
                    </div> 
                    <div class="atajos__atajo"  onClick="window.location='crearproducto.php'">
                        <i class="fa-solid fa-clipboard atajo__emoji"></i>
                        <h2 class="atajo__h2">Gestionar stock</h2>
                    </div> 
                    <div class="atajos__atajo" onclick="window.open('categorias.php', '_blank');">
                        <i class="fa-solid fa-magnifying-glass atajo__emoji"></i>
                        <h2 class="atajo__h2">Categorias</h2>
                    </div>                 
                    <div class="atajos__atajo" onclick="window.open('buscarproductos.php', '_blank');">
                        <i class="fa-solid fa-magnifying-glass atajo__emoji"></i>
                        <h2 class="atajo__h2">Buscar productos</h2>
                    </div>                 
                </div>
                <div class="main__decoration"></div>           
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php include 'sidebar.php';?>
    </div>
    <script src="js/index.js?<?php echo servicorrVersion;?>"></script>
</body>
</html>