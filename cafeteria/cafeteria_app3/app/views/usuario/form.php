<?php require 'app/views/partials/header.php'; ?>
<?php $isEdit = isset($usuario); ?>
<h2><?= $isEdit ? 'Editar usuario' : 'Nuevo usuario' ?></h2>
<form method="post">
  <div class="mb-3">
    <label class="form-label">Usuario</label>
    <input class="form-control" name="nombre" required value="<?= $isEdit ? htmlspecialchars($usuario['usuario']) : '' ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Contraseña</label>
    <input class="form-control" name="apellido" required value="<?= $isEdit ? htmlspecialchars($usuario['contrasenia']) : '' ?>">
  </div>
  <button class="btn btn-primary"><?= $isEdit ? 'Actualizar' : 'Crear' ?></button>
  <a href="index.php?action=usuarios" class="btn btn-secondary">Cancelar</a>
</form>
<?php require 'app/views/partials/footer.php'; ?>
