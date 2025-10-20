<?php require 'app/views/partials/header.php'; ?>
<div class="container my-4">
  <h2 class="text-center mb-4">Nuestros Productos</h2>

  <div class="row">
    <?php foreach ($productos as $p): ?>
      <div class="col-md-3 mb-4">
        <div class="card shadow-sm">
          <img src="<?= htmlspecialchars($p['img']) ?>" class="card-img-top" alt="Imagen del producto">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($p['nombre']) ?></h5>
            <p class="card-text mb-1">Categoría: <?= htmlspecialchars($p['categoria_nombre'] ?? 'Sin categoría') ?></p>
            <p class="fw-bold">$<?= htmlspecialchars($p['precio']) ?></p>

            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
              <a href="index.php?action=productos_edit&id=<?= $p['id_producto'] ?>" class="btn btn-sm btn-warning">Editar</a>
              <a href="index.php?action=productos_delete&id=<?= $p['id_producto'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que querés eliminar este producto?')">Eliminar</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Productos</h2>
  <a class="btn btn-primary" href="index.php?action=productos_create">Nuevo producto</a>
</div>
<table class="table table-striped">
  <thead><tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr></thead>
  <tbody>
    <?php foreach($productos as $row): ?>
    <tr>
      <td><?=htmlspecialchars($row['id_producto'])?></td>
      <td><?=htmlspecialchars($row['nombre'])?></td>
      <td><?=htmlspecialchars($row['categoria_nombre'])?></td>
      <td><?=htmlspecialchars($row['precio'])?></td>
      <td><?=htmlspecialchars($row['stock'])?></td>
      <td>
        <a class="btn btn-sm btn-secondary" href="index.php?action=productos_edit&id=<?= $row['id_producto'] ?>">Editar</a>
        <a class="btn btn-sm btn-danger" href="index.php?action=productos_delete&id=<?= $row['id_producto'] ?>" onclick="return confirm('Eliminar?')">Borrar</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require 'app/views/partials/footer.php'; ?>
