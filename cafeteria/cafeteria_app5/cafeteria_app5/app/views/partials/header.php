<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cafetería GRANITO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="<?= BASE_URL ?>home">Cafetería</a>
      <div class="collapse navbar-collapse">
          <ul class="list-unstyled d-flex p-2 ml-4">
        <?php
          if(!isset($_SESSION['USER_ID'])):?>  
            <li class="navbar-nav me-auto text-secondary"><a class="nav-link" href="login">Ingresar</a></li>
            <li class="navbar-nav me-auto text-secondary"><a class="nav-link" href="register">Registrarse</a></li>
        <?php endif;?>
              <?php
              if(isset($_SESSION['USER_ID'])):?>
                  <li class="nav-item text-secondary"><a  class="nav-link" href="index.php?action=usuarios">Usuarios</a></li>
                  <li class="nav-item text-secondary"><a class="nav-link" href="index.php?action=categorias">Categorías</a></li>
                  <li class="nav-item text-secondary"><a  class="nav-link" href="index.php?action=productos">Productos</a></li>
                  <li class="nav-item text-secondary"><a  class="nav-link" href="logout">Salir</a></li>
              <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
