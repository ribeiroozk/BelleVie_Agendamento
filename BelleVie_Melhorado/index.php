<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Clínica de Ginecologia e Agendamento Médico';
$activePage = 'home';
include __DIR__ . '/includes/header.php';
?>

<section class="hero-section">
    <div class="hero-content">
        <span class="eyebrow">Agendamento médico humanizado</span>
        <h1>Organize sua consulta com segurança, clareza e acolhimento.</h1>
        <p><?= e($clinic['tagline']) ?></p>
        <div class="hero-actions">
            <a class="btn btn-primary" href="agendamento.php">Agendar agora</a>
            <a class="btn btn-secondary" href="#especialidades">Conhecer especialidades</a>
        </div>
        <div class="trust-row" aria-label="Diferenciais da clínica">
            <span>✓ Confirmação organizada</span>
            <span>✓ Dados mínimos necessários</span>
            <span>✓ Área do paciente</span>
        </div>
    </div>
    <div class="hero-card" aria-label="Resumo de atendimento BelleVie">
        <img src="assets/img/banner.png" alt="Ambiente da clínica BelleVie">
        <div class="floating-panel">
            <strong>Próximos horários</strong>
            <span>Hoje: 14h30 · Amanhã: 09h00</span>
        </div>
    </div>
</section>

<section class="metrics-section" aria-label="Resumo da experiência">
    <article>
        <strong>4 etapas</strong>
        <span>Escolha serviço, profissional, data e confirme.</span>
    </article>
    <article>
        <strong>45 min</strong>
        <span>Duração média das consultas no protótipo.</span>
    </article>
    <article>
        <strong>LGPD</strong>
        <span>Fluxo pensado com minimização de dados.</span>
    </article>
</section>

<section class="section-block" id="especialidades">
    <div class="section-heading">
        <span class="eyebrow">Especialidades</span>
        <h2>Serviços com informações claras antes do agendamento</h2>
        <p>O paciente entende o tipo de atendimento, duração média e profissional indicado antes de confirmar.</p>
    </div>
    <div class="cards-grid service-grid">
        <?php foreach ($services as $service): ?>
            <article class="service-card">
                <span class="card-badge"><?= e($service['type']) ?></span>
                <h3><?= e($service['name']) ?></h3>
                <p><?= e($service['description']) ?></p>
                <div class="card-meta">
                    <span><?= e($specialties[$service['specialty']]) ?></span>
                    <span><?= e($service['duration']) ?> min</span>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="journey-section">
    <div class="section-heading align-left">
        <span class="eyebrow">Fluxo do sistema</span>
        <h2>Da escolha da consulta até o acompanhamento</h2>
    </div>
    <div class="timeline-grid">
        <article><span>1</span><h3>Triagem leve</h3><p>O sistema coleta apenas dados necessários para marcar e identificar o paciente.</p></article>
        <article><span>2</span><h3>Agenda inteligente</h3><p>Horários são filtrados por profissional, serviço e conflitos locais no protótipo.</p></article>
        <article><span>3</span><h3>Consentimento</h3><p>Antes da confirmação, o paciente aceita o uso dos dados para finalidade de agendamento.</p></article>
        <article><span>4</span><h3>Painel do paciente</h3><p>O dashboard lista, cancela e acompanha consultas salvas no navegador.</p></article>
    </div>
</section>

<section class="section-block soft-bg" id="equipe">
    <div class="section-heading">
        <span class="eyebrow">Equipe</span>
        <h2>Profissionais cadastradas no protótipo</h2>
        <p>Dados demonstrativos. Em produção, o CRM e as permissões devem ser validados no back-end.</p>
    </div>
    <div class="cards-grid doctors-grid">
        <?php foreach ($doctors as $doctor): ?>
            <article class="doctor-card">
                <div class="avatar" aria-hidden="true"><?= e(substr($doctor['name'], 5, 1)) ?></div>
                <h3><?= e($doctor['name']) ?></h3>
                <p><?= e($doctor['role']) ?></p>
                <small><?= e($doctor['crm']) ?></small>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="contact-band" id="contato">
    <div>
        <span class="eyebrow">Contato</span>
        <h2>Precisa remarcar ou tirar dúvidas?</h2>
        <p><?= e($clinic['address']) ?></p>
    </div>
    <div class="contact-actions">
        <a class="btn btn-primary" href="agendamento.php">Agendar atendimento</a>
        <a class="btn btn-secondary" href="mailto:<?= e($clinic['email']) ?>"><?= e($clinic['email']) ?></a>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
