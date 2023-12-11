<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "vibe_travel";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


// Retorna a conexão
return $conn;
?>