<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el código del Cliente desde la solicitud POST
    $codigoCliente = trim($_POST['codigoCliente']);

    $sentencia = $connect->prepare("SELECT * FROM `customers` WHERE `cod` = ?") or die('query failed');
    $sentencia->execute([$codigoCliente]);

    $respuesta = array("success" => false, "nombreCliente" => "", "codigoCliente" => "", "mensaje" => "");
    if ($codigoCliente!= ''){
        while ($row = $sentencia->fetch()) {
            // Aquí puedes personalizar cómo deseas obtener la información del Cliente
            $nombreCliente = trim($row["name"]);
            $codigoCliente = trim($row["cod"]);
            $respuesta["success"] = true;
            $respuesta["nombreCliente"] = $nombreCliente;
            $respuesta["codigoCliente"] = $codigoCliente;
        }
    
        if (!$respuesta["success"]) {
            $respuesta["mensaje"] = "Cliente no encontrado";
        }
    }else{
        $respuesta = array("false" => true, "nombreCliente" => "", "codigoCliente" => "", "mensaje" => "Este campo no puede estar vacío");
    }


    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>
