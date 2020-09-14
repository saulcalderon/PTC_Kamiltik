<?php
require('../../helpers/report.php');
require('../../models/dashboard/proveedores.php');


// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Estado de los proveedores');

// Se instancia el módelo Categorías para obtener los datos.
$estadogeneral = new Proveedores;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataEstadoGeneral = $estadogeneral->readAllEstadoGeneral()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataEstadoGeneral as $rowEstadoGeneral) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(222, 127, 11);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Estado del proveedor: '.$rowEstadoGeneral['estado_general']), 1, 1, 'C', 1);
        // Se instancia el módelo Productos para obtener los datos.
        $proveedor = new Proveedores;
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($proveedor->setEstadoGeneral($rowEstadoGeneral['id_estado_general'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataProveedor = $proveedor->readProveedorEstado()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(227, 194, 30);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(62, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(62, 10, utf8_decode('Empresa'), 1, 0, 'C', 1);
                $pdf->Cell(62, 10, utf8_decode('Telefono'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataProveedor as $rowProveedor) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(62, 10, utf8_decode($rowProveedor['nombre']), 1, 0, 'C');
                    $pdf->Cell(62, 10, utf8_decode($rowProveedor['empresa']), 1, 0, 'C');
                    $pdf->Cell(62, 10, utf8_decode($rowProveedor['telefono_empresa']), 1, 1, 'C');
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos de este tipo'), 1, 1, 'C');
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en una categoría'), 1, 1, 'C');
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay categorías para mostrar'), 1, 1, 'C');
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>