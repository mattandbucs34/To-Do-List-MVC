<?php
require('database.php');

$get_query = 'SELECT * FROM todoitems';

$statement = $db->prepare($get_query);
$statement->execute();
$to_do_list_items = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Johnson To-Do Task List</title>
  <link rel="stylesheet" href="css/todolist.css" >
  <link rel="stylesheet" href="css/style.css" >
</head>
<body>
  <div class="container">
    <header class="list-header">
      <h1>TO-DO TASK LIST</h1>
    </header>
    <main>
      <section class="task-list-section">
        <?php foreach ($to_do_list_items as $item) : ?>
        <div class="to-do-row">
          <div>
            <p class="task-title"><?php echo $item['Title']; ?></p><!--List Item Title -->
            <p class="task-description"><?php echo $item['Description']; ?></p><!--List Item Description -->
          </div>
          <div class="remove-btn-container">
            <form action="delete-task.php" method="POST">
              <input type="hidden" name="itemID" value="<?php echo $item['ItemNum'] ?>">
              <button class="remove-btn" type="submit" ><span class="icon-bin"></span></button>  
            </form>
          </div>
        </div>
        <?php endforeach; ?>
      </section>
      <?php include('ToDoListForm.php') ?>
    </main>
  </div>
</body>
</html>