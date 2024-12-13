<?php
$host = 'localhost';
$username = 'root';
$password = '';  // No XAMPP, a senha padrão do MySQL é vazia
$database = 'cadastro_alunos';

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Definindo o modo de erro do PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro na conexão: ' . $e->getMessage();
}
?>
