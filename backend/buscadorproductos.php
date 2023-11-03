<?php
include 'connect.php';

$campo = trim($_POST['buscadorproductos']);

$sentencia2 = $connect->prepare("SELECT * FROM `products` WHERE trim(name) LIKE ? OR `cod` LIKE ?") or die('query failed');
$sentencia2->execute([$campo . '%', $campo . '%']);
 
$html = "";    

while($row = $sentencia2->fetch()){

    $html .= '<li onclick="seleccionarProducto('.$row["id"]. ", '".trim($row["name"])."'". ", '".trim($row["cod"])."'". ",'".trim($row["price"])."'".')">'.trim($row["cod"])." ".trim($row["name"]).'</li>';


};      
 
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>



 