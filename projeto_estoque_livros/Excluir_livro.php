<?php
include("conexao.php");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["livro"])) {
        $livro = $_POST["livro"];

        // Verifica se o autor existe na tabela
        $stmt_check = $conn->prepare("SELECT li_cod FROM livro WHERE li_cod = ?");
        $stmt_check->bind_param("i", $livro);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            // Autor existe, prossegue com a exclusão
            $stmt = $conn->prepare("DELETE FROM livro WHERE li_cod = ?");
            if ($stmt) {
                $stmt->bind_param("i", $livro);

                if ($stmt->execute()) {
                    echo "<script>alert('Exclusão concluída!'); window.location.href='index.php';</script>";
                } else {
                    echo "Erro ao excluir: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Erro ao preparar a declaração: " . $conn->error;
            }
        } else {
            // Autor não encontrado na tabela
            echo "<script>alert('Exclusão fracassada!'); window.location.href='Estoque.php';</script>";
        }
        $stmt_check->close();
    } else {
        echo "Erro: Dados do formulário incompletos.";
    }
}

mysqli_close($conn);
?>
