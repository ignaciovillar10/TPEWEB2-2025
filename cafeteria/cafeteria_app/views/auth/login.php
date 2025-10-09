<?php require 'views/partials/header.php'; ?>

<div class="col-md-4 mx-auto">
  <h2>Acceso administrador</h2>
  <?php if (isset($error)): ?>
  <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Usuario</label>
      <input class="form-control" name="usuario" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Contraseña</label>
      <input type="password" class="form-control" name="clave" required>
    </div>
    <button class="btn btn-primary w-100">Ingresar</button>
  </form>
</div>

<?php require 'views/partials/footer.php'; ?>
