<?php
//solo sera php por lo tanto no se cierra

include_once('conexion.php');


$id = $_GET['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];

$sql_editar = "UPDATE color set nombre_color=?, descripcion=? WHERE id=?";
$prepare= $pdo->prepare($sql_editar);

$prepare->execute(array($color,$descripcion,$id));


$prepare=null;
$pdo=null;
header("location: index.php");


