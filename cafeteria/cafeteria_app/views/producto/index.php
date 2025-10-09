<?php require 'views/partials/header.php'; ?>
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
<?php require 'views/partials/footer.php'; ?>
