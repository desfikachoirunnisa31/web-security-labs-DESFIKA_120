<?php
$dbfile = __DIR__ . '/../../data_secure.db';
$init = !file_exists($dbfile);
$db = new PDO('sqlite:' . $dbfile);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($init) {
$db->exec("CREATE TABLE users(id INTEGER PRIMARY KEY, username TEXT UNIQUE, password_hash TEXT, uuid TEXT, session_token TEXT);\n");
// password hash untuk 'alice' dan 'bob'
$db->exec("INSERT INTO users(username,password_hash,uuid) VALUES ('alice','" . password_hash('password123', PASSWORD_DEFAULT) . "', '" . uniqid('u_') . "')");
}