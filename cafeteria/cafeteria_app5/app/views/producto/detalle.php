<?php require 'app/views/partials/header.php'; ?>
<div class="col-md-3 mb-4">
        <div class="card shadow-sm">
          <img src="<?=htmlspecialchars($p['img'])?>" alt="Producto" class="card-img-top" >
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($p['nombre']) ?></h5>
            <p class="card-text mb-1">Categoría: <?= htmlspecialchars($p['categoria_nombre'] ?? 'Sin categoría') ?></p>
            <p class="fw-bold">$<?= htmlspecialchars($p['precio']) ?></p>
          </div>
        </div>
</div>
<?php require 'app/views/partials/footer.php'; ?>