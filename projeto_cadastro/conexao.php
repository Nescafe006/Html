<?php
// Configurações do banco de dados
$host = 'localhost'; // Endereço do servidor MySQL
$dbname = 'db_tarefa'; // Nome do banco de dados
$username = 'root'; // Usuário do banco de dados
$password = '123'; // Senha do banco de dados (vazia por padrão no XAMPP)
// Criar conexão usando a função mysqli_connect
$conn = mysqli_connect($host, $username, $password, $dbname);

// Verificar conexão
if (!$conn) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
} else {
    echo "Conexão com o banco de dados estabelecida com sucesso!";
}