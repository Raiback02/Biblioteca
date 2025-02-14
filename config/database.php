<?php
$host = "localhost";
$dbname = "biblioteca_gsn";
$username = "root";
$password = ""; // Como não tem, vai ficar vaziu
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o Banco de Dados: " . $e->getMessage());
}
?>
