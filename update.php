<?php
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];

    $sql = "UPDATE alunos SET nome = ?, email = ?, telefone = ?, data_nascimento = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $email, $telefone, $data_nascimento, $id]);

    echo "Aluno atualizado com sucesso!";
    header("Location: index.php");
    exit();
}
?>
