<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MoBaTickets - Resultados de Consulta por Descuento</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../style/style_ticket.css">

</head>
<body>
    <div class="contenedor-principal">
        <h1 class="titulo-pagina">Resultados de Consulta por Descuento</h1>
        <!--Obtiene el tipo de descuento a buscar, por medio de una consulta sql busca tickets por su tipo de descuentro, luego muestra los resultados y se despliega el html con los resultados imprimiendose,
            en caso de error tiene mensajes de error se le integro un boton para volver a la pagina de inicio,
            se usa htmlspecialchars para manejar los caracteres especiales y pg_escape_string para tener unn filtro extra de seguridad seguridad.
        -->
        <?php
        if(isset($_POST['descuento'])){
            $busqueda = $_POST['descuento'];
            echo '<p class="subtitulo-consulta">Consultando tickets con descuento: <strong>' . htmlspecialchars($busqueda) . '</strong></p>';
            
            $pregunta = "SELECT * FROM ticket WHERE descuento='".pg_escape_string($conexion, $busqueda)."';";
            $respuesta = pg_query($conexion, $pregunta);
            
            if ($respuesta && pg_num_rows($respuesta) > 0) {
                echo '<div class="lista-tickets">';
                while ($row = pg_fetch_array($respuesta)) {
                    echo '<div class="ticket-item">';
                    echo "<p><strong>Número de Orden:</strong> ".$row["nro_orden"]. "</p>";
                    echo "<p><strong>Devolución:</strong> " .$row["devolucion"]. "</p>";
                    echo "<p><strong>Precio de Ticket:</strong> " .$row["precio_ticket"]. "</p>";
                    echo "<p><strong>Fila:</strong> " .$row["fila"]. "</p>";
                    echo "<p><strong>Asiento:</strong> " .$row["asiento"]. "</p>";
                    echo "<p><strong>Sector:</strong> " .$row["sector"]. "</p>";
                    echo "<p><strong>Rut Empresa:</strong> " .$row["rut_empresa"]. "</p>";
                    echo "<p><strong>Id Función:</strong> " .$row["id_funcion"]. "</p>";
                    echo "<p><strong>Id Compra:</strong> " .$row["id_compra"]. "</p>";
                    echo "<p><strong>Porcentaje Descuento:</strong> " .$row["porcentaje_descuento"]. "</p>";
                    echo "<p><strong>Tipo Descuento:</strong> " .$row["descuento"]. "</p>";
                    echo "</div>";
                }
                echo '</div>';
                pg_free_result($respuesta);
            } else {
                echo '<div class="sin-resultados">No se encontraron resultados para el descuento seleccionado</div>';
            }
        } else {
            echo '<div class="error-mensaje">Error: No se proporcionó descuento para la consulta</div>';
        }
        ?>
        <div class="volver-inicio">
            <a href="../../inicio.html" class="boton-volver">
                <i class='bx bx-home'></i> Volver al Inicio
            </a>
        </div>
    </div>
</body>
</html>