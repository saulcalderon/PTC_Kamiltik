<?php
require('../../helpers/report.php');
require('../../models/dashboard/usuarios.php');


// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Tipos de usuarios');

// Se instancia el módelo Categorías para obtener los datos.
$tipousuario = new Usuarios;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataTipoUsuario = $tipousuario->readAllTipoUsuarios()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataTipoUsuario as $rowTipoUsuario) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(222, 127, 11);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Tipo Usuario: '.$rowTipoUsuario['tipo_usuario']), 1, 1, 'C', 1);
        // Se instancia el módelo Productos para obtener los datos.
        $usuario = new Usuarios;
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($usuario->setIdTipoUsuarios($rowTipoUsuario['id_tipo_usuario'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataUsuario = $usuario->readUsuarioTipo()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(227, 194, 30);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(46.5, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(46.5, 10, utf8_decode('Apellido'), 1, 0, 'C', 1);
                $pdf->Cell(46.5, 10, utf8_decode('Correo'), 1, 0, 'C', 1);
                $pdf->Cell(46.5, 10, utf8_decode('Telefono'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataUsuario as $rowUsuario) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(46.5, 10, utf8_decode($rowUsuario['nombre']), 1, 0, 'C');
                    $pdf->Cell(46.5, 10, utf8_decode($rowUsuario['apellido']), 1, 0, 'C');
                    $pdf->Cell(46.5, 10, utf8_decode($rowUsuario['correo']), 1, 0, 'C'   );
                    $pdf->Cell(46.5, 10, utf8_decode($rowUsuario['telefono']), 1, 1, 'C'   );
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos de este tipo'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en una categoría'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay categorías para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>