<?php
  require('./model/database.php');
  require('./model/category_db.php');
  require('./model/item_db.php');

  $action = filter_input(INPUT_POST, 'action');
  // if($action == NULL) {
  //   $action = filter_input(INPUT_GET, 'action');
  //   if($action == NULL) {
  //     $action = 'list_items';
  //   }
  // }

  switch($action) {
    case('list_items') :
      $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
      if($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
      }
      $category_name = get_category_name($category_id);
      $categories = get_all_categories();
      $to_do_list_items = get_items_by_category($category_id);
      include('index.php');
      break;
    case('delete_task'):
      $item_num = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
      $category_id = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
      if($category_id == NULL || $category_id == FALSE || $item_num == NULL || $item_num == FALSE) {
        $error = "Missing task information or category information.";
        include('./view/error.php');
      }else {
        delete_item($item_num);
        header("Location: .");
      }
      break;
    case('add_task'):
      $category_id = filter_input(INPUT_POST, 'category', FILTER_VALIDATE_INT);
      $title = filter_input(INPUT_POST, 'title');
      $description = filter_input(INPUT_POST, 'description');
      if($category_id == NULL || $category_id == FALSE || $title == NULL || $title == FALSE || $description == NULL || $description == FALSE) {
        $error = "There is missing information. Please review your submission.";
        include('./view/error.php');
      }else {
        add_item($category_id, $title, $description);
        header("Location: .");
      }
      break;
    default:
      $to_do_list_items = get_all_items();
      $categories = get_all_categories();
      // include('index.php');
      break;
  }

  if($categories == NULL || $categories == FALSE) {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = './view/category_list.php';
    header("Location: http://$host$uri/$extra");
  }
?>

<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
  <?php echo $action ?>
  <div class="container">
    <?php include('./view/header.php'); ?>
    <?php include('./view/task_list.php'); ?>
    <?php include('./view/footer.php') ?>
  </div>
</body>
</html>