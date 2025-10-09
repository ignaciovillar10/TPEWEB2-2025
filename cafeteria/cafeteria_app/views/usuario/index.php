<?php require 'views/partials/header.php'; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Usuarios</h2>
  <a class="btn btn-primary" href="index.php?action=usuarios_create">Nuevo usuario</a>
</div>
<table class="table table-striped">
  <thead><tr><th>ID</th><th>Usuario</th><th>Acciones</th></tr></thead>
  <tbody>
    <?php foreach($usuarios as $row): ?>
    <tr>
      <td><?=htmlspecialchars($row['id_usuario'])?></td>
      <td><?=htmlspecialchars($row['usuario'])?></td>
        <a class="btn btn-sm btn-secondary" href="index.php?action=usuarios_edit&id=<?= $row['id_usuario'] ?>">Editar</a>
        <a class="btn btn-sm btn-danger" href="index.php?action=usuarios_delete&id=<?= $row['id_usuario'] ?>" onclick="return confirm('Eliminar?')">Borrar</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require 'views/partials/footer.php'; ?>
