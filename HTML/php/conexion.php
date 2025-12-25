<?php
$equipo= "localhost";
$namebd= "MoBa";
$puerto= "5432";
$usuario= "postgres";
$clave= "218015565";

$conexion= pg_connect("host=$equipo dbname=$namebd port=5432 user=$usuario password=$clave");

if($conexion) 
{ 
    pg_set_client_encoding($conexion, "UTF8");
}
else 
{ echo "Ha ocurrido un error"; 
}
?>