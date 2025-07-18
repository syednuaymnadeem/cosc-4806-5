<?php
$ctrl = ucwords($_SESSION['controller'] ?? 'Home');
$act  = ucwords($_SESSION['method']     ?? 'Index');
?>
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Reports</li>
  </ol>
</nav>
<h1>Admin Reports</h1>
<h2>All Reminders</h2>

<table class="table table-striped">
  <thead>
    <tr><th>#</th><th>User</th><th>Reminder</th><th>Created</th></tr>
  </thead>
  <tbody>
  <?php foreach($allReminders as $row): ?>
    <tr>
      <td><?= htmlspecialchars($row['id']) ?></td>
      <td><?= htmlspecialchars($row['username']) ?></td>
      <td><?= htmlspecialchars($row['reminder']) ?></td>
      <td><?= htmlspecialchars($row['created_at']) ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<hr>

<h2>User with Most Reminders</h2>
<p>
  <strong><?= htmlspecialchars($topUser['username']) ?></strong>
   (<?= $topUser['cnt'] ?> reminders)
</p>
