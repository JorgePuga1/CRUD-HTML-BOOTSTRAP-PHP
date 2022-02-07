<?php

include("db.php");

if(isset($_POST['guardar_tarea'])){
    $titulo= $_POST['titulo'];

    $descripcion = $_POST['descripcion'];
    
   
    $query = "insert into tarea(titulo,descripcion) values ('$titulo','$descripcion')";
    $resultado = mysqli_query($conn,$query);

    if(!$resultado){
        die("fallo la consulta");
    }

    $_SESSION['message'] = 'Tarea Guardada con Exito';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}
?>