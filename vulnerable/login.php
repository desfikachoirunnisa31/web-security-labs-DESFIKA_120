<?php
require 'includes/db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$u = $_POST['username'] ?? '';
$p = $_POST['password'] ?? '';
// VULNERABLE: string concatenation -> SQLi
$sql = "SELECT * FROM users WHERE username = '" . $u . "' AND password = '" . $p . "' LIMIT 1";
$row = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
if($row){ $msg = 'Login berhasil sebagai '.htmlspecialchars($row['username']); }
else{ $msg = 'Gagal login'; }
}
?>
<!doctype html><html><body>
<h2>Vulnerable Login (SQLi)</h2>
<form method="post">
Username: <input name="username"><br>
Password: <input name="password" type="password"><br>
<button>Login</button>
</form>
<p><?php echo $msg;?></p>
<p>Contoh payload SQLi: <code>' OR '1'='1</code></p>
</body></html>