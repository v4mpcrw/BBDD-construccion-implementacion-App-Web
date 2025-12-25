<?php
include 'conexion.php';

    /*  Funcionalidad que permite actualizar la información de los clientes, a excepción por el email. 
    En el caso de que todos los campos sean ingresados correctamente, se notificará el éxito de la operación, en caso contrario se notificará que ha ocurrido un error. */
if(isset($_POST['email']) && $_POST['email'] !== "")
{
    $email = $_POST['email'];
    
    
    $nombre_completo = $_POST['nombre_completo'];   
    $fecha_nacimiento = $_POST['fecha_nacimiento']; 
    $numero_telefono = $_POST['numero_telefono'];   
    $sexo = $_POST['sexo'];                         
    $contrasena = $_POST['contrasena'];                  
    $departamento = $_POST['departamento'];
    
    if($departamento == "") { $departamento = null; }
    
    $condominio = $_POST['condominio'];

    if($condominio == "") { $condominio = null; }
    
    $nro_calle = $_POST['nro_calle'];                    
    $comuna = $_POST['comuna'];                         
    $region = $_POST['region'];                         

    /*Actualiza todos los campos del cliente identificado por su email.*/
    $sql="UPDATE cliente SET nombre_completo='".$nombre_completo."', fecha_nacimiento='".$fecha_nacimiento."', numero_telefono=".$numero_telefono.", departamento=".($departamento === null ? "NULL" : "'$departamento'").", condominio=".($condominio === null ? "NULL" : "'$condominio'").", nro_calle=".$nro_calle.", comuna='".$comuna."', region='".$region."', sexo='".$sexo."', contrasena='".$contrasena."' WHERE email='$email'";
    $actualizar = pg_query($conexion, $sql);

    if($actualizar)
    {
        echo "update exitosa";
        header("Location: ../Proceso_exito.html");
    }
    else
    {
        echo "update fallida";
        header("Location: ../Proceso_fallido.html");
    }
}
else
{
    echo "Algo salio mal D:";
}

?>