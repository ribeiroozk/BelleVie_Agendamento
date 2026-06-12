<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Minha Conta';
$activePage = 'dashboard';
include __DIR__ . '/includes/header.php';
?>

<section class="page-hero compact dashboard-hero">
    <div>
        <span class="eyebrow">Área do paciente</span>
        <h1>Meus agendamentos</h1>
        <p>Consulte os horários salvos no navegador, cancele registros de teste e acompanhe o status.</p>
    </div>
    <a class="btn btn-primary" href="agendamento.php">Adicionar consulta</a>
</section>

<section class="dashboard-layout-v2">
    <aside class="patient-panel">
        <div class="avatar large" aria-hidden="true">P</div>
        <h2>Paciente BelleVie</h2>
        <p>Ambiente demonstrativo</p>
        <div class="mini-stats">
            <span><strong id="total-appointments">0</strong> agendamentos</span>
            <span><strong id="active-appointments">0</strong> ativos</span>
        </div>
    </aside>

    <div class="appointments-panel">
        <div class="panel-header">
            <div>
                <h2>Consultas e exames</h2>
                <p>Dados armazenados localmente para simulação.</p>
            </div>
            <select id="status-filter" aria-label="Filtrar status">
                <option value="all">Todos</option>
                <option value="Confirmado">Confirmados</option>
                <option value="Cancelado">Cancelados</option>
            </select>
        </div>
        <div class="appointments-list" id="appointments-list"></div>
        <div class="empty-state" id="empty-state">
            <h3>Nenhum agendamento encontrado</h3>
            <p>Comece criando um novo agendamento pelo formulário.</p>
            <a class="btn btn-primary" href="agendamento.php">Agendar agora</a>
        </div>
    </div>
</section>

<script src="assets/js/dashboard.js"></script>
<?php include __DIR__ . '/includes/footer.php'; ?>
