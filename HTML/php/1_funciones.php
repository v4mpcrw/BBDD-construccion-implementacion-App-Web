<?php
include "conexion.php";


$query = "SELECT * FROM evento ORDER BY id_evento";
$result = pg_query($conexion, $query);
?>

<html>
    <head>
        <title>MoBaTickets - Consulta de Funciones</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../../style/style_funciones.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <!-- Esta funcionalidad permite que el cliente consulte por las diferentes funciones que puede tener un evento.
            Se muestran las funciones registradas en la base de datos, para ver la información de una de las funciones se debe introducir el ID de la función-->
        <div class="contenedor-principal">
            <h1 class="titulo-pagina">Consulta de Funciones</h1>
            
            <div class="lista-eventos">
                <?php
                if ($result && pg_num_rows($result) > 0) {
                    while ($row = pg_fetch_array($result)) {
                        echo '<div class="evento-item">';
                        echo "<p><strong>Id Evento:</strong> ".$row["id_evento"]. "</p>";
                        echo "<p><strong>Nombre Evento:</strong> " .$row["nombre_evento"]. "</p>";
                        echo "<p><strong>Productor:</strong> " .$row["productor"]. "</p>";
                        echo "<p><strong>Rut Productor:</strong> " .$row["rut_productor"]. "</p>";
                        echo "<p><strong>Tipo Evento:</strong> " .$row["tipo_evento"]. "</p>";
                        echo "</div>";
                    }
                    pg_free_result($result);
                } else {
                    echo '<div class="sin-eventos">No se encontraron eventos</div>';
                    header("Location: ../Proceso_fallido.html");

                }
                ?>
            </div>
            
            <div class="formulario-consulta">
                <h2 class="titulo-formulario">Consultar Funciones</h2>
                <p class="subtitulo-formulario">Ingrese el código del evento para consultar sus funciones</p>
                
                <form name="consultar_funcion" action="2_consultar_funcion.php" method="post">       
                    <label>
                        <input type="text" name="id_evento" placeholder="ID del evento" required>
                    </label>
                    <input type="submit" value="Consultar Funciones" class="boton-consultar">
                    <a href="../../inicio.html" class="boton-volver">
                        <i class='bx bx-home'></i> Volver al Inicio
                    </a>
                </form>
            </div>
        </div>
    </body>
</html>