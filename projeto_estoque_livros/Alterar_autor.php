<?php
include("conexao.php");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
    if (isset($_POST["nome"]) && isset($_POST["nacionalidade"]) && isset($_POST["biografia"])) {
        $nome = $_POST["nome"];
        $nacionalidade = $_POST["nacionalidade"];
        $biografia = $_POST["biografia"];
 

        $stmt = $conn->prepare("UPDATE autor SET au_nome, au_nacionalidade, au_biografia WHERE au_cod = ?");
   
        
        if ($stmt) {  
            $stmt->bind_param("sss", $nome, $nacionalidade, $biografia);


            if ($stmt->execute()) {
                echo "<script>alert('Autor cadastrado com sucesso!'); window.location.href='index.php';</script>";
            } else {
                echo "Erro ao cadastrar: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro ao preparar a declaração: " . $conn->error;
        }
    } else {
        echo "Erro: Dados do formulário incompletos.";
    }
}

mysqli_close($conn);
?>
