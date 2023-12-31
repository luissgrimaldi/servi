<?php include 'header.php'?>
<?php
    $sentencia = $connect->prepare("SELECT * FROM `facturas`") or die('query failed');
    $sentencia->execute();
    $consultasXpagina = 25;
    $consultasTotales = $sentencia->rowCount();
    $paginas = $consultasTotales/$consultasXpagina;
    $paginas = ceil($paginas);
    if(!$_GET ||$_GET["pagina"]<1){header('Location:verfacturas.php?pagina=1');}elseif($_GET['pagina']>$paginas){header('Location:verfacturas.php?pagina=1');}?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-magnifying-glass main__h1--emoji"></i><h1 class="main__h1">Productos</h1></div>
                </div>
                <div class="main__decoration"></div>          
                    <div class="main__perfil">                   
                        <div class="main__perfil__container">  
                            <div class="form__bloque__content content">
                                <input type="text" class="form__text content__text" placeholder="Buscar producto" name="buscadorclientes" id="buscadorproductos2" autocomplete="off"> 
                                <ul class="content_ul" id="listaClientes"></ul>                
                            </div>                         
                            <ul class="propiedades__ul" id="listaProductos">
                            <?php
                                $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina; 
                                $sentencia = $connect->prepare("SELECT * FROM products LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                                $sentencia->execute();
                                $list_usuarios = $sentencia->fetchAll();
                                $consultasTotalesActuales = $sentencia->rowCount();
                                echo  '<span class="resultados">';if(($inicioConsultasXpagina + $consultasTotalesActuales) > 0){echo ($inicioConsultasXpagina + 1);}else{echo 0;}; echo'-'.($inicioConsultasXpagina + $consultasTotalesActuales). ' de '. $consultasTotales. ' resultados'.'</span>';
                                foreach($list_usuarios as $usuario){
                                    $id = $usuario['id'];                                                             
                                    $nombre = $usuario['name'];                                                                                                                        
                                    $cod = $usuario['cod'];                                                                                                                     
                                    $price = $usuario['price'];                                                                                                                     
                                ?> 
                                <li class="propiedades__li" id="li<?php echo $id?>">
                                    <div class="propiedades__nombre-detalles-precio">
                                        <span class="propiedades__nombre"><?php echo $nombre.' ('.$cod.')';?></span>
                                        <span class="propiedades__precio">$ <?php echo $price;?></span>
                                    </div>                        
                                    <div class="consultas__bloque consultas__bloque--edit-search-reload"> 
                                        <div class="consultas__bloque__content consultas__edit-search-reload">
                                            <a class="consultas__edit-search-reload__content" href="admineditar.php?page=usuario&id=<?php echo $id?>"><i class="consultas__accion fa-solid fa-pencil"></i><span>Editar</span></a>                                       
                                            <a onclick="if(confirm('¿Seguro que quieres eliminar este contacto?')) delUser(<?php echo $id?>)" class="consultas__edit-search-reload__content"><i class="consultas__accion fa-solid fa-trash"></i><span>Eliminar</span></a>
                                        </div>   
                                    </div>
                                </li> 
                                <?php };?>
                            </ul>   
                            <ul class="propiedades__ul" id="listaProductos2" style="display:none"></ul>   
                    </div>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="verfacturas.php?pagina=<?php echo $_GET["pagina"]-1?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="verfacturas.php?pagina=<?php echo $i+1?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="verfacturas.php?pagina=<?php echo $_GET["pagina"]+1?>"><li>></li></a>
                    </ul>
                </div>
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