# FormFlow

Sistema Laravel para gerenciamento de inspeções e equipamentos, com funcionalidades de filtro, exportação para Excel e interface moderna utilizando Blade e Vite.

---

## Índice

- [Descrição](#descrição)
- [Funcionalidades](#funcionalidades)
- [Tecnologias](#tecnologias)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Uso](#uso)
- [Exportação Excel](#exportação-excel)
- [Filtros](#filtros)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Contribuição](#contribuição)
- [Licença](#licença)

---

## Descrição

FormFlow é um sistema desenvolvido em Laravel para gerenciar inspeções de equipamentos técnicos, exibindo informações detalhadas, permitindo buscas e filtragens dinâmicas, além da exportação dos dados para planilhas Excel para facilitar análises externas.

---

## Funcionalidades

- Listagem paginada e filtragem dinâmica de inspeções e equipamentos.
- Busca por nome ou status do equipamento.
- Exportação dos equipamentos para arquivos Excel (.xlsx).
- Visualização detalhada das inspeções com itens, datas, status e observações.
- Layout responsivo com componentes Blade personalizados.
- Uso de Laravel Vite para otimização e hot reload do frontend.
- Controle de acesso e autenticação para ações restritas (edição, exclusão).
- Sistema de recuperação de equipamentos excluídos (soft deletes).

---

## Tecnologias

- PHP 8.x
- Laravel 10.x
- Blade Templates
- Laravel Excel (Maatwebsite)
- Vite + Laravel Vite Plugin
- Tailwind CSS / Bootstrap (dependendo do seu uso)
- MySQL / SQLite (configurável via .env)
- Composer
- NPM

---

## Instalação

1. Clone o repositório:

```bash
git clone https://github.com/EstevaoA98/FormFlow.git
cd FormFlow
