<?php include 'header.php' ?>

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <i class="fa-solid fa-home-user main__h1--emoji"></i><h1 class="main__h1">Inicio</h1>
                <div class="main__decoration"></div>
                <div class="main__atajos atajos">
                    <div class="atajos__atajo" onclick="window.open('https:www.afip.gob.ar', '_blank');">
                        <img class="atajo__img" src="media/logos-marcas-empresas/logo_afip.png" alt="">
                    </div>
                    <div class="atajos__atajo" onclick="window.open('https:www.bbva.com.ar', '_blank');">
                        <img class="atajo__img" src="media/logos-marcas-empresas/logo_bbva.png" alt="">
                    </div>
                    <div class="atajos__atajo" onclick="window.open('https:www.bancoprovincia.com.ar', '_blank');">
                        <img class="atajo__img" src="media/logos-marcas-empresas/logo_provincia.png" alt="">
                    </div>
                    <div class="atajos__atajo" onclick="window.open('https:www.interbanking.com.ar', '_blank');">
                        <img class="atajo__img" src="media/logos-marcas-empresas/logo_interbanking.png" alt="">
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