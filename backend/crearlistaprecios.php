<?php
include 'connect.php';

$producto_cods = json_decode($_GET["arrayCod"]); // Decodifica el JSON de la solicitud GET
$precios = json_decode($_GET["arrayPrice"]); // Decodifica el JSON de los precios
$list = $_GET["list"]; // Decodifica el JSON de los precios

// Validar y procesar los datos (puedes realizar validaciones adicionales aquí).


foreach ($producto_cods as $index => $id) {
    $cod = $producto_cods[$index];
    $precio = $precios[$index];
    $listNumber = $list;
    $query = $connect-> prepare ("INSERT INTO prices (cod_producto, price, lista) VALUES (?, ?, ?)");
    $query->execute([$cod, $precio, $listNumber]);
    if($query){
        $response = [
            'status'=> 'success',
            'message'=> 'Lista agregada con éxito'
        ];
    }else{
        $response = [
            'status'=> 'error',
            'message'=> 'Ha ocurrido un error al crear la lista'
        ];
    }
    echo json_encode($response);
}
?>
