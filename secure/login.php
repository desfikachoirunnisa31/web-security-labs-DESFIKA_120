<?php
require 'includes/db.php';
require 'includes/auth.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$u = $_POST['username'] ?? '';
$p = $_POST['password'] ?? '';
$stmt = $db->prepare('SELECT * FROM users WHERE username = ? LIMIT 1');
$stmt->execute([$u]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user && password_verify($p, $user['password_hash'])){
// buat uuid + session token
$uuid = $user['uuid'] ?: bin2hex(random_bytes(8));
$token = bin2hex(random_bytes(16));
$db->prepare('UPDATE users SET uuid = ?, session_token = ? WHERE id = ?')->execute([$uuid,$token,$user['id']]);
// set session
session_start();
$_SESSION['uuid'] = $uuid;
$_SESSION['session_token'] = $token;
header('Location: profile.php'); exit;
} else { $msg = 'Gagal login'; }
}
?>
<!doctype html><html><body>
<h2>Secure Login</h2>
<form method="post">
Username: <input name="username"><br>
Password: <input name="password" type="password"><br>
<button>Login</button>
</form>
<p><?php echo htmlspecialchars($msg);?></p>
</body></html>