<?php
    include('includes/db.php');
    $stmt = $conn->prepare("SELECT * FROM alunos");
    $stmt->execute();
    $alunos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Cadastro de Alunos</h1>
            <a href="cadastro.php" class="btn">Cadastrar Novo Aluno</a>
        </header>
        
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo $aluno['id']; ?></td>
                        <td><?php echo $aluno['nome']; ?></td>
                        <td><?php echo $aluno['email']; ?></td>
                        <td><?php echo $aluno['telefone']; ?></td>
                        <td><?php echo $aluno['data_nascimento']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $aluno['id']; ?>" class="btn edit">Editar</a>
                            <a href="delete.php?id=<?php echo $aluno['id']; ?>" class="btn delete">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
