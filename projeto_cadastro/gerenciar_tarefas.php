<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        h2 {
            color: #555;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        hr {
            border: 0;
            height: 1px;
            background: #ccc;
            margin: 20px 0;
        }
        .caixa-azul {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .caixa-azul h1 {
            color: white;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
       .caixa-cinza {
        width: 300px;
        height:200px;
        background-color: #d3d3d3;
        border:2px solid #solid #333;
        padding:20px;
        margin: bottom 50px;
        box-sizing: border-box;
       } 



    </style>
</head>

<body>
    <header>
        <div class="caixa-azul">
            <h1>Gerenciamento de Tarefas</h1>
            <br>


            <div style="width: 100%;">


        

                <div style="float: right; margin-right: 100px;"> <div style="font-size:30px;"><a href="gerenciar_tarefas.php"> Gerenciar tarefas</a></div>
            </div>

      

             <div style="width: 100%;">

                <div style="float: right; margin-right: 100px;"> <div style="font-size:30px;"><a href="Cadastro_tarefas.php">Cadastro de tarefas</a></div>
            </div>

            <div style="float: right; margin-right: 100px;"> <div style="font-size:30px;"><a href="index.html">Cadastro de usuários</a></div>
        </div>

            <br>
            <br>

            </div>
        </div>
    </header>

    <h2>Tarefas</h2>
    <?php
    include("conexao.php");

    // Verifica se um ID foi passado para edição
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Recupera os dados da tarefa
        $sql = "SELECT t.taf_id, t.taf_descricao, t.taf_setor, t.taf_prioridade, u.usu_nome 
                FROM tarefa t 
                JOIN usuario u ON t.usu_id = u.usu_id 
                WHERE t.taf_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $tarefa = $result->fetch_assoc();
        } else {
            echo "<p>Tarefa não encontrada.</p>";
            $tarefa = null;
        }
        $stmt->close();
    } else {
        $tarefa = null;
    }
    ?>

    <!-- Formulário para alterar uma tarefa -->
    <?php if ($tarefa): ?>
        <form action="alterar_tarefa.php" method="post">
            <input type="hidden" name="id" value="<?php echo $tarefa['taf_id']; ?>">
            <div class="caixa-cinza">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" value="<?php echo $tarefa['taf_descricao']; ?>" required>
                <br><br>
                <label for="setor">Setor:</label>
                <input type="text" name="setor" value="<?php echo $tarefa['taf_setor']; ?>" required>
                <br><br>
                <label for="usuario">Vinculado a:</label>
                <input type="text" name="usuario" value="<?php echo $tarefa['usu_nome']; ?>" required>
                <br><br>
                <label for="prioridade">Prioridade:</label>
                <input type="text" name="prioridade" value="<?php echo $tarefa['taf_prioridade']; ?>" required>
                <br><br>
                <button type="submit">Alterar Tarefa</button>
            </div>
        </form>
    <?php endif; ?>

    <!-- Lista de Tarefas -->
    <div class="flex-container">
        <?php
        // Consulta para recuperar todas as tarefas
        $sql = "SELECT t.taf_id, t.taf_descricao, t.taf_setor, t.taf_prioridade, u.usu_nome 
                FROM tarefa t 
                JOIN usuario u ON t.usu_id = u.usu_id 
                ORDER BY t.taf_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="caixa-azul">
                    <label for="descricao">Descrição:</label>
                    <p>' . $row["taf_descricao"] . '</p>
                    <label for="setor">Setor:</label>
                    <p>' . $row["taf_setor"] . '</p>
                    <label for="usuario">Vinculado a:</label>
                    <br>
                    <p>' . $row["usu_nome"] . '</p>
                    <label for="prioridade">Prioridade:</label>
                    <p>' . $row["taf_prioridade"] . '</p>

                    <a href="gerenciar_tarefas.php?id=' . $row["taf_id"] . '">Editar</a>
                    
                    <form action="excluir_tarefa.php" method="post" style="display:inline;">

                        <input type="hidden" name="id" value="' . $row["taf_id"] . '">
                        <button type="submit">Excluir</button>
                    </form>
                </div>';
            }
        } else {
            echo "<p>Nenhuma tarefa cadastrada.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>