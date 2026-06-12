<?php
$pageTitle = $pageTitle ?? 'BelleVie';
$activePage = $activePage ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clínica BelleVie - agendamento médico para ginecologia, obstetrícia, exames e procedimentos.">
    <title><?= e($pageTitle) ?> | BelleVie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header" id="topo">
    <a class="brand" href="index.php" aria-label="Voltar para a página inicial">
        <span class="brand-mark">BV</span>
        <span>
            <strong>BelleVie</strong>
            <small>Saúde da mulher</small>
        </span>
    </a>

    <button class="nav-toggle" type="button" aria-label="Abrir menu" aria-expanded="false">☰</button>

    <nav class="main-nav" aria-label="Menu principal">
        <a class="<?= $activePage === 'home' ? 'active' : '' ?>" href="index.php#especialidades">Especialidades</a>
        <a class="<?= $activePage === 'agendamento' ? 'active' : '' ?>" href="agendamento.php">Agendar</a>
        <a class="<?= $activePage === 'dashboard' ? 'active' : '' ?>" href="dashboard.php">Minha conta</a>
        <a class="<?= $activePage === 'privacidade' ? 'active' : '' ?>" href="politica-privacidade.php">Privacidade</a>
        <a class="nav-cta" href="agendamento.php">Novo agendamento</a>
    </nav>
</header>
<main>
