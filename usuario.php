<?php 

//importar la conexion 
require 'includes/config/database.php';
$db = conectarDB();

//crear email y password
$email = "correo@corrreo.com";
$password = "12345";   

$passwordHash = password_hash($password, PASSWORD_BCRYPT);



//query para crear al usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}'); ";

//echo $query;


//agregarlo a la base de datos
mysqli_query($db, $query);
