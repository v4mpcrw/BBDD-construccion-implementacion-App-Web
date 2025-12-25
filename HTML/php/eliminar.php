<?php
include 'conexion.php';

if($_POST['email'] != "")
{
    $email = $_POST['email'];
    //primero el php va a revisar que el correo que se dió exista dentro de la base de datos 
    $sql_verificar = "SELECT email FROM cliente WHERE email='".$email."'";
    $resultado = pg_query($conexion, $sql_verificar);
    //si el correo existe va a proceder a elimarse de la base de datos
    if(pg_num_rows($resultado) > 0)
    {
        $sql = "DELETE FROM cliente WHERE email='".$email."'";
        $borrar = pg_query($conexion, $sql);
        
        if($borrar){
            echo "delete exitosa";
            header("Location: ../Proceso_exito.html");
        }else{
            // si ocurre un error al borrar el correo se manda a proceso fallido
            header("Location: ../Proceso_fallido.html");
            echo "delete fallida";
        }
    }else{
        // se manda a proceso fallido cuando el correo no existe en la base de datos
        header("Location: ../Proceso_fallido.html");
    }
}
else{
    echo "Algo salio mal D:";
}
?>