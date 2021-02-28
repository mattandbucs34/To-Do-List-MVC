<section class="add-form-section">
  <header>
    <h3>Add Task</h3>
  </header>
  <form class="add-task-form" action="index.php" method="POST">
    <input type="hidden" name="action" value="add_task">
    <select name="category">
      <?php foreach ($categories as $category) : ?>
        <option value="<?php echo $category['categoryID']; ?>"><?php echo $category['categoryName']; ?></option>
      <?php endforeach ?>
    </select>
    <input type="text" name="title" placeholder="Enter Task Title Here...">
    <input type="text" name="description" placeholder="Enter Task Description Here...">
    <div class="submit-btn-container">
      <button class="submit-btn" type="submit" value="Add Task"><span class="icon-plus"></span>Add Task</button>
    </div>
  </form>
</section>