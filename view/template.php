<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> 
    <link rel="stylesheet" href="<?= URL ?>public/css/style.css"> 
    <title><?= $title ?></title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo URL; ?>home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URL; ?>books">Books</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <h1 class="text-center pt-2 pb-2"><?= $title ?></h1>
      <div><?= $content ?></div>
    </main>
    <footer class="p-3 bg-dark text-white text-center">
      <p>Ahmed Bouzguenda PHP OOP</p>
    </footer>
  </body>
</html>