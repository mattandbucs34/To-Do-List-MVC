<?php
  require('../model/database.php');
  require('../model/category_db.php');
  require('../model/item_db.php');

  $action = filter_input(INPUT_POST, 'action');

  switch($action) {
    case('add_category'):
      $categoryName = filter_input(INPUT_POST, 'category_name');
      if($categoryName == NULL || $categoryName == FALSE) {
        $error = "Missing Data. Please try again.";
        include('error.php');
      }else {
        add_category($categoryName);
        header("Location: category_list.php");
      }
      break;
    case('delete_category'):
      $categoryID = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
      if($categoryID == NULL || $categoryID == FALSE) {
        $error = "That category does not exist on the database. Please contact your administrator.";
        include('error.php');
      }else {
        delete_category($categoryID);
        header("Location: category_list.php");
      }
      break;
    default:
      $categories = get_all_categories();
      break;
  }
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Johnson To-Do Task List</title>
  <link rel="stylesheet" href="../css/todolist.css" >
  <link rel="stylesheet" href="../css/style.css" >
</head>
<body>
  <div class="container">
    <?php include('header.php'); ?>
    <main class="category-main">
      <h2>To-Do Category List</h2>
      <?php if($categories == NULL || $categories == FALSE || count($categories) === 0): ?>
        <p>There are no categories. Please add one.</p> 
      <?php else: ?>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th colspan="2">Category</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($categories as $category) : ?>
                <tr>
                  <td>
                    <?php echo $category['categoryName']; ?>
                  </td>
                  <td>
                    <form action="category_list.php" method="post">
                      <input type="hidden" name="action" value="delete_category" />
                      <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>" />
                      <button class="remove-btn" type="submit" value="Delete" ><span class="icon-bin"></span></button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
      <section>
        <h2>Add New Category</h2>
        <form class="add-category-form" action="category_list.php" method="POST">
          <input type="hidden" name="action" value="add_category" />
          <label for="category-name-input">Category Name:</label>
          <input type="text" name="category_name" />
          <button class="submit-btn" type="submit" value="Add" >
            <span class="icon-plus"></span>Add Category
          </button>
        </form>
      </section>
      <?php if($categories != NULL) : ?>
        <div class="btn go-back">
          <a href="../index.php">
            <span class="icon-back_arrows"></span>
            To-Do List
          </a>
        </div>
      <?php endif ?>
    </main>
    <?php include('footer.php'); ?>
  </div>
</body>
</html>