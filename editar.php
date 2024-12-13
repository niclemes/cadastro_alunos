<?php
    include('includes/db.php');
    
    // Verifica se o ID foi passado pela URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Prepara a consulta SQL para obter os dados do aluno
        $stmt = $conn->prepare("SELECT * FROM alunos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        // Obtém o aluno
        $aluno = $stmt->fetch();
    } else {
        // Se não passar o ID, redireciona para a lista
        header('Location: index.php');
        exit;
    }

    // Verifica se o formulário foi enviado para atualizar os dados
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];

        // Atualiza os dados no banco
        $stmt = $conn->prepare("UPDATE alunos SET nome = :nome, email = :email, telefone = :telefone, data_nascimento = :data_nascimento WHERE id = :id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            // Redireciona de volta para a lista de alunos
            header('Location: index.php');
            exit;
        } else {
            echo "Erro ao atualizar os dados!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Editar Aluno</h1>
            <a href="index.php" class="btn">Voltar para a Lista</a>
        </header>

        <form action="editar.php?id=<?php echo $aluno['id']; ?>" method="POST" class="form">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $aluno['nome']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $aluno['email']; ?>" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo $aluno['telefone']; ?>" required>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $aluno['data_nascimento']; ?>" required>

            <button type="submit" class="btn submit">Atualizar</button>
        </form>
    </div>
</body>
</html>
