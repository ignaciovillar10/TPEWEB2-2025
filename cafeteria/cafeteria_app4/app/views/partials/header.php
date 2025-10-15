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
        <ul class="navbar-nav me-auto"><a class="nav-link" href="login">Ingresar</a>

              <?php if(isset($usuario)):?>
          <li class="nav-item"><a  class="nav-link" href="index.php?action=usuarios">Usuarios</a></li>
          <li class="nav-item"><a BASE_URLclass="nav-link" href="index.php?action=categorias">Categorías</a></li>
          <li class="nav-item"><a BASE_URL class="nav-link" href="index.php?action=productos">Productos</a></li>
        </ul>
        <?php endif;?>
      </div>
    </div>
  </nav>
  <div class="container">
