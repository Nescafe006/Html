<?php
include("conexao.php");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["titulo"]) && isset($_POST["isbn"]) && isset($_POST["edicao"]) && isset($_POST["editora"]) && isset($_POST["ano"]) && isset($_POST["preco"])  && isset($_POST["categoria"]) && isset($_POST["autor"]))
    {

        $titulo = $_POST["titulo"];
        $isbn = $_POST["isbn"];
        $edicao = $_POST["edicao"];
        $editora = $_POST["editora"];
        $ano= $_POST["ano"];
        $preco = $_POST["preco"];
        $categoria = $_POST["categoria"];
        $autor = $_POST["autor"];



        $stmt = $conn->prepare("INSERT INTO livro (li_titulo, li_isbn, li_edicao, li_editora, li_anodepublicacao, li_precodecapa, li_categoria, au_cod) VALUES (?, ?, ?, ?, ?, ?, ? , ?)");

        
        if ($stmt) { 
            $stmt->bind_param("sssssdsi", $titulo, $isbn, $edicao, $editora, $ano, $preco, $categoria, $autor);


            if ($stmt->execute()) {
                echo "<script>alert('Livro cadastrado com sucesso!'); window.location.href='Cadastro_livro.php';</script>";
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