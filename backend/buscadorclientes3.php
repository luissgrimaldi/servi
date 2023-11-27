<?php
include 'connect.php';

$campo = trim($_POST['buscadorclientes']);

if (!empty($campo)) {
    $sentencia2 = $connect->prepare("SELECT * FROM `customers` WHERE trim(name) LIKE ? OR `cod` LIKE ?");
    $sentencia2->execute([$campo . '%', $campo . '%']);
}

$html = "";

while ($row = $sentencia2->fetch()) {
    $html .= '
    <li class="propiedades__li" id="li' . $row["id"] . '">
        <div class="propiedades__nombre-detalles-precio">
            <span class="propiedades__nombre">' . $row["name"] . ' (' . $row["cod"] . ')</span>
        </div>
        <div class="consultas__bloque consultas__bloque--edit-search-reload">
            <div class="consultas__bloque__content consultas__edit-search-reload">
                <a class="consultas__edit-search-reload__content selectCustomer" data-codcustomer="'. $row["cod"].'"><i class="consultas__accion fa-solid fa-pencil"></i><span>Seleccionar</span></a>                                      
            </div>   
        </div>
    </li>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>
