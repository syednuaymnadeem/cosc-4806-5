<?php

if (empty($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COSC 4806</title>
  <link rel="icon" href="/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="/home">COSC 4806</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#privNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="privNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/reminders">Reminders</a></li>
        <li class="nav-item"><a class="nav-link" href="/secret">Secret</a></li>
        <?php if (! empty($_SESSION['username']) && $_SESSION['username'] === 'admin'): ?>
          <li class="nav-item"><a class="nav-link" href="/reports">Reports</a></li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <span class="navbar-text me-3">
            Welcome, <?= htmlspecialchars($_SESSION['username']) ?>
          </span>
        </li>
        <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
