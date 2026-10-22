<?php
declare(strict_types=1);
require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null || $id < 1) {
    http_response_code(400);
    exit('Invalid student ID.');
}

$stmt = $pdo->prepare('DELETE FROM students WHERE id = :id');
$stmt->execute([':id' => $id]);

header('Location: index.php');
exit;
