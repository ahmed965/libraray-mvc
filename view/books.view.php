<?php 
ob_start();
?>
<div class="container">
  <a class="btn btn-primary mb-3" href="<?= URL ?>home">Back</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Number of Pages</th>
        <th scope="col">Topic</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data as $book): ?>
      <tr>
        <th scope="row"><?= $book['title'] ?></th>
        <td><?= $book['number_pages'] ?></td>
        <td> <?= $book['topic'] ?></td>
        <td>
          <a href="<?= URL ?>books/edit/<?= $book['id'] ?>" class="btn btn-primary mb-2">Edit book</a>
          <form method="POST" action="<?= URL ?>books/remove" onSubmit="return confirm('Do you want really to delete this book?')">
            <input type="hidden" value="<?= $book['id'] ?>" name="id"> 
            <input type="submit" value="Remove book" class="btn btn-warning"> 
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <a href="<?= URL ?>books/add" class="btn btn-primary mb-3">Add book</a>
</div>
<?php 
$content = ob_get_clean();
$title = 'Books view';
require 'view/template.php';
?>