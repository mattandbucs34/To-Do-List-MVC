<?php
  function get_all_categories() {
    global $db;

    $query = 'SELECT * FROM categories ORDER BY categoryID';

    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
  }

  function get_category_name($category_id) {
    global $db;

    $query_category_name = 'SELECT * FROM categories WHERE categoryID = :categoryID';
    $qStatement = $db->prepare($query_category_name);
    $qStatement->bindValue(':categoryID', $category_id);
    $qStatement->execute();
    $category = $qStatement->fetch();
    $categoryName = $category['categoryName'];
    $qStatement->closeCursor();
    return $categoryName;
  }

  function add_category($category_name) {
    global $db;

    $insert = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
    $statement = $db->prepare($insert);
    $statement->bindValue(':categoryName', $category_name);
    $statement->execute();
    $statement->closeCursor();
    include('addCategoryForm.php');
  }

  function delete_category($categoryID) {
    global $db;

    $delete = 'DELETE FROM categories WHERE categoryID = :categoryID';

    $statement = $db->prepare($delete);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $statement->closeCursor();
  }
?>