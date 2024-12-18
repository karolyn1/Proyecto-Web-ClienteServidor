<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

// Conexión a la base de datos
include("actions/conexion.php");

// Crear instancia de Dompdf
$dompdf = new Dompdf();

// Consulta para obtener datos
$sql = "SELECT u.ID_Usuario AS usuario_id, CONCAT(u.Nombre, ' ', u.Apellido1, ' ', u.Apellido2) as NombreCompleto, 
        u.Correo, d.Monto, d.Fecha 
        FROM usuario u 
        LEFT JOIN donaciones d ON u.ID_Usuario = d.ID_Usuario
        WHERE d.Estado = 1";
$result = $conn->query($sql);

if ($result === false) {
    die("Error in query: " . $conn->error);
}

// Construir HTML para el PDF
$html = '<h1>Reporte de Donaciones</h1>';
$html .= '<table border="1" style="width: 100%; border-collapse: collapse; text-align: center;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Donación</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= "<tr>
                    <td>{$row['usuario_id']}</td>
                    <td>{$row['NombreCompleto']}</td>
                    <td>{$row['Correo']}</td>
                    <td>\${$row['Monto']}</td>
                    <td>" . date('d/m/Y', strtotime($row['Fecha'])) . "</td>
                  </tr>";
    }
} else {
    $html .= '<tr><td colspan="5">No se encontraron donaciones activas.</td></tr>';
}
$html .= '</tbody></table>';

// Cargar el HTML en Dompdf
$dompdf->loadHtml($html);

// Configuración de la hoja
$dompdf->setPaper('A4', 'portrait');

// Renderizar el PDF
$dompdf->render();

// Enviar el PDF al navegador para su descarga
$dompdf->stream("reporte_donaciones.pdf", ["Attachment" => true]);
exit;
?>
