<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_tarefa';
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}                                                          


$nome = $_POST['nome'];
$email = $_POST['email'];



$sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário: " . $conn->error;
}


$conn->close();
?>