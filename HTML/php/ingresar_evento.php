<?php
include 'conexion.php';

if(isset($_POST['id_evento']) && $_POST['id_evento'] !== "")
{
    // Variables para controlar el éxito de las inserciones para asi poder hacer un if con todos los datos aceptados y poder mandar a la pantalla de exito
    $todoCorrecto = true;
    
    // Datos de tabla evento
    $id_evento = $_POST['id_evento'];
    $nombre_evento = $_POST['nombre_evento'];
    $productor = $_POST['productor'];
    $rut_productor = $_POST['rut_productor'];
    $tipo_evento = $_POST['tipo_evento']; 
    $hora = $_POST['hora'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];

    $sqlEvento = "INSERT INTO evento VALUES($id_evento, '$nombre_evento', '$productor', $rut_productor, '$tipo_evento', $hora, $dia, $mes, $anio)";
    $insercionEvento = pg_query($conexion, $sqlEvento);
    
    if(!$insercionEvento) {
        $todoCorrecto = false;
        echo "Inserción de evento fallida<br>";
    }

    // Datos tabla lugar
    $nombre_lugar = $_POST['nombre_lugar'];
    $precio = $_POST['precio'];
    $sector = $_POST['sector'];
    $sqlLugar = "INSERT INTO lugar VALUES('$nombre_lugar', $precio, '$sector', $id_evento)";
    $insercionLugar = pg_query($conexion, $sqlLugar);

    if(!$insercionLugar) {
        $todoCorrecto = false;
        echo "Inserción de lugar fallida<br>";
    }

    // Variable para controlar la inserción del tipo de evento
    $insercionTipo = false;
    
    if(!empty($_POST['genero_musical'])) {
        $genero_musical = $_POST['genero_musical'];
        $nombre_artistico = $_POST['nombre_artistico'];
        $setlist = $_POST['setlist'];
        $sql = "INSERT INTO musica VALUES('$genero_musical', '$nombre_artistico', '$setlist', $id_evento)";
        $insercionTipo = pg_query($conexion, $sql);
        if(!$insercionTipo) {
            $todoCorrecto = false;
            echo "Inserción en música fallida<br>";
        }
    }
    elseif(!empty($_POST['club_deportivo'])) {
        $club_deportivo = $_POST['club_deportivo'];
        $nombre_equipo = $_POST['nombre_equipo'];
        $tipo_deporte = $_POST['tipo_deporte'];
        $sql = "INSERT INTO deporte VALUES('$club_deportivo', '$nombre_equipo', '$tipo_deporte', $id_evento)";
        $insercionTipo = pg_query($conexion, $sql);
        if(!$insercionTipo) {
            $todoCorrecto = false;
            echo "Inserción en deporte fallida<br>";
        }
    }
    elseif(!empty($_POST['descripcion'])) {
        $descripcion = $_POST['descripcion'];
        $elenco = $_POST['elenco'];
        $duracion = $_POST['duracion'];
        $publico = $_POST['publico'];
        $sql = "INSERT INTO teatro VALUES('$descripcion', $elenco, '$duracion', '$publico', $id_evento)";
        $insercionTipo = pg_query($conexion, $sql);
        if(!$insercionTipo) {
            $todoCorrecto = false;
            echo "Inserción en teatro fallida<br>";
        }
    }
    elseif(!empty($_POST['tipo_familia'])) {
        $tipo_familia = $_POST['tipo_familia'];
        $sql = "INSERT INTO familia VALUES('$tipo_familia', $id_evento)";
        $insercionTipo = pg_query($conexion, $sql);
        if(!$insercionTipo) {
            $todoCorrecto = false;
            echo "Inserción en familia fallida<br>";
        }
    }
    elseif(!empty($_POST['tipo_especial'])) {
        $tipo_especial = $_POST['tipo_especial'];
        $sql = "INSERT INTO especial VALUES('$tipo_especial', $id_evento)";
        $insercionTipo = pg_query($conexion, $sql);
        if(!$insercionTipo) {
            $todoCorrecto = false;
            echo "Inserción en especial fallida<br>";
        }
    }

    // Ingresar funciones 
    $funcionesCorrectas = true;
    
     if(!empty($_POST['id_funcion'])) {
        foreach($_POST['id_funcion'] as $index => $id_funcion) {
            $sql_funcion = "INSERT INTO funcion(id_funcion, id_evento, hora, dia, mes, anio, capacidad)
                            VALUES($1,$2,$3,$4,$5,$6,$7)";

            $params_funcion = [
                intval($_POST['id_funcion'][$index]),
                intval($id_evento),
                intval($_POST['hora_func'][$index]),
                intval($_POST['dia_func'][$index]),
                intval($_POST['mes_func'][$index]),
                intval($_POST['anio_func'][$index]),
                intval($_POST['capacidad'][$index])
            ];
            

            $result_funcion = pg_query_params($conexion, $sql_funcion, $params_funcion);
            if(!$result_funcion) {
                $funcionesCorrectas = false;
                $todoCorrecto = false;
                echo "Error al insertar función: " . pg_last_error($conexion) . "<br>";
                print_r($params_funcion);
            }
        }
    
    } 
        // Verificar si todo fue exitoso y redirigir
        if($todoCorrecto) {
            header("Location: ../Proceso_exito.html");
            exit;
        } else {
            header("Location: ../Proceso_fallido.html");
            exit;
        }
}
else {
        // Si no viene el id_evento, redirigir a fallido
        header("Location: ../Proceso_fallido.html");
        exit;
    }

?>