<?php

$dbHost = "localhost";
$dbUsername = "teste";
$dbPassword = "H3@LTH_2024";
$dbName = "intra_health";

// Conectar ao banco de dados
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar se a conexão foi bem-sucedida
if ($db->connect_error) {
    die("Falha na conexão: " . $db->connect_error);
}

$conn = mysqli_connect("localhost", "teste", "H3@LTH_2024", "intra_health");