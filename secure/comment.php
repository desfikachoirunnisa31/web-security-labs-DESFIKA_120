<?php
require 'includes/db.php';
require 'includes/auth.php';
$user = require_auth();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$author = htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$body = $_POST['body'] ?? '';
// simpan raw, tapi escape saat render; bisa juga sanitasi lebih lanjut
$stmt = $db->prepare('INSERT INTO comments(author,body) VALUES (?,?)');
$stmt->execute([$author,$body]);
}
$rows = $db->query('SELECT * FROM comments ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
header("Content-Security-Policy: default-src 'self'; script-src 'none';");
?>
<!doctype html><html><body>
<h2>Secure Comments (escaped)</h2>
<form method="post">
Komentar: <textarea name="body"></textarea><br>
<button>Kirim</button>
</form>
<hr>
<?php foreach($rows as $r): ?>
<div class="comment">
<strong><?php echo htmlspecialchars($r['author'], ENT_QUOTES, 'UTF-8'); ?></strong>
<p><?php echo nl2br(htmlspecialchars($r['body'], ENT_QUOTES, 'UTF-8')); ?></p>
</div>
<?php endforeach; ?>
</body></html>