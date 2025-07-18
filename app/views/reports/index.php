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
