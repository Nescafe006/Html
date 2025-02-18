<?php

$servername = 'localhost';
$database = 'db_tarefa';
$user = 'root';
$password = '';

$conn = new mysqli_connect($servername, $user, $password, $database);

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}                                                          

?>