<?php require 'app/views/partials/header.php'; ?>
<?php $isEdit = isset($producto); ?>
<h2><?= $isEdit ? 'Editar producto' : 'Nuevo producto' ?></h2>
<form method="post">
  <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input class="form-control" name="nombre" required value="<?= $isEdit ? htmlspecialchars($producto['nombre']) : '' ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Categoría</label>
    <select class="form-select" name="id_categoria">
      <option value="">-- Sin categoría --</option>
      <?php foreach($categorias as $c): ?>
        <option value="<?= $c['id_categoria'] ?>" <?= ($isEdit && $producto['id_categoria']==$c['id_categoria']) ? 'selected' : '' ?>><?= htmlspecialchars($c['nombre']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Precio</label>
    <input class="form-control" name="precio" type="number" step="0.01" required value="<?= $isEdit ? htmlspecialchars($producto['precio']) : '0.00' ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Stock</label>
    <input class="form-control" name="stock" type="number" required value="<?= $isEdit ? htmlspecialchars($producto['stock']) : '0' ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Url de imagen</label>
    <input class="form-control" name="img" type="text" required>
  </div>
  <button class="btn btn-primary"><?= $isEdit ? 'Actualizar' : 'Crear' ?></button>
  <a href="index.php?action=productos" class="btn btn-secondary">Cancelar</a>
</form>
<?php require 'app/views/partials/footer.php'; ?>
