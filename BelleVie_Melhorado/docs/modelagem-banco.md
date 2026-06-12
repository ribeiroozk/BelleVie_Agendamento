# Modelagem de Banco — Versão futura com MySQL

O projeto entregue usa `localStorage` para simulação. Em produção, recomenda-se usar MySQL com PDO.

## Entidades principais

- `users`: usuários do sistema, incluindo pacientes e equipe interna.
- `patients`: dados básicos do paciente.
- `doctors`: profissionais de saúde.
- `specialties`: especialidades.
- `services`: consultas, exames e procedimentos.
- `doctor_services`: relação entre profissionais e serviços.
- `doctor_availability`: dias e horários de atendimento.
- `schedule_blocks`: bloqueios de agenda.
- `appointments`: agendamentos.
- `appointment_status_history`: histórico de status.
- `consent_terms`: termos aceitos pelo paciente.
- `audit_logs`: auditoria de ações importantes.

## Relacionamentos principais

- Um paciente pode ter vários agendamentos.
- Um médico pode atender vários serviços.
- Um serviço pertence a uma especialidade.
- Um agendamento pertence a um paciente, médico e serviço.
- Um agendamento pode ter vários registros de histórico de status.
- Um usuário interno pode gerar vários logs de auditoria.

## Observações

- Não armazene senha em texto puro; use `password_hash` e `password_verify`.
- Use `created_at`, `updated_at` e, quando necessário, `deleted_at`.
- Use índices para data, médico e status do agendamento.
- Use validações no back-end mesmo que o front-end já valide.
