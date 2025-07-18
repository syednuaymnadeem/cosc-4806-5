<?php
// ── Must be literally the very first byte in the file ──

// Only if we’re on any “/login…” URL and already authed, send them to /home
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (strpos($path, '/login') === 0 && ! empty($_SESSION['auth']) && $_SESSION['auth'] == 1) {
    header('Location: /home');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="/favicon.png">
  <title>COSC 4806</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
</head>
<body>
