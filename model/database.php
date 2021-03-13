<?php
  $dsn = 'mysql:host=pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=f4gtcks0wb5h6s92';
  $username = 'vkxaglyqxc0zikln';
  $password = 'rmahmp82fiyzf6yq';

  try {
    $db = new PDO($dsn, $username, $password);
  }catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
  }
?>
