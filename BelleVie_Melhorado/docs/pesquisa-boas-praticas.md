# Pesquisa — O que um sistema de agendamento médico deve ter

## 1. Funcionalidades essenciais

Um sistema de agendamento médico deve equilibrar experiência do paciente, organização da recepção e segurança das informações. Para o projeto BelleVie, o mínimo recomendado é:

- Catálogo de serviços/consultas/exames.
- Cadastro de profissionais e especialidades.
- Agenda por profissional.
- Bloqueio de horários ocupados.
- Confirmação, cancelamento e remarcação.
- Área do paciente.
- Área administrativa para recepção.
- Política de privacidade.
- Consentimento para uso de dados.
- Registro de logs para ações críticas.

## 2. Privacidade e LGPD

Como o sistema lida com dados de saúde, ele pode envolver dados pessoais sensíveis. A LGPD exige cuidado com finalidade, necessidade, segurança e direitos do titular. Por isso, o sistema deve coletar apenas o necessário para o agendamento e informar claramente a finalidade do uso dos dados.

Fonte consultada: Portal Gov.br sobre LGPD — https://www.gov.br/saude/pt-br/acesso-a-informacao/lgpd

## 3. Agenda e prazos de atendimento

A ANS define prazos máximos para atendimentos em planos de saúde, como consulta básica em ginecologia e obstetrícia em até 7 dias úteis e demais especialidades em até 14 dias úteis. Mesmo quando o projeto é acadêmico, essas referências ajudam a pensar em disponibilidade, fila de espera e organização da agenda.

Fonte consultada: ANS — Prazos máximos de atendimento — https://www.gov.br/ans/pt-br/assuntos/consumidor/prazos-maximos-de-atendimento

## 4. Prontuário e registros clínicos

O projeto atual não implementa prontuário eletrônico. Caso evolua para prontuário, é preciso seguir normas específicas, controle de acesso, guarda adequada e padrões de segurança. O CFM possui normas e resoluções sobre prontuário eletrônico e preservação de registros.

Fonte consultada: CFM — Resolução 1.821/2007 — https://sistemas.cfm.org.br/normas/arquivos/resolucoes/BR/2007/1821_2007.pdf

## 5. Telemedicina

Caso o sistema evolua para teleconsulta, a Resolução CFM 2.314/2022 estabelece regras para telemedicina, incluindo necessidade de consentimento explícito e registro do atendimento. Isso não foi implementado nesta versão por estar fora do escopo.

Fonte consultada: CFM — Resolução 2.314/2022 — https://sistemas.cfm.org.br/normas/arquivos/resolucoes/BR/2022/2314_2022.pdf

## 6. Recomendações para evolução

- Criar autenticação segura com sessões PHP.
- Usar MySQL com PDO e prepared statements.
- Criar painel da recepção com filtros e confirmação de agenda.
- Criar painel administrativo para cadastro de médicos, serviços e horários.
- Criar logs de auditoria.
- Evitar armazenar informações clínicas detalhadas no agendamento.
- Criar rotina de backup e política de retenção.
- Separar agendamento de prontuário eletrônico.
