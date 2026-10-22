<?php
declare(strict_types=1);
require __DIR__ . '/config.php';

$students = $pdo->query(
    'SELECT id, full_name, score, created_at FROM students ORDER BY id DESC'
)->fetchAll();

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>School Portal | Students</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="topbar">
  <a class="brand" href="index.php"><span class="brand-mark">SP</span> School Portal</a>
  <span class="topbar-note">Student management demo</span>
</header>
<main class="container">
  <section class="hero">
    <p class="eyebrow">STUDENT ADMINISTRATION</p>
    <h1>Manage students <span>with clarity.</span></h1>
    <p class="hero-copy">A simple PHP and MySQL project for managing student records and results.</p>
  </section>

  <section class="panel">
    <div class="panel-heading">
      <div><h2>Add a student</h2><p>Enter a name and a score from 0 to 100.</p></div>
    </div>
    <form action="add_student.php" method="post" class="student-form">
      <label>Full name
        <input type="text" name="full_name" maxlength="120" required placeholder="e.g. Alex Morgan">
      </label>
      <label>Score
        <input type="number" name="score" min="0" max="100" required placeholder="0–100">
      </label>
      <button type="submit">Add student <span aria-hidden="true">+</span></button>
    </form>
  </section>

  <section class="panel">
    <div class="panel-heading records-heading">
      <div><h2>Student records</h2>
        <p><?= count($students) ?> student<?= count($students) === 1 ? '' : 's' ?> in the database</p>
      </div>
      <span class="record-pill">LIVE DATA</span>
    </div>
    <?php if (!$students): ?>
      <div class="empty-state"><h3>No students yet</h3><p>Add the first student using the form above.</p></div>
    <?php else: ?>
      <div class="table-wrap">
        <table>
          <thead><tr><th>ID</th><th>Student</th><th>Score</th><th>Result</th><th>Action</th></tr></thead>
          <tbody>
          <?php foreach ($students as $student): ?>
            <tr>
              <td class="muted">#<?= (int) $student['id'] ?></td>
              <td class="student-name"><?= e($student['full_name']) ?></td>
              <td><?= (int) $student['score'] ?>/100</td>
              <td><?php if ((int) $student['score'] >= 50): ?>
                <span class="status pass">Pass</span>
              <?php else: ?>
                <span class="status fail">Needs improvement</span>
              <?php endif; ?></td>
              <td><form action="delete_student.php" method="post" onsubmit="return confirm('Delete this student record?');">
                <input type="hidden" name="id" value="<?= (int) $student['id'] ?>">
                <button class="delete-button" type="submit">Delete</button>
              </form></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </section>
  <footer>Built for learning · PHP · MySQL · PDO</footer>
</main>
</body>
</html>
