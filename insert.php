<?php
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];

    $sql = "INSERT INTO alunos (nome, email, telefone, data_nascimento) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $email, $telefone, $data_nascimento]);

    echo "Aluno cadastrado com sucesso!";
    header("Location: index.php");
    exit();
}
?>