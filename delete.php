<?php
include 'database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM students WHERE id = ?');
$stmt->execute([$id]);

header('Location: index.php');
?>
