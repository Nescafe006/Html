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
      

    <h2>Cadastro de Tarefas</h2>
    <form action="inserir_tarefa.php" method="post">
        <label for="descricao">Descrição:</label><br>
        <input type="descricao" id="descricao" name="descricao"><br>

        <label for="setor">Setor:</label><br>
        <input type="setor" id="setor" name="setor"><br>

        <label for="usuario">Usuário:</label><br>
        <select id="usuario" name="usuario">

        
            <?php
            include("conexao.php");
          
            if (!$conn) {
              die("Falha na conexão: " . mysqli_connect_error());
            }
          
            $sql = "SELECT usu_id, usu_nome FROM usuario ORDER BY usu_nome";
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row["usu_id"] . "'>" . $row["usu_nome"] . "</option>";
              }
            }
          
            mysqli_close($conn);
            ?>
          </select>
          <br>
        

        <label for="prioridade">Prioridade:</label><br>
  
    <select id="prioridade" name="prioridade">
        <option value="Baixa">Baixa</option>
        <option value="Média">Média</option>
        <option value="Alta">Alta</option>
    </select>  <br>
    

    <br><button type="submit">Cadastrar</button>
    </form>

    <hr>


</body>
</html>
