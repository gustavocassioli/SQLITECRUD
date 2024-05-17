<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alunos Cadastrados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Alunos Cadastrados</h1>
        <a href="create.php">Cadastrar Novo Aluno</a>

        <form action="read.php" method="get" style="margin-top: 20px;">
            <label for="search_id">Consultar Aluno pelo ID:</label>
            <input type="number" id="search_id" name="id" required>
            <button type="submit">Buscar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Idade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query('SELECT * FROM students');
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td data-label='ID'>{$row['id']}</td>
                        <td data-label='Nome'>{$row['name']}</td>
                        <td data-label='Email'>{$row['email']}</td>
                        <td data-label='Idade'>{$row['age']}</td>
                        <td data-label='Ações' class='actions'>
                            <a href='read.php?id={$row['id']}'>Ver</a> |
                            <a href='update.php?id={$row['id']}'>Editar</a> |
                            <a href='delete.php?id={$row['id']}'>Deletar</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
