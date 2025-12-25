<?php
include 'conexion.php';
/*  Esta funcionalidad tiene el objetivo de registrar la información de nuevos clientes en la base de datos.
    En el caso de que todos los campos sean ingresados correctamente, se notificará el éxito de la operación, en caso contrario se notificará que ha ocurrido un error. */
header('Content-Type: text/html; charset=utf-8');


if(isset($_POST['email']) && $_POST['email'] !== "")
{
    $email = $_POST['email'];
    $nombre_completo = $_POST['nombre_completo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $numero_telefono = $_POST['numero_telefono'];
    $departamento = $_POST['departamento'];
    if($departamento == "") { $departamento = null; }
    $condominio = $_POST['condominio'];
    if($condominio == "") { $condominio = null; }
    $nro_calle = $_POST['nro_calle'];
    $comuna = $_POST['comuna'];
    $region = $_POST['region'];
    $sexo = $_POST['sexo']; 
    $contrasena = $_POST['contrasena'];
    
    $sql="INSERT INTO cliente VALUES('".$email."', '".$nombre_completo."', '".$fecha_nacimiento."', ".$numero_telefono.", ".($departamento === null ? "NULL" : "'$departamento'").", ".($condominio === null ? "NULL" : "'$condominio'").", ".$nro_calle.", '".$comuna."', '".$region."', '".$sexo."', '".$contrasena."')";
    $insercion= pg_query($conexion,$sql);   
    if($insercion)
    {
        echo "Registro exitoso";
        header("Location: ../Proceso_exito.html");
    }
    else
    {
        echo "Registro fallido";
        header("Location: ../Proceso_fallido.html");
    }
}
else
{   
    echo "Datos incompletos, por favor ingrese lo solicitado";
}
?>