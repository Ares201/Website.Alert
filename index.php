<?php
include_once 'conexion.php';
//leer
$sql_leer = 'SELECT * FROM colores';
$gsent =  $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();

//agregar
if ($_POST) {
    $color = $_POST['color'];
    $descripcion = $_POST['descripcion'];

    $sql_agregar = 'INSERT INTO colores (color, descripcion) VALUES (?,?) ';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($color, $descripcion));
   header ('location:index.php');
} 

if($_GET){
        $id = $_GET['id'];
    $sql_unico = 'SELECT * FROM colores WHERE id=?';
    $gsent_unico =  $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($id));
    $resultado_unico = $gsent_unico->fetchAll();
//var_dump($resultado_unico);
}



?>
<!doctype html>
<html lang="en">
  <head>
  <!-- link font awesome , boostrap-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Boostrap -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php foreach($resultado as $dato):?>
                <div 
                    class="alert alert-<?php echo $dato['color'] ?> text-uppercase" 
                    role="alert">

                    <?php echo $dato['color'] ?>
                    <?php echo $dato['descripcion'] ?>

                        <a href="index.php?id=<?php echo $dato['id'] ?>" class="float-right">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                </div>
                <?php endforeach ?>
            </div>
           <!--Formulario-Agregar elemetos-->
            <div class="col-md-6">
                <?php if(!$_GET):?>
                <h3>Agregar elementos</h3>
                <form method="POST">
                    <input type="text" class="form-control" name="color">
                    <input type="text" class="form-control mt-3" name="descripcion">
                    <button class="btn btn-primary">Agregar</button>
                </form>
                <?php endif?>

                <?php if($_GET):?>
                <h3>Editar elementos</h3>
                <form method="GET" action="editar.php">
                    <input type="text" class="form-control" name="color" value>
                    <input type="text" class="form-control mt-3" name="descripcion">
                    <button class="btn btn-primary">Agregar</button>
                </form>
                <?php endif?>
            </div>
        </div>
    </div>

   
  </body>
</html>