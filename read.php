<?php
include 'database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    echo "Aluno não encontrado!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Detalhes do Aluno</h1>
        <p><strong>ID:</strong> <?php echo $student['id']; ?></p>
        <p><strong>Nome:</strong> <?php echo $student['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
        <p><strong>Idade:</strong> <?php echo $student['age']; ?></p>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>
