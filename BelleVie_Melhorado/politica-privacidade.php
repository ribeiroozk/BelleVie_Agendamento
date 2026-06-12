<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Política de Privacidade';
$activePage = 'privacidade';
include __DIR__ . '/includes/header.php';
?>

<section class="page-hero compact">
    <span class="eyebrow">Privacidade</span>
    <h1>Como o protótipo trata dados do paciente</h1>
    <p>Esta página é um modelo acadêmico. Em um sistema real, a clínica deve revisar o texto com responsável jurídico e encarregado de dados.</p>
</section>

<section class="content-page">
    <article class="legal-card">
        <h2>Finalidade</h2>
        <p>Os dados informados no formulário são usados para simular o agendamento, identificar o paciente e permitir contato da recepção.</p>
        <h2>Dados coletados</h2>
        <p>Nome, telefone, e-mail, serviço escolhido, profissional, data, horário e observação opcional.</p>
        <h2>Armazenamento no protótipo</h2>
        <p>Os agendamentos ficam salvos no navegador pelo recurso <code>localStorage</code>. Eles não são enviados para um servidor nesta versão.</p>
        <h2>Versão de produção</h2>
        <p>Em produção, recomenda-se autenticação, controle de acesso, criptografia, logs de auditoria, banco de dados MySQL e exclusão/anonimização conforme política da clínica.</p>
    </article>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
