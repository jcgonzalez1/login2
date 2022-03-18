<?php
include('config.php');
session_start();
$username = $_POST['usuario']
$password = $_POST['password']

$query = $conn ->prepare("SELECT * FROM usuarios WHERE username = :username");

$query ->bindParam("username, $username, PDO::PARAM_STR");

$query-> execute();

$result = $query -> fetch(PDO::FETCH_ASSOC);
if (!$result) {
    echo 'Usuario o Password es incorrecto ';
}
else{
    if (password_verify($password, $result['PASSWORD'])) {
        echo 'Felicitaciones, Bienvenido';
    }
    else{
        echo 'Error al iniciar';
    }
}