<?php
include 'includes/header.php';
$messageSaved = false;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $name = trim($_POST['name'] ?? '');
 $email = trim($_POST['email'] ?? '');
 $message = trim($_POST['message'] ?? '');
 if ($name === '' || $message === '') {
 $error = 'Nimi ja viesti ovat pakollisia.';
 } else {
 $time = date('Y-m-d H:i:s');
 $safeName = str_replace(["■","
"], [' ',' '], $name);
 $safeEmail = str_replace(["■","
"], [' ',' '], $email);
 $safeMessage = str_replace(["■","
"], ['
','
'], $message);
 $line = "Time: $time\nName: $safeName\nEmail: $safeEmail\nMessage:\n$safeMessage\n---\n";
 $file = __DIR__ . '/data/messages.txt';
 if (!is_dir(__DIR__ . '/data')) mkdir(__DIR__ . '/data', 0755, true);
 $res = file_put_contents($file, $line, FILE_APPEND | LOCK_EX);
 if ($res === false) $error = 'Tallennus epäonnistui.';
 else {
 $messageSaved = true;
 $name = $email = $message = '';
 }
 }
}
?>
<section>
 <h2>Ota yhteyttä</h2>
 <?php if ($messageSaved): ?>
 <p class="success">Kiitos! Viestisi on tallennettu.</p>
 <?php endif; ?>
 <?php if ($error): ?>
 <p class="error"><?= htmlspecialchars($error) ?></p>
 <?php endif; ?>
 <form method="post" action="contact.php">
 <label>Nimimerkki
 <input type="text" name="name" value="<?= htmlspecialchars($name ?? '') ?>" required>
 </label>
 <label>Sähköposti
 <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>">
 </label>
 <label>Viesti
 <textarea name="message" rows="6" required><?= htmlspecialchars($message ?? '') ?></textarea>
 </label>
 <button type="submit">Lähetä</button>
 </form>
</section>
<?php include 'includes/footer.php'; ?>