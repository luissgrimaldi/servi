<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el código del Cliente desde la solicitud POST
    $codigoCondicionPago = trim($_POST['codigoCondicionPago']);

    $sentencia = $connect->prepare("SELECT * FROM `condicionpago` WHERE `cod` = ?") or die('query failed');
    $sentencia->execute([$codigoCondicionPago]);

    $respuesta = array("success" => false, "nombreCondicionPago" => "", "bonifCondicionPago" => "", "codigoCondicionPago" => "", "mensaje" => "");
    if ($codigoCondicionPago!= ''){
        while ($row = $sentencia->fetch()) {
            // Aquí puedes personalizar cómo deseas obtener la información del Cliente
            $nombreCliente = trim($row["name"]);
            $codigoCondicionPago = trim($row["cod"]);
            $bonifCondicionPago = trim($row["bonif"]);
            $respuesta["success"] = true;
            $respuesta["nombreCondicionPago"] = $nombreCliente;
            $respuesta["codigoCondicionPago"] = $codigoCondicionPago;
            $respuesta["bonifCondicionPago"] = $bonifCondicionPago;
        }
    
        if (!$respuesta["success"]) {
            $respuesta["mensaje"] = "Condicion de pago no encontrada";
        }
    }else{
        $respuesta = array("end" => true, "nombreCondicionPago" => "", "bonifCondicionPago" => "", "codigoCondicionPago" => "", "mensaje" => "Este campo no puede estar vacío");
    }


    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>
