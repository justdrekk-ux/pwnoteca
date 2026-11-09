<?php
$titulo = $titulo ?? 'Pwnoteca';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($titulo) ?> | Pwnoteca</title>

    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

<header class="header">
    <div class="container nav-container">

        <a href="/index.php" class="logo">
            <span class="logo-icon">P</span>
            <span>pwnoteca<span class="logo-dot">.</span></span>
        </a>

        <nav class="navigation">
            <a href="/index.php">Inicio</a>
            <a href="/index.php#catalogo">Laboratorios</a>
            <a href="/index.php#sobre">Sobre el proyecto</a>
        </nav>

        <a href="/index.php#catalogo" class="nav-button">
            Explorar máquinas
        </a>

    </div>
</header>