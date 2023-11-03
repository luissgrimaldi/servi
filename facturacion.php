<?php include 'header.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <i class="fa-solid fa-receipt main__h1--emoji"></i><h1 class="main__h1">Facturacion</h1>
                <div class="main__decoration"></div>
                <div class="main__atajos atajos">
                    <div class="atajos__atajo"  onClick="window.location='crearfactura.php'">
                        <i class="fa-solid fa-receipt atajo__emoji"></i>
                        <h2 class="atajo__h2">Crear factura</h2>
                    </div>
                    <div class="atajos__atajo" onclick="window.open('https:www.bbva.com.ar', '_blank');">
                        <i class="fa-solid fa-magnifying-glass atajo__emoji"></i>
                        <h2 class="atajo__h2">Buscar Factura</h2>
                    </div>                   
                </div>
                <div class="main__decoration"></div>
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