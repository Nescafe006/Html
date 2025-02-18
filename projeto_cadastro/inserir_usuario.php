<?php
include("conexao.php");

$nome = $_POST["nome"];
$email = $_POST["email"];



$sql = "INSERT INTO usuarios (usu_nome, usu_email) VALUES ('".$nome."', '".$email."')";

if (mysqli_query($conn, $sql)) {
    echo "Usuário cadastrado com sucesso!";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error ($conn);
}

mysqli_close($conn);
?>