<?php 
ob_start();
?>
<div class="bg-home">
  <p class="title-home">
    This is a CRUD application using PHP MVC (Model View Controller)<br>
    We manage list of books in a library.
  </p>
</div>
<?php 
$content = ob_get_clean();
$title = 'Home page';
require 'view/template.php';
?>