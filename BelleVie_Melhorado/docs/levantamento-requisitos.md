# Levantamento de Requisitos — BelleVie

## 1. Objetivo do sistema

Desenvolver um sistema web de agendamento médico para uma clínica de ginecologia e obstetrícia, permitindo que pacientes visualizem serviços, escolham profissionais, selecionem datas e horários disponíveis e acompanhem seus agendamentos por uma área do paciente.

## 2. Perfis de usuário

- **Paciente:** consulta serviços, agenda atendimento, visualiza e cancela agendamentos.
- **Recepção:** confirma, remarca, cancela e acompanha agenda diária.
- **Médico(a):** consulta agenda, histórico básico de atendimentos e observações necessárias.
- **Administrador:** gerencia serviços, profissionais, horários, usuários e regras da clínica.

## 3. Requisitos funcionais

| ID | Requisito | Prioridade |
|---|---|---|
| RF-001 | O sistema deve exibir página inicial com informações da clínica, especialidades, equipe e contato. | Alta |
| RF-002 | O sistema deve permitir seleção de serviço/consulta/exame antes da escolha de profissional. | Alta |
| RF-003 | O sistema deve listar somente profissionais compatíveis com o serviço escolhido. | Alta |
| RF-004 | O sistema deve apresentar datas e horários disponíveis conforme a agenda da profissional. | Alta |
| RF-005 | O sistema deve bloquear horários já ocupados. | Alta |
| RF-006 | O sistema deve validar dados obrigatórios do paciente antes da confirmação. | Alta |
| RF-007 | O sistema deve exigir consentimento de uso de dados para finalidade de agendamento. | Alta |
| RF-008 | O sistema deve salvar o agendamento e exibir confirmação ao paciente. | Alta |
| RF-009 | O paciente deve visualizar seus agendamentos em uma área própria. | Alta |
| RF-010 | O paciente deve poder cancelar um agendamento dentro das regras da clínica. | Média |
| RF-011 | A recepção deve poder consultar agenda por data, profissional e status. | Média |
| RF-012 | O administrador deve poder cadastrar serviços, profissionais, horários e bloqueios. | Média |
| RF-013 | O sistema deve registrar alterações importantes em log de auditoria. | Alta para produção |
| RF-014 | O sistema deve possuir política de privacidade acessível. | Alta |
| RF-015 | O sistema deve gerar base para integração futura com e-mail, WhatsApp ou SMS. | Baixa |

## 4. Requisitos não funcionais

| ID | Requisito | Critério |
|---|---|---|
| RNF-001 | Responsividade | Deve funcionar em celular, tablet e desktop. |
| RNF-002 | Usabilidade | O agendamento deve ser concluído em poucas etapas e com linguagem clara. |
| RNF-003 | Segurança | Em produção, usar autenticação, sessões seguras, PDO, senhas com hash e validação server-side. |
| RNF-004 | Privacidade | Coletar somente dados necessários e exibir consentimento. |
| RNF-005 | Disponibilidade | A agenda deve evitar conflitos e registrar status do agendamento. |
| RNF-006 | Manutenibilidade | Separar componentes PHP, CSS, JS, documentação e SQL. |
| RNF-007 | Acessibilidade | Usar contraste adequado, foco visível, labels e navegação responsiva. |
| RNF-008 | Performance | Evitar bibliotecas desnecessárias e carregar apenas arquivos essenciais. |

## 5. Escopo da versão atual

A versão entregue é um protótipo funcional em PHP/CSS/JS, com persistência local via JavaScript. Ela demonstra o fluxo do sistema, mas ainda não substitui um sistema real de prontuário, gestão clínica ou marcação oficial.

## 6. Fora do escopo da versão atual

- Prontuário eletrônico completo.
- Prescrição médica digital.
- Pagamentos online.
- Integração real com WhatsApp, SMS ou e-mail.
- Autenticação real e permissões em banco.
- Confirmação de agenda por equipe da clínica.
