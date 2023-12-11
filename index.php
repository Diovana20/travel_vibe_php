<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tabela de Usuários do Travel Vibe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            top: 500px;
            padding: 50px;
            position: relative;
            background-color: #4E6172;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0px;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('imglogins.png') no-repeat center center fixed;
            background-size: cover;
            opacity: 0.8; /* Ajuste o valor conforme necessário */
            z-index: -1;
        }

        h2, h3 {
            text-align: center;
            color: #fff; /* Adiciona cor ao texto para melhor legibilidade sobre a imagem de fundo */
        }

        table {
            width: 80%; /* Ajuste este valor conforme necessário */
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }
        .lixeira-icon {
            width: 20px;
            height: 20px;
        }

        img {
            width: 80%;
            border-radius: 30px;
            display: block;
            margin: 0 auto; /* Centralizar a imagem */
        }
    </style>
</head>
<body>

<h2>Tabela de Usuários do Travel Vibe</h2>
<h3>Disponível apenas para administradores</h3>

<?php

include('conecta.php');

$conn = include('conecta.php');


if ($conn) {
    $query = "SELECT * FROM user";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table>';
            echo '<tr><th>Nome</th><th>Email</th>Ações</tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['NomeUser'] . '</td>';
                echo '<td>' . $row['EmailUser'] . '</td>';
                echo '<td><a href="excluir_usuario.php?IdUser=' . $row['IdUser'] . '"><img class="lixeira-icon" src="lixeira.png" alt="Excluir"></a></td>'; // Adicione um link para a ação de exclusão
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo 'Nenhum usuário encontrado.';
        }

        mysqli_free_result($result);
    } else {    
        echo 'Erro ao executar a query: ' . mysqli_error($conn);
    }   

} else {
    echo 'Erro ao conectar ao banco de dados.';
}
?>

</body>
</html>