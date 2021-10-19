<?php 
ob_start();
?>
<div class="container">
  <form method="post" action ="<?= URL ?>books/add">
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input class="form-control <?php echo !empty($data['error_title']) ? 'is-invalid' : ''; ?>" type="text" name="title" value="<?= $data['title'] ?>">
      <span class="invalid-feedback"><?php echo !empty($data['error_title']) ? $data['error_title'] : '';  ?></span>
      </div>
      <div class="mb-3">
        <label class="form-label">Number of pages</label>
        <input class="form-control <?php echo !empty($data['error_number_pages']) ? 'is-invalid' : ''; ?>" type="text" name="number_pages" value="<?= $data['number_pages'] ?>">
        <span class="invalid-feedback"><?php echo !empty($data['error_number_pages']) ? $data['error_number_pages'] : ''; ?></span>
      </div>
      <div class="mb-3">
        <label class="form-label">Topic</label>
        <input class="form-control <?php echo !empty($data['error_topic']) ? 'is-invalid' : ''; ?>" type="text" name="topic" value="<?= $data['topic'] ?>">
        <span class="invalid-feedback"><?php echo !empty($data['error_topic']) ? $data['error_topic'] : ''; ?></span>  
      </div>
      <div>
        <input type="submit" name="submit" value="Add a book" class="btn btn-primary mb-3"> 
      </div>
  </form>
</div>
<?php 
$content = ob_get_clean();
$title = 'Add book';
require 'view/template.php';
?>