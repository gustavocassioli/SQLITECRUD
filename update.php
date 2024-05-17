<?php
include 'database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $stmt = $pdo->prepare('UPDATE students SET name = ?, email = ?, age = ? WHERE id = ?');
    $stmt->execute([$name, $email, $age, $id]);

    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Aluno</h1>
        <form action="update.php?id=<?php echo $id; ?>" method="post">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required>
            <label for="age">Idade:</label>
            <input type="number" id="age" name="age" value="<?php echo $student['age']; ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>
