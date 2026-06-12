# Regras de Negócio — BelleVie

| ID | Regra de negócio |
|---|---|
| RB-001 | Um agendamento deve estar vinculado a um paciente, serviço, profissional, data e horário. |
| RB-002 | O paciente só pode confirmar o agendamento após preencher os dados obrigatórios. |
| RB-003 | O paciente deve aceitar o uso de dados para a finalidade de agendamento antes de confirmar. |
| RB-004 | Um horário não pode ser ocupado por dois agendamentos ativos da mesma profissional. |
| RB-005 | Horários cancelados deixam de bloquear a agenda. |
| RB-006 | O sistema deve listar apenas profissionais habilitadas para a especialidade do serviço escolhido. |
| RB-007 | O sistema não deve permitir seleção de data fora dos dias de atendimento da profissional. |
| RB-008 | A agenda deve considerar dias e horários cadastrados para cada profissional. |
| RB-009 | O status inicial de um agendamento confirmado pelo paciente deve ser `Confirmado` ou `Pendente de confirmação`, conforme regra da clínica. |
| RB-010 | Um agendamento cancelado deve manter histórico de cancelamento para auditoria. |
| RB-011 | A recepção deve poder filtrar agendamentos por data, profissional e status. |
| RB-012 | O administrador deve poder bloquear períodos de férias, feriados, manutenção ou indisponibilidade médica. |
| RB-013 | Alterações em agenda, cancelamento e dados sensíveis devem ser registradas em log. |
| RB-014 | O sistema deve evitar coleta desnecessária de dados sensíveis no primeiro contato. |
| RB-015 | Observações do paciente devem ser opcionais e limitadas em tamanho. |
| RB-016 | Em caso de urgência ou emergência, o sistema deve orientar o paciente a procurar atendimento imediato, não agendamento comum. |
| RB-017 | Dados de profissionais, como CRM e especialidade, devem ser administrados por perfil autorizado. |
| RB-018 | O paciente deve visualizar apenas seus próprios agendamentos quando houver login real. |
| RB-019 | Usuários internos devem possuir perfis de acesso diferentes: recepção, médico e administrador. |
| RB-020 | Em produção, toda validação feita no front-end deve ser repetida no back-end. |

## Status sugeridos para agendamento

- `Pendente de confirmação`
- `Confirmado`
- `Remarcado`
- `Cancelado pelo paciente`
- `Cancelado pela clínica`
- `Realizado`
- `Não compareceu`

## Regra de conflito de agenda

Um novo agendamento só pode ser criado se não existir outro agendamento ativo para a mesma profissional, na mesma data e horário. Status cancelados não bloqueiam o horário.
