<?php
declare(strict_types=1);
require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name = trim((string) ($_POST['full_name'] ?? ''));
$score = filter_input(INPUT_POST, 'score', FILTER_VALIDATE_INT);

if ($name === '' || mb_strlen($name) > 120 || $score === false || $score === null || $score < 0 || $score > 100) {
    http_response_code(400);
    exit('Invalid student name or score. Go back and try again.');
}

$stmt = $pdo->prepare('INSERT INTO students (full_name, score) VALUES (:name, :score)');
$stmt->execute([':name' => $name, ':score' => $score]);

header('Location: index.php');
exit;
