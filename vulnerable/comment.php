<?php
require 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$author = $_POST['author'] ?? 'anon';
$body = $_POST['body'] ?? '';
// VULNERABLE: store raw user input
$stmt = $db->prepare('INSERT INTO comments(author,body) VALUES (?,?)');
$stmt->execute([$author,$body]);
}
$rows = $db->query('SELECT * FROM comments ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html><html><body>
<h2>Vulnerable Comments (XSS)</h2>
<form method="post">
Nama: <input name="author"><br>
Komentar: <textarea name="body"></textarea><br>
<button>Kirim</button>
</form>
<hr>
<?php foreach($rows as $r): ?>
<div class="comment">
<strong><?php echo $r['author']; ?></strong>
<p><?php echo $r['body']; ?></p>
</div>
<?php endforeach; ?>
</body></html>