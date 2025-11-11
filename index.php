<?php
// index.php — menu utama
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Penggabungan Kerentanan Web — Lab</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
<h1>Penggabungan Kerentanan Web — Lab</h1>
<p>Pilih modul (versi vulnerable / secure):</p>
<ul>
<li><a href="vulnerable/login.php">Vulnerable — Login (SQLi)</a> | <a href="secure/login.php">Secure — Login</a></li>
<li><a href="vulnerable/comment.php">Vulnerable — Comment (XSS)</a> | <a href="secure/comment.php">Secure — Comment</a></li>
<li><a href="vulnerable/upload.php">Vulnerable — Upload</a> | <a href="secure/upload.php">Secure — Upload</a></li>
<li><a href="vulnerable/profile.php">Vulnerable — Profile (Broken AC)</a> | <a href="secure/profile.php">Secure — Profile</a></li>
</ul>


<hr>
<p>Instruksi singkat:</p>
<ol>
<li>Letakkan folder ini di server PHP (XAMPP / LAMP) atau gunakan PHP built-in `php -S localhost:8000` dari root projek.</li>
<li>Buka `index.php` di browser.</li>
<li>Untuk versi secure, gunakan halaman login di `secure/login.php` — sistem membuat UUID & session token.
</ol>
</div>
</body>
</html>