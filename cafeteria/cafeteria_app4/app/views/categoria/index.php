<?php require 'app/views/partials/header.php'; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Categorías</h2>
  <a class="btn btn-primary" href="index.php?action=categorias_create">Nueva categoría</a>
</div>
<table class="table table-striped">
  <thead><tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr></thead>
  <tbody>
    <?php foreach($items as $row): ?>
    <tr>
      <td><?=htmlspecialchars($row['id_categoria'])?></td>
      <td><?=htmlspecialchars($row['nombre'])?></td>
      <td>
<a class="btn btn-sm btn-secondary" href="index.php?action=categorias_edit&id=<?= htmlspecialchars($row['id_categoria']) ?>">Editar</a>
<a class="btn btn-sm btn-danger" href="index.php?action=categorias_delete&id=<?= htmlspecialchars($row['id_categoria']) ?>" onclick="return confirm('Eliminar?')">Borrar</a>

      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require 'app/views/partials/footer.php'; ?>