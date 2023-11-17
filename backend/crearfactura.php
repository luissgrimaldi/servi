<?php
require_once('../require/TCPDF-main/tcpdf.php');

$cliente = "tevez";
$producto_ids = json_decode($_GET["arrayIds"]); // Decodifica el JSON de la solicitud GET
$precios = json_decode($_GET["arrayPrice"]); // Decodifica el JSON de los precios
$cantidades = json_decode($_GET["arrayQty"]); // Decodifica el JSON de los precios
$bonifs1 = json_decode($_GET["arrayBonif1"]); // Decodifica el JSON de los precios
$bonifs2 = json_decode($_GET["arrayBonif2"]); // Decodifica el JSON de los precios

// Validar y procesar los datos (puedes realizar validaciones adicionales aquí).

// Crear una instancia de TCPDF
$pdf = new TCPDF();
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->AddPage();

// Definir los estilos CSS en línea
$css = '
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .invoice {
        padding: 20px;
    }

    .invoice-header {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }

    .invoice-title {
        font-size: 24px;
    }

    .invoice-details {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .invoice-item {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }

    .invoice-total {
        font-weight: bold;
        margin-top: 10px;
    }
</style>';

// Cargar la plantilla HTML
$template = '
<!DOCTYPE html>
<html>
<head>
    ' . $css . '
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1 class="invoice-title">Factura</h1>
        </div>
        <div class="invoice-details">
            <p>Cliente: ' . $cliente . '</p>
        </div>';
        
        // Modificar el valor de $producto para incluir el ID y el precio
$totalFinal = 0;
foreach ($producto_ids as $index => $id) {
    $precio = $precios[$index];
    $cantidad = $cantidades[$index];
    $bonif1 = $bonifs1[$index];
    $bonif2 = $bonifs2[$index];
    $total = ($cantidad*$precio);
    // Aplicar los descuentos
    if ($bonif1 > 0) {
        $descuento1 = $total * ($bonif1 / 100);
        $total -= $descuento1;
    }

    if ($bonif2 > 0) {
        $descuento2 = $total * ($bonif2 / 100);
        $total -= $descuento2;
    }
    $totalFinal += $total;
    $template .= '
        <div class="invoice-item">
            <p>Producto ID: ' . $id . '</p>
            <p>Cantidad: ' . $cantidad . '</p>
            <p>Precio: $' . number_format($precio, 2, ',', '.') . '</p>
            <p>Bonificación 1: ' . $bonif1 . '%</p>
            <p>Bonificación 2: ' . $bonif2 . '%</p>
            <p>Total: $' . number_format($total, 2, ',', '.') . '</p>
        </div>';
}

$template .= '
        <div class="invoice-total">
            Total: $' . number_format($totalFinal, 2, ',', '.') . ' <!-- Sumar todos los precios -->
        </div>
    </div>
</body>
</html>';

// Escribir el contenido en el PDF
$pdf->writeHTML($template, true, false, true, false, '');

// Configurar el encabezado para indicar que se enviará un archivo PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="factura.pdf"');

// Salida del contenido del PDF
$pdfContent= $pdf->Output('factura.pdf', 'S'); // 'S' para obtener el contenido como una cadena
// Verificar si la generación del PDF fue exitosa
if (!$pdfContent) {
    alert("Error al generar el PDF");
} else {
    echo $pdfContent;
}
?>
