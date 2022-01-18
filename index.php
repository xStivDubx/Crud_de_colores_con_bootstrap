<?php

include_once("conexion.php");

//LEER
$sql = "SELECT * FROM color";
$prepare = $pdo->prepare($sql);

$prepare->execute();

$resultado = $prepare->fetchAll();

//INSERTAR
if($_POST){
    $color = $_POST['color'];
    $descripcion = $_POST['descripcion'];

    $sqlInsertar= "INSERT INTO color (nombre_color,descripcion) VALUES (?,?)";
    $prepare = $pdo->prepare($sqlInsertar);

    //por ahora es el unico cambio que con el mysqli
    //en donde ahi se realizaba con blind_param(ss,parametros,...);

    //los parametros se pasan como un array en el orden que queremos
    $prepare->execute(array($color,$descripcion));

    $prepare=null;
    $pdo=null;
    header("Location: index.php");
}


if($_GET){
    $id=$_GET['id'];
   $sql ="SELECT * FROM color WHERE id=?";
    
    $prepare = $pdo->prepare($sql);
    $prepare->execute(array($id));

    //solo se utiliza fetch porque solo traera un resultado
    $resultado2 = $prepare->fetch();

}

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-6">
                
                <?php
                    foreach($resultado as $dato):
                ?>
                
                <div class="alert alert-<?=$dato['nombre_color'];?>" role="alert">
                    
                    <?=$dato['nombre_color']." - ". $dato['descripcion']; ?>
                
                    

                    <a href="eliminar.php?id=<?=$dato['id']?>" class="float-end ms-3" onclick="confirmacion()">
                        <i class="fas fa-trash"></i>
                    </a>

                    <a href="index.php?id=<?=$dato['id']?>" class="float-end eliminar">
                        <i class="fas fa-edit"></i>
                    </a>
                    
                    
                </div>

                <?php endforeach; ?>
            </div>

            <div class="col-md-6">
                <?php 
                if(!$_GET):
                ?>
                <h2>AGREGAR ELEMENTO</h2>

                <form method="POST"action="index.php">
                    
                    <input type="text" class="form-control" name="color" />
                    <input type="text" class="form-control mt-3" name="descripcion"/>

                    <button class="btn btn-primary mt-3">Agregar</button>
                </form>
                <?php endif?>



                <?php 
                if($_GET):
                ?>
                <h2>EDITAR ELEMENTO</h2>

                <form method="GET"action="editar.php">
                    
                    <input type="text" class="form-control" name="color" 
                    value="<?= $resultado2['nombre_color'];?>"/>
                   
                    <input type="text" class="form-control mt-3" name="descripcion" 
                    value="<?= $resultado2['descripcion']; ?>"/>

                    <input type="hidden" name="id" value="<?= $resultado2['id'];?>" />

                    <button class="btn btn-primary mt-3">Agregar</button>
                </form>
                <?php endif;?>



            </div>
        </div>

        
    </div>
      
    <script src="confirmacion.js"></script>
    <script src="https://kit.fontawesome.com/1f11b08a60.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>


<?php
$prepare=null;
$pdo=null;
?>