<?php
require 'config.php';
$start_datum = $_GET['start_datum'] ?? '';
$end_datum = $_GET['end_datum'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datum = $_POST['start_datum'];
    $end_datum = $_POST['end_datum'];
    $name  = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM buchungen WHERE start_datum = ?");
    $stmt->execute([$datum]);
    $belegt = $stmt->fetchColumn() > 0;

    if ($belegt) {
        $meldung = "Dieser Tag wurde gerade belegt.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO buchungen (start_datum, end_datum, raum, name, email) VALUES (?,?,?, ?, ?)");
        $stmt->execute([$datum, $end_datum, 1, $name, $email]);
        $meldung = "Deine Buchung für $datum wurde gespeichert. Danke, $name!";
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Raumbuchung</title>
</head>
<body>
  <h2>Buchung für <?= htmlspecialchars($datum) ?></h2>

  <?php if (!empty($meldung)): ?>
    <p><strong><?= htmlspecialchars($meldung) ?></strong></p>
  <?php else: ?>
    <form action="buchen.php" method="post">
      <input type="hidden" name="start_datum" value="<?= htmlspecialchars($start_datum) ?>">
      <input type="hidden" name="end_datum" value="<?= htmlspecialchars($end_datum) ?>">
      Name: <input type="text" name="name" required><br><br>
      E-Mail: <input type="email" name="email" required><br><br>
      <button type="submit">Buchung absenden</button>
    </form>
  <?php endif; ?>
</body>
</html>