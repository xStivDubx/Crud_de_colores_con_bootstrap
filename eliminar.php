<?php

include_once("conexion.php");

$id = $_GET['id'];


$sql = "DELETE FROM color WHERE id=?";
$prepare = $pdo->prepare($sql);

$prepare->execute(array($id));


$prepare=null;
$pdo=null;
header("location: index.php");