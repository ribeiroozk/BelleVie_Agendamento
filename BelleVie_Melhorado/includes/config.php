<?php
/**
 * BelleVie - Protótipo acadêmico de agendamento médico
 * Dados abaixo são fictícios e usados apenas para demonstração.
 */

declare(strict_types=1);

function e(string|int|float|null $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$clinic = [
    'name' => 'BelleVie',
    'segment' => 'Ginecologia e Saúde da Mulher',
    'tagline' => 'Cuidado acolhedor, agendamento simples e acompanhamento organizado.',
    'phone' => '(11) 98642-4549',
    'email' => 'recepcao.bellevie@example.com',
    'address' => 'Shopping Anália Franco, Av. Regente Feijó, 1739 - Tatuapé, São Paulo - SP',
    'hours' => 'Segunda a sexta, das 8h às 18h; sábado, das 8h às 12h',
];

$specialties = [
    'ginecologia' => 'Ginecologia',
    'obstetricia' => 'Obstetrícia',
    'exames' => 'Exames e Procedimentos',
];

$services = [
    [
        'id' => 'consulta-ginecologica',
        'name' => 'Consulta ginecológica',
        'type' => 'Consulta',
        'specialty' => 'ginecologia',
        'duration' => 45,
        'description' => 'Avaliação clínica, orientação preventiva e encaminhamentos quando necessário.',
    ],
    [
        'id' => 'pre-natal',
        'name' => 'Pré-natal',
        'type' => 'Consulta',
        'specialty' => 'obstetricia',
        'duration' => 50,
        'description' => 'Acompanhamento gestacional com histórico, rotina de exames e orientações.',
    ],
    [
        'id' => 'ultrassom',
        'name' => 'Ultrassonografia pélvica/transvaginal',
        'type' => 'Exame',
        'specialty' => 'exames',
        'duration' => 35,
        'description' => 'Exame de imagem com preparo informado pela recepção após o agendamento.',
    ],
    [
        'id' => 'diu',
        'name' => 'Avaliação para DIU/implante',
        'type' => 'Procedimento',
        'specialty' => 'ginecologia',
        'duration' => 40,
        'description' => 'Consulta de orientação e avaliação de indicação para métodos contraceptivos.',
    ],
];

$doctors = [
    [
        'id' => 'beatriz-cardoso',
        'name' => 'Dra. Beatriz Cardoso',
        'role' => 'Ginecologista e obstetra',
        'crm' => 'CRM-SP 123456',
        'specialties' => ['ginecologia', 'obstetricia'],
        'days' => ['segunda', 'terca', 'quarta', 'sexta'],
    ],
    [
        'id' => 'jessica-amaral',
        'name' => 'Dra. Jéssica Amaral',
        'role' => 'Ginecologia preventiva e exames',
        'crm' => 'CRM-SP 654321',
        'specialties' => ['ginecologia', 'exames'],
        'days' => ['terca', 'quinta', 'sexta', 'sabado'],
    ],
    [
        'id' => 'marina-alves',
        'name' => 'Dra. Marina Alves',
        'role' => 'Obstetrícia e medicina fetal',
        'crm' => 'CRM-SP 789012',
        'specialties' => ['obstetricia', 'exames'],
        'days' => ['segunda', 'quarta', 'quinta'],
    ],
];

$timeSlots = ['08:00', '09:00', '10:00', '11:00', '13:30', '14:30', '15:30', '16:30'];
