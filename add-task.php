<?php
  $title = filter_input(INPUT_POST, 'title');
  $description = filter_input(INPUT_POST, 'description');

  if($title == null || $description == null) {
    $error = "Invalid entry. Please fill in each field.";
    //include error.php
  }else {
    require_once('database.php');

    $insert = 'INSERT INTO todoitems (ItemNum, Title, Description) VALUES (NULL, :title, :description)';
    $statement = $db->prepare($insert);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();

    include('index.php');
  }
?>