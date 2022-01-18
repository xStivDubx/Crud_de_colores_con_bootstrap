<?php
//si solo se va a trabajar con php en el archivo no es necesario cerrarlo

$link= "mysql:host=localhost:3306;dbname=colores";
$user="root";
$password="";


try{

    $pdo= new PDO($link,$user,$password);

    //echo "conectado";
}catch(PDOException $ex){
    echo "error: ". $ex->getMessage();
}

