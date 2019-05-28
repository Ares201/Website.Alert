<?php

$link = 'mysql:host=localhost;dbname=bdcolores';
$usuario = 'root';
$contraseña = '12345678';


try{

    $pdo = new PDO($link, $usuario, $contraseña);
    //echo 'conectado';

}catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}