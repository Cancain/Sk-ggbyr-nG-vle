<?php require 'config.php'?>

<?php

function getPortfolio(){
//Set DSN
$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

//Create a PDO instance
$connection = new PDO($dsn, DB_USER, DB_PASSWORD);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$sql = 'SELECT * FROM portfolio ORDER BY id DESC';
$stmt = $connection->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll();
return $posts;
}

function registerUser(){
    
}
?>


