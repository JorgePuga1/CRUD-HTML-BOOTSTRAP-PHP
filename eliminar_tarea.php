<?php include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tarea where id = $id";
    $resultado = mysqli_query($conn,$query);

    if(!$resultado){
        die("fallo el query");
    }

    $_SESSION['message']='Tarea eliminada con exito.';
    $_SESSION['message_type']='danger';

    header("Location: index.php");
    
}

?>