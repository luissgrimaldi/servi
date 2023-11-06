<?php
require_once('../require/TCPDF-main/tcpdf.php');

$cliente = $_POST["inputNombre"];
$producto = $_POST["inputNombreProducto"];
$precio = $_POST["inputPrecioProducto"];

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
        </div>
        <div class="invoice-item">
            <p>Producto: ' . $producto . '</p>
            <p>Precio: $' . $precio . '</p>
        </div>
        <div class="invoice-total">
            Total: $' . $precio . '
        </div>
    </div>
</body>
</html>';

// Escribir el contenido en el PDF
$pdf->writeHTML($template, true, false, true, false, '');

// Generar el PDF
$pdf->Output('factura.pdf', 'D'); // 'D' para descargar el PDF
?>
