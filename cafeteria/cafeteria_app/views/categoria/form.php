<?php require 'views/partials/header.php'; ?>
<?php $isEdit = isset($categoria); ?>
<h2><?= $isEdit ? 'Editar categoría' : 'Nueva categoría' ?></h2>
<form method="post">
  <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input class="form-control" name="nombre" required value="<?= $isEdit ? htmlspecialchars($categoria['nombre']) : '' ?>">
  </div>
  <button class="btn btn-primary"><?= $isEdit ? 'Actualizar' : 'Crear' ?></button>
  <a href="index.php?action=categorias" class="btn btn-secondary">Cancelar</a>
</form>
<?php require 'views/partials/footer.php'; ?>
