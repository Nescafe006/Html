<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Livros</title>
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

<header>
    <div class="caixa-azul">
        <h1>Gerenciamento de Livros</h1>
        <br>


        <div style="width: 100%;">


    

            <div style="float: right; margin-right: 100px;"> <div style="font-size:30px;"><a href="Estoque.php"> Estoque</a></div>
        </div>

  

         <div style="width: 100%;">

            <div style="float: right; margin-right: 100px;"> <div style="font-size:30px;"><a href="Cadastro_livro.php">Cadastro de livros</a></div>
        </div>

        <div style="float: right; margin-right: 100px;"> <div style="font-size:30px;"><a href="index.php">Cadastro de autores</a></div>
    </div>


        

  

        <br>
        <br>

        </div>
    </div>
</header>

<h2>Cadastro de Livros</h2>
<form action="inserir_livro.php" method="post">
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo" required style="width: 300px;"><br>
  

    <label for="isbn">ISBN:</label><br>
    <input type="text" id="isbn" name="isbn" required style="width: 300px;"> <br>

    <label for="edicao">Edição:</label><br>
    <input type="text" id="edicao" name="edicao" required style="width: 300px;"><br>

    <label for="editora">Editora:</label><br>
    <input type="text" id="editora" name="editora" required style="width: 300px;"><br>

    <label for="ano">Ano de lançamento:</label><br>
    <input type="text" id="ano" name="ano" required style="width: 300px;"><br>

    <label for="preco">Preço de capa:</label><br>
    <input type="text" id="preco" name="preco" required style="width: 300px;"><br>

    <label for="categoria">Categoria(Gênero do livro):</label><br>
    <input type="text" id="categoria" name="categoria" required style="width: 300px;"><br>

    <label for="autor">Autor:</label><br>
    <select id="autor" name="autor" required style="width: 300px;">

    
        <?php
        include("conexao.php");
      
        if (!$conn) {
          die("Falha na conexão: " . mysqli_connect_error());
        }
      
        $sql = "SELECT au_cod, au_nome FROM autor ORDER BY au_nome";
        $result = mysqli_query($conn, $sql);
      
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["au_cod"] . "'>" . $row["au_nome"] . "</option>";
          }
        }
      
        mysqli_close($conn);
        ?>
      </select>
      <br>
    



<br><button type="submit">Cadastrar</button>
</form>

<hr>


</body>
</html>
