<?php
  function get_all_items() {
    global $db;
    $query = 'SELECT * FROM todoitems INNER JOIN categories ON categories.categoryID = todoitems.categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
  }

  function get_items_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM todoitems WHERE todoitems.categoryID = :categoryID ORDER BY categoryID INNER JOIN categories ON categories.categoryID = todoitems.categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $category_id);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
  }

  function get_item($item_num) {
    global $db;
    $query = 'SELECT * FROM todoitems WHERE ItemNum = :item_num';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_num', $item_num);
    $statement->execute();
    $item = $statement->fetch();
    $statement->closeCursor();
    return $item;
  }

  function delete_item($item_num) {
    global $db;

    $delete = 'DELETE FROM todoitems WHERE ItemNum = :itemNum';

    $statement = $db->prepare($delete);
    $statement->bindValue(':itemNum', $item_num);
    $statement->execute();
    $statement->closeCursor();
  }

  function add_item($category_id, $title, $description) {
    global $db;
    $insert = 'INSERT INTO todoitems (Title, Description, categoryID) VALUES (:title, :description, :categoryID)';
    $statement = $db->prepare($insert);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':categoryID', $category_id);
    $statement->execute();
    $statement->closeCursor();
  }

?>