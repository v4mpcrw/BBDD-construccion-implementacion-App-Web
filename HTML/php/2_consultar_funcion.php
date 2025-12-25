<?php
include "conexion.php";
/* En esta funcionalidad el cliente puede consultar por la información de una función de interés. Para consultar por una función el cliente debe 
    ingresar la respectiva ID.En el caso de que el ID ingresado no coincida con los registrados en la base de datos se notificará que no se encontraron resultados, 
    también se notificará en el caso de que no se haya proporcionado una ID*/
?>

<html>
    <head>
        <title>MoBaTickets - Consulta de Funciones</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../../style/style_consultar_funcion.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="contenedor-principal">
            <h1 class="titulo-pagina">Consulta de Funciones</h1>
            
            <div class="lista-eventos">
                <?php
                if(isset($_POST['id_evento'])){
                    $busqueda = $_POST['id_evento'];
                    $pregunta = "SELECT id_funcion,hora,dia,mes,anio,capacidad FROM funcion WHERE id_evento=".$busqueda.";";
                    $respuesta = pg_query($conexion, $pregunta);
                    
                    if ($respuesta && pg_num_rows($respuesta) > 0) {
                        while ($row = pg_fetch_array($respuesta)) {
                            echo '<div class="evento-item">';
                            echo "<p><strong>Id Función:</strong> ".$row["id_funcion"]. "</p>";
                            echo "<p><strong>Hora:</strong> " .$row["hora"]. "</p>";
                            echo "<p><strong>Día:</strong> " .$row["dia"]. "</p>";
                            echo "<p><strong>Mes:</strong> " .$row["mes"]. "</p>";
                            echo "<p><strong>Año:</strong> " .$row["anio"]. "</p>";
                            echo "<p><strong>Capacidad:</strong> " .$row["capacidad"]. "</p>";
                            echo "</div>";
                        }
                        pg_free_result($respuesta);
                    } else {
                        echo '<div class="sin-eventos">No se encontraron funciones para este evento</div>';
                    }
                } else {
                    echo '<div class="sin-eventos">Error: No se proporcionó ID de evento</div>';
                }
                ?>
            </div>
            
            <div class="Volveratras">
                <a href="javascript:history.back()" class="boton-volver">
                    <i class='bx bx-home'></i> Volver atras
                </a>
                </form>
            </div>
        </div>
    </body>
</html>