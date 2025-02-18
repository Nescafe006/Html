<?php

include 'conexao.php';


$descricao = $_POST['tar_descricao'];
$setor = $_POST['tar_setor'];
$prioridade = $_POST['tar_prioridade'];
$usuario = $_POST['usu_id'];
$status = $_POST['tar_status'];


$sql = "INSERT INTO tarefa (Tar_descricao, tar_setor, tar_prioridade, usu_id, status)
        VALUES ('$descricao', '$setor', '$prioridade', '$usuario', '$status')";

if ($conn->query($sql) {
    echo "Tarefa cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar tarefa: " . $conn->error;
}

$conn->close();
?>