<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Livros</title>
    <style>

table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
        }

        table, table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table th:nth-child(1), table td:nth-child(1) {
            width: 50px;
        }

        table th:nth-child(2), table td:nth-child(2) {
            width: 150px;
        }


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

<body>

<h2>Livros Disponíveis</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>isbn</th>
            <th>Edição</th>
            <th>Editora</th>
            <th>ano de lançamento</th>
            <th>Preço de capa</th>
            <th>Categoria</th>
            <th>ID autor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "123";
        $dbname = "db_livros";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        $sql = "SELECT li_cod, li_titulo, li_isbn, li_edicao, li_editora, li_anodepublicacao, li_precodecapa, li_categoria, au_cod FROM livro";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['li_cod'] . "</td>";
                echo "<td>" . $row['li_titulo'] . "</td>";
                echo "<td>" . $row['li_isbn'] . "</td>";
                echo "<td>" . $row['li_edicao'] . "</td>";
                echo "<td>" . $row['li_editora'] . "</td>";
                echo "<td>" . $row['li_anodepublicacao'] . "</td>";
                echo "<td>" . $row['li_precodecapa'] . "</td>";
                echo "<td>" . $row['li_categoria'] . "</td>";
                echo "<td>" . $row['au_cod'] . "</td>";
                echo "<td>";
                echo "<form action='Excluir_livro.php' method='post'>";
                echo "<input type='hidden' name='livro' value='" . $row['li_cod'] . "'>";
                echo "<input type='submit' value='Excluir'>";
                echo "</form>";
                echo "<form action='Alterar_livro.php' method='post'>";
                echo "<input type='hidden' name='livro' value='" . $row['li_cod'] . "'>";
                echo "<input type='hidden' name='autor' value='" . $row['au_cod'] . "'>";
                echo "<input type='submit' value='Alterar'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>Nenhum livro cadastrado.</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>