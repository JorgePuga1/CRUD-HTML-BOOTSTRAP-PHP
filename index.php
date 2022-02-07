<?php include("db.php") ?>

<?php include("incluir/header.php") ?>

<div class="row">

    <div class="col-md-4">


    <?php
    if(isset($_SESSION['message'])){ ?>


        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


    <?php session_unset(); } ?>


    <div class="card card-body">
        <label class="label__titulo">Ingrese las tareas pendientes</label>
        <form action="guardar_tarea.php" method="POST">
          <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Titúlo de la Tarea" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcin de la Tarea."></textarea>
          </div>
          <input type="submit" name="guardar_tarea" class="btn btn-success btn-block" value="Guardar Tarea">
        </form>
      </div>
    </div>

    <div class="col-dm-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titúlo</th>
                    <th>descripcion</th>
                    <th>fecha de creacion</th>
                    <th>acciones</th>
                </tr>
               <tbody>

                   <?php 
                   $query= "SELECT * FROM tarea";
                   $resultado = mysqli_query($conn, $query);

                   while($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['titulo']?></td>
                        <td><?php echo $row['descripcion']?></td>
                        <td><?php echo $row['fecha_creacion']?></td>
                        <td><a href="editar_tarea.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary"><i class="fas fa-wrench"></i></a>
                            <a href="eliminar_tarea.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                    </tr>

                   <?php } ?>
               </tbody>

            </thead>
        </table>
    </div>
</div>
<?php include("incluir/footer.php") ?>