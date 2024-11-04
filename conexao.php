<?php
$host = 'localhost'; // Altere se necessário
$dbname = 'pesquisa_db'; // Nome do seu banco de dados
$username = 'root'; // Seu usuário do banco de dados
$password = ''; // Sua senha do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexão falhou: " . $e->getMessage());
}
?>
