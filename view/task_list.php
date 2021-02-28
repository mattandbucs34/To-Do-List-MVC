<main>
  <section>
    <?php include('task_list_filter.php'); ?>
  </section>
  <section class="task-list-section">
    <table class="task-table">
      <thead>
        <tr>
          <td>Task</td>
          <td>Category</td>
          <td>Remove</td>
        </tr>
      </thead>
      <?php foreach ($to_do_list_items as $item) : ?>
      <tr class="task-row">
        <td>
          <p class="task-title"><?php echo $item['Title']; ?></p><!--List Item Title -->
          <p class="task-description"><?php echo $item['Description']; ?></p><!--List Item Description -->
        </td>
        <td>
          <p class="task-description"><?php echo $item['categoryName']; ?></p>
        </td>
        <td class="remove-btn-container">
          <form action="index.php" method="POST">
            <input type="hidden" name="action" value="delete_task" />
            <input type="hidden" name="categoryID" value="<?php echo $item['categoryID']; ?>" />
            <input type="hidden" name="itemID" value="<?php echo $item['ItemNum'] ?>">
            <button class="remove-btn" type="submit" ><span class="icon-bin"></span></button>  
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    
    </table>
  </section>
  <?php include('ToDoListForm.php') ?>
  <div class="btn go-forward">
    <a href="./view/category_list.php">
      Categories
      <span class="icon-forward_arrows"></span>
    </a>
  </div>
</main>