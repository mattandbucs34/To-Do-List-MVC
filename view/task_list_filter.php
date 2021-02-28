<form action="index.php" method="post">
  <input type="hidden" name="action" value="filter_tasks" />
  <label for="filter_select">Filter Category:</label>
  <select name="filter_select" id="filter_select" onchange="this.form.submit()">
    <option>Show All</option>
    <?php foreach($categories as $category) : ?>
      <option value="<?php echo $category['categoryID']; ?>" <?php if($category_id && $category_id == $category['categoryID']) { ?> selected <?php } ?>  >
        <?php echo $category['categoryName'] ?>
      </option>
    <?php endforeach; ?>
  </select>
</form>