<?php
header('Access-Control-Allow-Origin: http://localhost:63342');

$pdo = new PDO('mysql:host=127.0.0.1;dbname=php_22_23', 'root','root');
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$request = $pdo->prepare('SELECT * from jeux_videos');
$request->execute();
$games = $request->fetchAll();

echo json_encode($games);
