<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "intra_health";

// Conectar ao banco de dados
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar se a conexão foi bem-sucedida
if ($db->connect_error) {
    die("Falha na conexão: " . $db->connect_error);
}

$conn = mysqli_connect("localhost", "root", "", "intra_health");