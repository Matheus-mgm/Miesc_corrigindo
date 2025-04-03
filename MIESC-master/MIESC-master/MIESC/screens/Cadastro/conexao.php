<?php
global $conexao;
$dbhost = "localhost";
$dbUsername = "root";
$dbPassword= "usbw";
$bdName = "cadastro";

$conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $bdName);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>