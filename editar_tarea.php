<?php

include("db.php");

if(isset($_GET['id'])){
$id= $_GET['id'];

$query = "SELECT * FROM tarea where id = $id";
$resultado = mysqli_query($conn, $query) ;
if(mysqli_num_rows($resultado) == 1){
  $row= mysqli_fetch_array($resultado);
  $titulo= $row['titulo'];
  $descripcion= $row['descripcion'];
 
}
}

if(isset($_POST['actualizar'])){
    $id= $_GET['id'];
    $titulo = $_POST['titulo'];
    $descripcion= $_POST['descripcion'];

    $query="UPDATE tarea set titulo='$titulo' , descripcion='$descripcion' where id = $id";
    mysqli_query($conn,$query);
    $_SESSION['message'] = 'Contenido actualizado con exito';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}
?>

<?php include("incluir/header.php"); ?>

<div class="container p-4">

    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar_tarea.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" class="form-control" placeholder="Actualizar descripción" > <?php echo $descripcion; ?> </textarea>
                    </div>
                    <button class="btn btn-success" name="actualizar">
                    actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("incluir/footer.php") ?>