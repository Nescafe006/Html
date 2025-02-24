<?php
include("conexao.php");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
#verifica se houve a conexão

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    #só executa a lógica de cadastro quando o formulário for enviado usando o post
    if (isset($_POST["id"]) && isset($_POST["descricao"]) && isset($_POST["setor"]) && isset($_POST["prioridade"]) && isset($_POST["usuario"]))
    {
        $id = $POST["id"];
        $descricao = $_POST["descricao"];
        $setor = $_POST["setor"];
        $prioridade = $_POST["prioridade"];
        $usuario = $_POST["usuario"];


        #garante que os campos nome e email foram enviados no formulário

        $stmt = $conn->prepare("UPDATE tarefa SET (taf_descricao = ?, taf_setor = ?, taf_prioridade = ?, usu_id = ? WHERE taf_id = ?"); 
        #cria uma declaração parametrizada para inserir os valores na tabela  usuário
        # prepare evita injeção de sql(ataques maliciosos)
        
        if ($stmt) {  // Verifica se a preparação foi bem-sucedida
            $stmt->bind_param("ssssi", $descricao, $setor, $prioridade, $usuario, $id);
            #bind_param()substitiui os ? da consulta sql pelos valores dos campos e ss indica que ambos parametros são do tipo string

            if ($stmt->execute()) {
                echo "<script>alert('Tarefa cadastrada com sucesso!'); window.location.href='cadastro_tarefas.php';</script>";
            } else {
                echo "Erro ao cadastrar: " . $stmt->error;
            }

            $stmt->close(); #libera os recursos usados pela declaração preparada
        } else {
            echo "Erro ao preparar a declaração: " . $conn->error;
        }
    } else {
        echo "Erro: Dados do formulário incompletos.";
    }
}

mysqli_close($conn);
?>