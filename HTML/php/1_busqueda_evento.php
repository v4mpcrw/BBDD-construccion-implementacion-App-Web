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
        <link rel="stylesheet" href="../../style/style_buscar_evento.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <!-- Funcionalidad referida a la búdqueda de eventos mediante el nombre del evento, desde la perpectiva de un cliente.
            Una vez realizada la consulta, se tiene un botón con el cual se puede regresar a la pantalla de inicio -->
        <div class="contenedor-principal">
            <div class="header-section">
                <hr>
                <h2>MoBa Ticket - Sitio oficial de venta de entradas</h2>
                <hr>
            </div>
            
            <h3 class="subtitulo-lista">Nombre de eventos a consultar:</h3>

            <div class="lista-simple">
                <?php
                if ($result && pg_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = pg_fetch_array($result)) {
                        echo '<div class="evento-lista">';
                        echo "Evento $i: " .$row["nombre_evento"];
                        echo "</div>";
                        $i = $i + 1;
                    }
                    pg_free_result($result);
                } else {
                    echo "No se encontraron eventos";
                }
                ?>
            </div>

            <div class="form-simple">
                <form name="consultar_funcion" action="2_consultar_evento.php" method="post">       
                    <label>
                        Ingrese el nombre del evento a consultar<br/>
                        <input type="text" name="nombre_evento"><br/>
                        <input type="submit" value="Ingresar">
                    </label>
                </form>
                
                <a href="../../inicio.html" class="boton-volver">
                    <i class='bx bx-home'></i> Volver al Inicio
                </a>
            </div>
        </div>
    </body>
</html>