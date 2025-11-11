<?php
// menggunakan SQLite untuk kemudahan
$dbfile = __DIR__ . '/../../data_vuln.db';
$init = !file_exists($dbfile);
$db = new PDO('sqlite:' . $dbfile);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($init) {
$db->exec("CREATE TABLE users(id INTEGER PRIMARY KEY, username TEXT, password TEXT);\n");
$db->exec("INSERT INTO users(username,password) VALUES ('alice','password123'),('bob','secret');");
$db->exec("CREATE TABLE comments(id INTEGER PRIMARY KEY, author TEXT, body TEXT);\n");
}