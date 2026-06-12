<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Agendamento';
$activePage = 'agendamento';
include __DIR__ . '/includes/header.php';
?>

<section class="page-hero compact">
    <span class="eyebrow">Novo agendamento</span>
    <h1>Escolha o serviço, profissional e horário.</h1>
    <p>Este protótipo salva os agendamentos no navegador por JavaScript. Para produção, conecte o fluxo ao banco de dados indicado na pasta <code>database</code>.</p>
</section>

<section class="booking-shell">
    <aside class="booking-aside">
        <h2>Resumo</h2>
        <div class="summary-card" id="booking-summary">
            <p><strong>Serviço:</strong> <span data-summary="service">Não selecionado</span></p>
            <p><strong>Profissional:</strong> <span data-summary="doctor">Não selecionada</span></p>
            <p><strong>Data:</strong> <span data-summary="date">Não selecionada</span></p>
            <p><strong>Horário:</strong> <span data-summary="time">Não selecionado</span></p>
        </div>
        <div class="notice-card">
            <strong>Importante</strong>
            <p>Em caso de urgência ou emergência, procure atendimento presencial imediato. Este sistema é apenas para agendamentos eletivos.</p>
        </div>
    </aside>

    <form class="booking-form-v2" id="booking-form" novalidate>
        <input type="hidden" name="selectedDate" id="selected-date">
        <input type="hidden" name="selectedTime" id="selected-time">

        <fieldset>
            <legend>1. Atendimento</legend>
            <div class="form-grid two-cols">
                <label>
                    Serviço
                    <select name="service" id="service-select" required>
                        <option value="">Selecione</option>
                        <?php foreach ($services as $service): ?>
                            <option value="<?= e($service['id']) ?>" data-specialty="<?= e($service['specialty']) ?>">
                                <?= e($service['name']) ?> · <?= e($service['duration']) ?> min
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>
                    Profissional
                    <select name="doctor" id="doctor-select" required>
                        <option value="">Selecione um serviço primeiro</option>
                    </select>
                </label>
            </div>
        </fieldset>

        <fieldset>
            <legend>2. Data e horário</legend>
            <div class="calendar-toolbar">
                <button type="button" class="btn btn-secondary" id="prev-days">← Voltar</button>
                <span id="calendar-label">Próximos dias</span>
                <button type="button" class="btn btn-secondary" id="next-days">Avançar →</button>
            </div>
            <div class="date-grid" id="date-grid" aria-label="Escolha uma data"></div>
            <div class="time-grid" id="time-grid" aria-label="Escolha um horário"></div>
        </fieldset>

        <fieldset>
            <legend>3. Dados do paciente</legend>
            <div class="form-grid two-cols">
                <label>
                    Nome completo
                    <input type="text" name="patientName" id="patient-name" minlength="3" placeholder="Ex.: Ana Souza" required>
                </label>
                <label>
                    Telefone
                    <input type="tel" name="phone" id="phone" placeholder="(11) 99999-9999" required>
                </label>
                <label>
                    E-mail
                    <input type="email" name="email" id="email" placeholder="nome@email.com" required>
                </label>
                <label>
                    Observação opcional
                    <input type="text" name="notes" id="notes" maxlength="120" placeholder="Ex.: prefiro contato por WhatsApp">
                </label>
            </div>
            <label class="check-line">
                <input type="checkbox" id="privacy-consent" required>
                <span>Autorizo o uso dos meus dados para finalidade de agendamento e contato da clínica.</span>
            </label>
        </fieldset>

        <div class="form-feedback" id="form-feedback" role="alert"></div>
        <button type="submit" class="btn btn-primary btn-wide">Confirmar agendamento</button>
    </form>
</section>

<script type="application/json" id="bellevie-data">
<?= json_encode([
    'services' => $services,
    'doctors' => $doctors,
    'timeSlots' => $timeSlots,
    'specialties' => $specialties,
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>
<script src="assets/js/booking.js"></script>
<?php include __DIR__ . '/includes/footer.php'; ?>
