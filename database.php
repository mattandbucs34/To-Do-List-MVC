<?php
  $dsn = 'mysql:host=localhost;dbname=todolist';
  $username = 'root';
  $password = 'YaZ5iaewp@z2GU5';

  try {
    $db = new PDO($dsn, $username, $password);
  }catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
  }
?>