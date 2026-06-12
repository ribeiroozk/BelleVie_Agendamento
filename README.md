# BelleVie — Agendamento Médico

Protótipo acadêmico de um sistema de agendamento médico para clínica de ginecologia e obstetrícia, desenvolvido com **PHP, CSS e JavaScript puro**.

## O que foi melhorado

- Estrutura do projeto reorganizada em `includes`, `assets`, `docs` e `database`.
- Remoção da duplicidade de HTML nos componentes `header.php` e `footer.php`.
- Layout redesenhado com aparência mais profissional, responsiva e acessível.
- Página inicial com proposta de valor, especialidades, equipe e fluxo do sistema.
- Formulário de agendamento funcional no navegador com validação, escolha de serviço, profissional, data e horário.
- Área do paciente com listagem, filtro e cancelamento de agendamentos de teste.
- Documentação com levantamento de requisitos, regras de negócio, pesquisa e modelagem de banco.
- SQL opcional para futura evolução com MySQL.

## Como rodar no XAMPP

1. Copie a pasta `BelleVie_Melhorado` para:
   - Windows: `C:\xampp\htdocs\BelleVie_Melhorado`
2. Abra o XAMPP e inicie o **Apache**.
3. Acesse no navegador:
   - `http://localhost/BelleVie_Melhorado/`

## Observação importante

Nesta versão, os agendamentos são salvos no navegador usando `localStorage`, pois o projeto original não possuía banco de dados nem back-end de persistência. Para uma versão real, use o arquivo `database/schema.sql` como base e implemente autenticação, permissões, conexão PDO e operações CRUD no MySQL.

## Estrutura

```txt
BelleVie_Melhorado/
├── assets/
│   ├── css/style.css
│   ├── js/app.js
│   ├── js/booking.js
│   └── js/dashboard.js
├── database/schema.sql
├── docs/
│   ├── levantamento-requisitos.md
│   ├── regras-negocio.md
│   ├── pesquisa-boas-praticas.md
│   └── modelagem-banco.md
├── includes/
│   ├── config.php
│   ├── header.php
│   └── footer.php
├── index.php
├── agendamento.php
├── dashboard.php
└── politica-privacidade.php
```

## Próximos passos recomendados

1. Criar login real de paciente, recepção, médico e administrador.
2. Substituir `localStorage` por MySQL usando PDO.
3. Criar telas administrativas para cadastro de médicos, serviços, horários e bloqueios de agenda.
4. Implementar confirmação por e-mail/WhatsApp apenas com consentimento e logs.
5. Criar auditoria de acesso e política de retenção de dados.