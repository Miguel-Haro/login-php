# Login PHP

Sistema de autenticação desenvolvido com **PHP e MySQL**, contendo cadastro de usuários, login, validação de credenciais e gerenciamento de sessões.

## Preview

Sistema de login e cadastro com interface responsiva, mensagens de sucesso e erro e alternância entre os formulários.

## Funcionalidades

- Cadastro de usuários
- Login com e-mail e senha
- Validação de e-mail já cadastrado
- Criptografia de senhas com `password_hash()`
- Verificação de senha com `password_verify()`
- Sistema de sessões com PHP
- Mensagens de sucesso e erro
- Alternância entre Login e Cadastro
- Integração com MySQL
- Interface responsiva

## Tecnologias

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- Boxicons

## Estrutura do projeto

```text
login-php/
├── login.php
├── auth_process.php
├── config.php
├── login.css
├── login.js
└── README.md
```

### `login.php`

Página principal do sistema, contendo os formulários de login e cadastro.

### `auth_process.php`

Responsável pelo processamento do cadastro e login dos usuários, incluindo validação de credenciais e gerenciamento das sessões.

### `config.php`

Responsável pela conexão do PHP com o banco de dados MySQL.

### `login.css`

Contém os estilos da interface de autenticação.

### `login.js`

Responsável pela interação entre os formulários de login e cadastro.

## Banco de dados

O projeto utiliza um banco de dados MySQL chamado `usuario`.

A tabela principal utilizada pelo sistema é:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

## Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/SEU-USUARIO/login-php.git
```

### 2. Coloque o projeto no XAMPP

Mova a pasta para:

```text
C:\Users\Miguel\Desktop\Xampp\htdocs\
```

A estrutura deverá ficar:

```text
htdocs/
└── login-php/
    ├── login.php
    ├── auth_process.php
    ├── config.php
    ├── login.css
    └── login.js
```

### 3. Inicie o XAMPP

Inicie:

- Apache
- MySQL

### 4. Configure o banco de dados

Crie o banco:

```sql
CREATE DATABASE usuario;
```

Depois:

```sql
USE usuario;
```

E crie a tabela:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

### 5. Configure a conexão

No `config.php`, configure os dados do seu MySQL:

```php
<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'usuario';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die('Falha na conexão: ' . $conn->connect_error);
}
```

### 6. Execute o projeto

Abra no navegador:

```text
http://localhost/login-php/login.php
```

## Fluxo de autenticação

```text
Cadastro
   ↓
Validação do e-mail
   ↓
password_hash()
   ↓
MySQL
   ↓
Login
   ↓
Busca do usuário
   ↓
password_verify()
   ↓
Sessão PHP
   ↓
Login realizado
```

## Segurança

As senhas dos usuários não são armazenadas em texto puro. O projeto utiliza:

```php
password_hash()
```

para criar o hash da senha e:

```php
password_verify()
```

para verificar a senha durante o login.

> Para uma versão de produção, ainda é recomendado utilizar prepared statements para as consultas SQL e armazenar credenciais de banco em variáveis de ambiente.

## Status

Projeto desenvolvido para estudos de **PHP, MySQL e autenticação de usuários**.

## Autor

**Miguel Cano de Haro**

Desenvolvedor Full Stack em aprendizado.
