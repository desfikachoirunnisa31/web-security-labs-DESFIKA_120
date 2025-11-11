<?php
// fungsi helper autentikasi untuk folder secure
function require_auth() {
session_start();
if (empty($_SESSION['uuid']) || empty($_SESSION['session_token'])){
header('Location: login.php'); exit;
}
global $db;
$stmt = $db->prepare('SELECT * FROM users WHERE uuid = ? AND session_token = ? LIMIT 1');
$stmt->execute([$_SESSION['uuid'], $_SESSION['session_token']]);
$u = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$u) { session_destroy(); header('Location: login.php'); exit; }
return $u; // current user row
}