<?php

/**
 * TRACKFY - Head Component
 * Componente de cabeçalho HTML com meta tags e recursos
 */
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo htmlspecialchars($page_description ?? 'Trackfy - Descubra, avalie e compartilhe suas músicas favoritas'); ?>">
  <meta name="theme-color" content="#1DB954">

  <title><?php echo htmlspecialchars($page_title ?? 'Trackfy'); ?> - Trackfy</title>

  <!-- Global CSS -->
  <link rel="stylesheet" href="/css/global.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Page Specific CSS -->
  <?php if (isset($page_css)): ?>
    <link rel="stylesheet" href="/css/<?php echo htmlspecialchars($page_css); ?>">
  <?php endif; ?>

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="/imgs/favicon.svg">
</head>

<body>