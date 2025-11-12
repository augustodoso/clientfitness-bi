<?php require __DIR__.'/app/db.php'; ?>
<?php include __DIR__.'/partials/nav.php'; ?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>ClientFitness — Dashboard</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body><div class="container">
  <h1>ClientFitness — Dashboard</h1>
  <?php
  $where = "1=1"; $params = []; $types = "";
  if (!empty($_GET['client_id'])) { $where.=" AND w.client_id=?"; $params[]=(int)$_GET['client_id']; $types.="i"; }
  if (!empty($_GET['from']) && !empty($_GET['to'])) { $where.=" AND w.workout_date BETWEEN ? AND ?"; $params[]=$_GET['from']; $params[]=$_GET['to']; $types.="ss"; }
  if (!empty($_GET['modality'])) { $where.=" AND w.modality=?"; $params[]=$_GET['modality']; $types.="s"; }

  $clients = $mysqli->query("SELECT id, name FROM clients ORDER BY name ASC")->fetch_all(MYSQLI_ASSOC);

  $sql = "SELECT COUNT(*) total_workouts, IFNULL(SUM(duration_min),0) total_min, AVG(rpe) avg_rpe
          FROM workouts w WHERE $where";
  $stmt = $mysqli->prepare($sql);
  if ($params) $stmt->bind_param($types, ...$params);
  $stmt->execute(); $metrics = $stmt->get_result()->fetch_assoc();

  $sqlList = "SELECT w.id, w.workout_date, w.modality, w.duration_min, w.rpe, w.notes, c.name client
              FROM workouts w JOIN clients c ON c.id=w.client_id
              WHERE $where ORDER BY w.workout_date DESC, w.id DESC";
  $stmt2 = $mysqli->prepare($sqlList);
  if ($params) $stmt2->bind_param($types, ...$params);
  $stmt2->execute(); $rows = $stmt2->get_result();
  ?>
  <form class="filter" method="get">
    <label>Cliente:
      <select name="client_id">
        <option value="">Todos</option>
        <?php foreach($clients as $c): ?>
          <option value="<?= $c['id'] ?>" <?= (($_GET['client_id']??'')==$c['id'])?'selected':''; ?>>
            <?= htmlspecialchars($c['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </label>
    <label>De: <input type="date" name="from" value="<?= htmlspecialchars($_GET['from'] ?? '') ?>"></label>
    <label>Até: <input type="date" name="to" value="<?= htmlspecialchars($_GET['to'] ?? '') ?>"></label>
    <label>Modalidade:
      <select name="modality">
        <option value="">Todas</option>
        <?php foreach(['jj','cross','funcional','forca','mobilidade'] as $m): ?>
          <option value="<?= $m ?>" <?= (($_GET['modality'] ?? '')===$m)?'selected':''; ?>><?= $m ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <button type="submit">Filtrar</button>
    <a href="index.php">Limpar</a>
  </form>

  <p>
    <span class="badge">Treinos: <strong><?= (int)$metrics['total_workouts'] ?></strong></span>
    <span class="badge">Minutos: <strong><?= (int)$metrics['total_min'] ?></strong></span>
    <span class="badge">RPE médio: <strong><?= $metrics['avg_rpe'] ? number_format($metrics['avg_rpe'],1,',','.') : '-' ?></strong></span>
  </p>

  <table>
    <tr>
      <th>Data</th><th>Cliente</th><th>Modalidade</th><th>Duração (min)</th><th>RPE</th><th>Notas</th><th>Ações</th>
    </tr>
    <?php while($r = $rows->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($r['workout_date']) ?></td>
        <td><?= htmlspecialchars($r['client']) ?></td>
        <td><?= htmlspecialchars($r['modality']) ?></td>
        <td><?= (int)$r['duration_min'] ?></td>
        <td><?= htmlspecialchars($r['rpe']) ?></td>
        <td><?= htmlspecialchars($r['notes']) ?></td>
        <td class="actions">
          <a href="workout_edit.php?id=<?= $r['id'] ?>">Editar</a>
          <a href="workout_delete.php?id=<?= $r['id'] ?>" onclick="return confirm('Excluir este treino?')">Excluir</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</div></body>
</html>
