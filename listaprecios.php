<?php include 'header.php'?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-tags main__h1--emoji"></i><h1 class="main__h1">Lista de precios</h1></div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__atajos atajos">
                    <div class="atajos__atajo"  onClick="window.location='crearlistaprecios.php'">
                        <i class="fa-solid fa-tags atajo__emoji"></i>
                        <h2 class="atajo__h2">Agregar lista</h2>
                    </div>           
                    <div class="atajos__atajo" onclick="window.open('verlistaprecios.php', '_blank');">
                        <i class="fa-solid fa-magnifying-glass atajo__emoji"></i>
                        <h2 class="atajo__h2">Ver listas</h2>
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