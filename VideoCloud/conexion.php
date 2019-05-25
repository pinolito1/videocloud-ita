<?php  
$server = 'localhost';
$username = 'ari';
$password = 'pinol';
$database = 'computo';
try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", 
  	$username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}


?>
