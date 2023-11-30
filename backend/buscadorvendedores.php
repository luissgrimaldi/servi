<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el código del Vendedor desde la solicitud POST
    $codigoVendedor = trim($_POST['codigoVendedor']);

    $sentencia = $connect->prepare("SELECT * FROM `sellers` WHERE `cod` = ?") or die('query failed');
    $sentencia->execute([$codigoVendedor]);

    $respuesta = array("success" => false, "nombreVendedor" => "", "codigoVendedor" => "", "mensaje" => "");
    if ($codigoVendedor!= ''){
        while ($row = $sentencia->fetch()) {
            // Aquí puedes personalizar cómo deseas obtener la información del Vendedor
            $nombreVendedor = trim($row["name"]);
            $codigoVendedor = trim($row["cod"]);
            $respuesta["success"] = true;
            $respuesta["nombreVendedor"] = $nombreVendedor;
            $respuesta["codigoVendedor"] = $codigoVendedor;
        }
    
        if (!$respuesta["success"]) {
            $respuesta["mensaje"] = "Vendedor no encontrado";
        }
    }else{
        $respuesta = array("false" => true, "nombreVendedor" => "", "codigoVendedor" => "", "mensaje" => "Este campo no puede estar vacío");
    }


    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>
