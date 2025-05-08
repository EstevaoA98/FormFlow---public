# 📌 Form Flow

Sistema de formulários de inspeção para motores, desenvolvido em **Laravel**.

## 🚀 Instalação e Configuração

### **Pré-requisitos**
Antes de iniciar, certifique-se de ter instalado:
- [PHP](https://www.php.net/downloads.php) (>= 8.1)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) e [npm](https://www.npmjs.com/)
- [MySQL](https://www.mysql.com/) ou outro banco de dados compatível
- [Laravel](https://laravel.com/)

### **1️⃣ Clonando o repositório**
```bash
git clone https://github.com/seu-usuario/FormFlow---public
cd FormFlow---public
```

### **2️⃣ Instalando dependências**
```bash
composer install
npm install
```

### **3️⃣ Configuração do ambiente**
Crie um arquivo **.env** com base no exemplo fornecido:
```bash
cp .env.example .env
```
Agora, configure o **banco de dados** e outras variáveis no `.env`.

### **4️⃣ Gerando chave e migrando banco**
```bash
php artisan key:generate
php artisan migrate --seed
```
O comando `--seed` cria alguns dados iniciais no banco.

### **5️⃣ Iniciando o servidor**
```bash
php artisan serve
```
O projeto estará disponível em **http://127.0.0.1:8000**

## 📜 Funcionalidades
✅ Autenticação com Laravel Breeze  
✅ Gestão de equipamentos e laudos técnicos  
✅ Filtros de equipamentos: "A vencer", "Vencido" e "Todos"  
✅ Histórico de edições nos formulários  
✅ Formulários visíveis para usuários autenticados e anônimos  

## ⚙️ Comandos úteis
- Rodar as migrations:
  ```bash
  php artisan migrate
  ```
- Criar um novo usuário admin (se necessário):
  ```bash
  php artisan tinker
  ```
  ```php
  \App\Models\User::create([
      'name' => 'Admin',
      'email' => 'admin@example.com',
      'password' => bcrypt('senha123'),
      'is_admin' => true
  ]);
  ```

## 📜 Licença
Este projeto está licenciado sob a **MIT License**.
