<?php
$dbhost = "sql305.infinityfree.com";
$dbUsername = "if0_36233083";
$dbPassword= "miesc79";
$bdName = "if0_36233083_textos";
$mysqli = new mysqli($dbhost, $dbUsername, $dbPassword, $bdName);

if ($mysqli->connect_error) {
    die("Erro de conexão com o banco de dados: " . $mysqli->connect_error);
}

date_default_timezone_set('America/Sao_Paulo');
?>