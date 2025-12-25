<?php
include 'conexion.php';
/* En esta funcionalidad el cliente puede consultar por la información de un evento de interés. Se muestra por pantalla 
el nombre de los eventos registrados en la base de datos. Para consultar por un evento el cliente debe escribir el nombre completo del
evento. En el caso de que el nombre ingresado no coincida con los nombres registrados en la base de datos se notificará que no se encontraron resultados*/
function busquedaEvento($answer){
    if (pg_num_rows($answer) != 0) {
        while ($row = pg_fetch_array($answer)) {
            echo '<div class="evento-item">';
            echo "<p><strong>Id Evento:</strong> ".$row["id_evento"]. "</p>";
            echo "<p><strong>Nombre Evento:</strong> " .$row["nombre_evento"]. "</p>";
            echo "<p><strong>Productor:</strong> " .$row["productor"]. "</p>";
            echo "<p><strong>Rut Productor:</strong> " .$row["rut_productor"]. "</p>";
            echo "<p><strong>Tipo Evento:</strong> " .$row["tipo_evento"]. "</p>";
            echo "<p><strong>Hora:</strong> " .$row["hora"]. "</p>";
            echo "<p><strong>Día:</strong> " .$row["dia"]. "</p>";
            echo "<p><strong>Mes:</strong> " .$row["mes"]. "</p>";
            echo "<p><strong>Año:</strong> " .$row["anio"]. "</p>";
            echo "</div>";
        }
    } else {
        echo '<div class="sin-eventos">No se encontraron resultados</div>';
    }
}
?>

<html>
    <head>
        <title>MoBaTickets - Resultados de Búsqueda</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../../style/style_consultar_evento.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="contenedor-principal">
            <h1 class="titulo-pagina">Resultados de Búsqueda</h1>
            
            <div class="lista-eventos">
                <?php
                if(isset($_POST['nombre_evento'])){
                    $busqueda = $_POST['nombre_evento'];
                    $pregunta = "SELECT * FROM evento WHERE nombre_evento='".$busqueda."';";
                    $respuesta = pg_query($conexion, $pregunta);
                    busquedaEvento($respuesta);
                } else {
                    echo '<div class="sin-eventos">Error: No se proporcionó nombre de evento</div>';
                }
                ?>
            </div>
            
            <div class="Volveratras">
                <a href="javascript:history.back()" class="boton-volver">
                    <i class='bx bx-arrow-back'></i> Volver atrás
                </a>
            </div>
        </div>
    </body>
</html>