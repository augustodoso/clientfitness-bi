<?php
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
?>
<nav class="nav">
  <a href="<?= $base ?>/index.php">Dashboard</a>
  <a href="<?= $base ?>/clients.php">Clientes</a>
  <a href="<?= $base ?>/workout_create.php">+ Novo Treino</a>
</nav>
