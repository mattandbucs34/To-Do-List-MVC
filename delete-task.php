<?php
  // require('database.php');

  $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);

  if($itemID != false) {
    require_once('database.php');
    $delete = 'DELETE FROM todoitems WHERE ItemNum = :itemID';

    $statement = $db->prepare($delete);
    $statement->bindValue(':itemID', $itemID);
    $success = $statement->execute();
    $statement->closeCursor();
  }
  include('index.php');
?>