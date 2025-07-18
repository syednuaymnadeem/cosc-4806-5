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
  <thead><tr><th>#</th><th>User</th><th>Reminder</th><th>Created</th></tr></thead>
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

<hr>

<h2>Login Counts</h2>
<table class="table table-bordered">
  <thead><tr><th>User</th><th>Logins</th></tr></thead>
  <tbody>
  <?php foreach($loginCounts as $row): ?>
    <tr>
      <td><?= htmlspecialchars($row['username']) ?></td>
      <td><?= (int)$row['login_count'] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="loginChart" height="100"></canvas>
<script>
  const ctx = document.getElementById('loginChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_column($loginCounts, 'username')) ?>,
      datasets: [{
        label: 'Total Logins',
        data: <?= json_encode(array_column($loginCounts, 'login_count')) ?>,
        tension: 0.1
      }]
    }
  });
</script>
