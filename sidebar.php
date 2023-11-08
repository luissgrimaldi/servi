        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* SideBar */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="sidebar" id="sidebar">
            <nav class="sidebar__nav">
                <ul class="sidebar__ul">
                    <li onclick="window.location.href = 'index.php';" class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "index.php"){ echo "sidebar__li--active";}?>"><a href="index.php" class="sidebar__a"><i class="fa-solid fa-home-user sidebar__emoji"></i>Inicio</a></li>
                    <li onclick="window.location.href = 'facturacion.php';" class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "facturacion.php"){ echo "sidebar__li--active";}?>"><a href="facturacion.php" class="sidebar__a"><i class="fa-solid fa-receipt sidebar__emoji"></i>Facturación</a></li>
                    <li onclick="window.location.href = 'productos.php';" class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "productos.php"){ echo "sidebar__li--active";}?>"><a href="productos.php" class="sidebar__a"><i class="fa-solid fa-box sidebar__emoji"></i>Productos</a></li>
                    <li onclick="window.location.href = 'clientes.php';" class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "clientes.php"){ echo "sidebar__li--active";}?>"><a href="clientes.php" class="sidebar__a"><i class="fa-solid fa-address-book sidebar__emoji"></i>Clientes</a></li>
                    <li onclick="window.location.href = 'estadisticas.php';" class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "estadisticas.php"){ echo "sidebar__li--active";}?>"><a href="clientes.php" class="sidebar__a"><i class="fa-solid fa-chart-pie sidebar__emoji"></i>Estadisticas</a></li>
                    <li onclick="window.location.href = 'controladmin.php';" class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "controladmin.php"){ echo "sidebar__li--active";}?>"><a href="controladmin.php" class="sidebar__a"><i class="fa-solid fa-gauge sidebar__emoji"></i>Usuarios</a></li>
                </ul>   
            </nav>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End SideBar */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->