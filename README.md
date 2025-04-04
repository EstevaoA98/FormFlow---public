# Form Flow – Sistema de Formulários de Inspeção

O **Form Flow** é um sistema web desenvolvido em Laravel para facilitar o processo de inspeção de motores. Antes, esse processo era realizado manualmente, utilizando formulários em papel, o que dificultava a organização e rastreabilidade das informações. 

Com o **Form Flow**, é possível:
- Acompanhar prazos de inspeção
- Reduzir falhas no controle de qualidade
- Manter um histórico digital seguro e automatizado

## Tecnologias utilizadas
- **Laravel (PHP)**
- **Laravel Breeze** (autenticação)
- **MySQL**
- **Bootstrap**

## Funcionalidades principais
- Autenticação com controle de acesso (via Laravel Breeze)
- Cadastro de equipamentos com laudos técnicos e datas de vencimento
- Datas com cores dinâmicas para facilitar a visualização:
  - **Vermelho**: vencido
  - **Laranja**: a vencer
  - **Preto**: dentro do prazo
- Filtros: "A vencer", "Vencidos" e "Todos"
- Edição restrita a usuários autenticados
- Equipamentos vinculados a formulários não podem ser excluídos (são ocultados)
- Criação e edição de formulários com registro de autor e data de alteração

## Melhorias futuras
- Permissões por cargo (administrador, inspetor, operador)
- Notificações de vencimento por e-mail
- Geração de relatórios em PDF/Excel

O **Form Flow** está em constante aprimoramento para tornar o processo de inspeção mais eficiente, confiável e organizado.

🔗 **Projeto disponível no GitHub – open source:**
https://lnkd.in/dhwjfc87

---

# Configuração do Form Flow

## Requisitos
Antes de começar, certifique-se de ter os seguintes requisitos instalados em sua máquina:
- **PHP 8+**
- **Composer**
- **MySQL**
- **Node.js e npm** (para compilar os assets do frontend)
- **Laravel instalado globalmente** (opcional)

## Passos para instalação

### 1. Clonar o repositório
Abra o terminal e execute:
```sh
git clone https://github.com/EstevaoA98/FormFlow---public
cd formflow
```

### 2. Instalar dependências do Laravel
```sh
composer install
```

### 3. Criar e configurar o arquivo `.env`
```sh
cp .env.example .env
```
Abra o arquivo `.env` e edite os detalhes do banco de dados:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=formflow
DB_USERNAME=root
DB_PASSWORD=seu_password
```

### 4. Gerar a chave da aplicação
```sh
php artisan key:generate
```

### 5. Criar as tabelas no banco de dados
```sh
php artisan migrate
```

### 6. Instalar e configurar o Laravel Breeze (autenticação)
```sh
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

### 7. Iniciar o servidor local
```sh
php artisan serve
```
O sistema estará acessível no navegador em: `http://127.0.0.1:8000`

## Comandos úteis
- Criar um novo usuário administrador (via Laravel Tinker):
```sh
php artisan tinker
```
```php
User::create(['name' => 'Admin', 'email' => 'admin@email.com', 'password' => bcrypt('senha123')]);
```
- Resetar o banco de dados e popular com dados iniciais:
```sh
php artisan migrate:fresh --seed
```

---

Agora o **Form Flow** está pronto para uso! 🚀
