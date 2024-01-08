<?php
include 'connect.php';

$campo = trim($_POST['verificarLista']);

if (!empty($campo)) {
    $sentencia2 = $connect->prepare("SELECT lista FROM prices WHERE lista = ?");
    $sentencia2->execute([$campo]);
}

// Verificar si hay resultados
$rowCount = $sentencia2->rowCount();

if ($rowCount > 0) {

    // Puedes hacer algo con $resultado si es necesario
    $respuesta = array("success" => false, "mensaje" => "Esa lista ya existe");

} else {
    // No hay resultados, la lista no existe
    $respuesta = array("success" => true, "mensaje" => "");
}


?>
