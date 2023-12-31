<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el código del producto desde la solicitud POST
    $codigoProducto = trim($_POST['codigoProducto']);

    $sentencia = $connect->prepare("SELECT * FROM `products` WHERE `cod` = ?") or die('query failed');
    $sentencia->execute([$codigoProducto]);

    $respuesta = array("success" => false, "nombreProducto" => "", "precioProducto" => "", "id" => "", "mensaje" => "");
    if ($codigoProducto!= ''){
        while ($row = $sentencia->fetch()) {
            // Aquí puedes personalizar cómo deseas obtener la información del producto
            $nombreProducto = trim($row["name"]);
            $precioProducto = 300;
            $respuesta["success"] = true;
            $respuesta["nombreProducto"] = $nombreProducto;
            $respuesta["precioProducto"] = $precioProducto;
            $respuesta["id"] = $codigoProducto;
        }
    
        if (!$respuesta["success"]) {
            $respuesta["mensaje"] = "Producto no encontrado";
        }
    }else{
        $respuesta = array("end" => true, "nombreProducto" => "", "precioProducto" => "", "mensaje" => "");
    }


    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>
