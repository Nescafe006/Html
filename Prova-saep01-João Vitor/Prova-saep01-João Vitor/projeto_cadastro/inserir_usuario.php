<?php

include 'conexao.php';

$nome = $_POST['usu_nome'];
$email = $_POST['usu_email'];



$sql = "INSERT INTO usuarios (usu_nome, usu_email) VALUES ('$nome', '$email')";

if ($conn->query($sql) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário: " . $conn->error;
}


$conn->close();
?>