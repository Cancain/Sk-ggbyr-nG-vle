<?php require 'config.php'?>

<?php

//Set DSN
$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

//Create a PDO instance
$connection = new PDO($dsn, DB_USER, DB_PASSWORD);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$sql = 'SELECT * FROM portfolio ORDER BY id DESC';
$stmt = $connection->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll();




?>