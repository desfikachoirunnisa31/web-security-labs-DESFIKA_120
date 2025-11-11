<?php
require 'includes/db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])){
$target = __DIR__ . '/uploads/';
if (!is_dir($target)) mkdir($target, 0777, true);

$dest = $target . basename($_FILES['file']['name']);
if (move_uploaded_file($_FILES['file']['tmp_name'], $dest)){
$msg = 'Upload berhasil: ' . htmlspecialchars($dest);
} else { $msg = 'Gagal upload'; }
}
?>
<!doctype html><html><body>
<h2>Vulnerable Upload</h2>
<form method="post" enctype="multipart/form-data">
File: <input type="file" name="file"><br>
<button>Upload</button>
</form>
