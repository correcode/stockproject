
# StockProject

Sistema de controle de estoque desenvolvido em PHP, utilizando MySQL para o gerenciamento de dados.

## 📋 Descrição

O StockProject é uma aplicação web que permite o gerenciamento de produtos em estoque, incluindo funcionalidades como cadastro, edição, exclusão de produtos e controle de movimentações de entrada e saída.

## 🛠️ Tecnologias Utilizadas

- **PHP**: Linguagem principal para o desenvolvimento do backend.
- **MySQL**: Banco de dados relacional para armazenamento das informações.
- **HTML/CSS**: Para a estrutura e estilização das páginas.
- **PDO (PHP Data Objects)**: Utilizado para a conexão segura com o banco de dados.

## 📁 Estrutura do Projeto

```
stockproject/
├── add_produto.php
├── config.php
├── dashboard.php
├── delete_produto.php
├── edit_produto.php
├── estoque_db.sql
├── login.php
├── logout.php
├── movimentacao.php
├── movimentacoes.php
├── produtos.php
├── register.php
```

- `add_produto.php`: Página para adicionar novos produtos ao estoque.
- `config.php`: Arquivo de configuração para conexão com o banco de dados.
- `dashboard.php`: Painel principal após o login, com visão geral do sistema.
- `delete_produto.php`: Script para exclusão de produtos.
- `edit_produto.php`: Página para edição de informações dos produtos.
- `estoque_db.sql`: Script SQL para criação do banco de dados.
- `login.php`: Página de login que valida o usuário e inicia a sessão.
- `logout.php`: Script para encerrar a sessão do usuário.
- `movimentacao.php`: Página para registrar movimentações de entrada e saída de produtos.
- `movimentacoes.php`: Página que lista todas as movimentações registradas.
- `produtos.php`: Página que lista todos os produtos cadastrados.
- `register.php`: Página para registro de novos usuários.

## 🚀 Como Executar

1. Clone o repositório:

```bash
git clone https://github.com/correcode/stockproject.git
```

2. Importe o arquivo `estoque_db.sql` em seu servidor MySQL para criar o banco de dados necessário.

3. Configure o arquivo `config.php` com as credenciais do seu banco de dados:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'nome_do_banco');
define('DB_USER', 'usuario');
define('DB_PASS', 'senha');
```

4. Coloque os arquivos do projeto em seu servidor web (por exemplo, Apache) e acesse `login.php` para iniciar o sistema.

## 🔐 Segurança

- As senhas dos usuários são criptografadas utilizando MD5. Para maior segurança, é recomendável utilizar `password_hash` e `password_verify` do PHP.
- As sessões são utilizadas para manter o estado de autenticação do usuário.

## 👨‍💻 Autor

- GitHub: [correcode](https://github.com/correcode)

---

Este sistema é uma solução prática para o gerenciamento de estoque, facilitando o controle de produtos e suas movimentações.
