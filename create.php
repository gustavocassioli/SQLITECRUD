<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar Novo Aluno</h1>
        <form action="create.php" method="post">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="age">Idade:</label>
            <input type="number" id="age" name="age" required>
            <button type="submit">Cadastrar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $age = $_POST['age'];

            $stmt = $pdo->prepare('INSERT INTO students (name, email, age) VALUES (?, ?, ?)');
            $stmt->execute([$name, $email, $age]);

            header('Location: index.php');
        }
        ?>
    </div>
</body>
</html>
