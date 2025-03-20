<?php
global $conexao;
$dbhost = "sql305.infinityfree.com";
$dbUsername = "if0_36233083";
$dbPassword= "miesc79";
$bdName = "if0_36233083_textos";

$conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $bdName);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>