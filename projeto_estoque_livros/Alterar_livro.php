<?php
include("conexao.php");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["titulo"]) && isset($_POST["isbn"]) && isset($_POST["edicao"]) && isset($_POST["editora"]) && isset($_POST["ano"]) && isset($_POST["preco"])  && isset($_POST["categoria"])  && isset($_POST["livro"]))
    {

        $titulo = $_POST["titulo"];
        $isbn = $_POST["isbn"];
        $edicao = $_POST["edicao"];
        $editora = $_POST["editora"];
        $ano= $_POST["ano"];
        $preco = $_POST["preco"];
        $categoria = $_POST["categoria"];
        $autor = $_POST["autor"];
        $livro = $_POST["livro"];
     



        $stmt = $conn->prepare("UPDATE livro SET li_titulo = ?, li_isbn = ?, li_edicao = ?, li_editora = ?, li_anodepublicacao = ?, li_precodecapa = ?, li_categoria = ?, au_cod = ? WHERE li_cod = ?");

        
        if ($stmt) { 
            $stmt->bind_param("sssssdsii", $titulo, $isbn, $edicao, $editora, $ano, $preco, $categoria, $autor, $livro);


            if ($stmt->execute()) {
                echo "<script>alert('Informações referentes ao livro atualizadas com sucesso!'); window.location.href='Estoque.php';</script>";
            } else {
                echo "Erro ao alterar: " . $stmt->error;
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