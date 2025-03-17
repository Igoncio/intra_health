<?php

$parsed = parse_ini_file('../environment.ini', true);

$_ENV['ENVIRONMENT'] = $parsed['ENVIRONMENT'];

foreach($parsed[$parsed['ENVIRONMENT']] as $key => $value){
    $_ENV[$key] = $value;
}


$dbHost = $_ENV['DB_HOST'];
$dbUsername = $_ENV['DB_USER'];
$dbPassword = $_ENV['DB_PASS'];
$dbName = "intra_health";


$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Falha na conexão: " . $db->connect_error);
}

$conn = mysqli_connect("$dbHost", "$dbUsername", "$dbPassword", "intra_health");