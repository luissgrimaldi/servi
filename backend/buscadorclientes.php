<?php
include 'connect.php';

$campo = trim($_POST['buscadorclientes']);

$sentencia2 = $connect->prepare("SELECT * FROM `customers` WHERE trim(name) LIKE ? OR `cod` LIKE ?") or die('query failed');
$sentencia2->execute([$campo . '%', $campo . '%']);
 
$html = "";    

while($row = $sentencia2->fetch()){

    $html .= '<li onclick="seleccionarCliente('.$row["id"]. ", '".trim($row["name"])."'". ", '".trim($row["cod"])."'".')">'.trim($row["cod"])." ".trim($row["name"]).'</li>';


};      
 
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>



 