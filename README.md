# Minha Loja

Um sistema simples de gerenciamento de uma padaria online desenvolvido em **PHP** com uso de **PDO** para conexão ao banco de dados e segue uma estrutura MVC simples, que permite:

Login e autenticação de usuários (com controle de sessão).

Cadastro, listagem e gerenciamento de produtos.

Criação e acompanhamento de pedidos e itens de pedidos.

Organização por categorias de produtos.

Uso de prepared statements para evitar SQL Injection.

# Tecnologias Utilizadas

PHP

MySQL

Apache
(XAMPP/WAMP)

Estrutura MVC (Models / Controllers / Views)

PDO (PHP Data Objects)

Visual Studio Code
---

## Requisitos

- PHP 8+
- Servidor Apache (ex: XAMPP, WAMP ou similar)
- MySQL/MariaDB
- Navegador atualizado

---

## Passos para rodar o projeto

1. Clone este repositório:
   ```bash
   git clone https://github.com/vitoriaju/Minha_loja.git
2. Copie a pasta para o diretório do servidor:
- Exemplo: C:\xampp\htdocs\

# Como criar o banco de dados

Abra o phpMyAdmin ou MySQL.

Crie um banco com o mesmo nome do projeto:
CREATE DATABASE minha_loja CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
3- Importe o arquivo SQL:
minha_loja.sql

# Usuário/Senha de teste

Usuário: admin@teste.com

Senha: 123

# Fluxo do Sistema

O usuário acessa index.php e faz login.

utentica.php (valida, cria sessão, regenera ID) 

As credenciais são verificadas no banco via PDO (pdo.php).

Senha validada com password_verify.

Se correto, cria-se uma sessão ($_SESSION['usuario']).

Arquivo verifica_sessao.php protege páginas internas, garantindo acesso apenas a usuários logados.

Usuários autenticados podem acessar o Dashboard com :

Cadastro e listagem de produtos

Gerenciamento de categorias

Criação e listagem de Produtos

# Estrutura do projeto:

Models/ → consultas SQL e lógica de dados.

Controllers/ → recebem requisições e controlam fluxo (login, CRUDs).

Views/ → páginas HTML/PHP que exibem dados.

indexphp → pagina ne login.

utils.php → funções auxiliares (formatação, redirecionamentos).

verifica_sessao.php → valida sessões.

# Segurança

Senhas salvas com password_hash e verificadas com password_verify.

Uso de prepared statements via PDO para evitar SQL Injection.

Sessões validadas em todas as páginas internas.

# Erros comuns
Quando você baixa o arquivo ZIP do GitHub, a pasta extraída vem com o nome Minha_loja-main.
O ideal é renomear a pasta, removendo o sufixo -main, deixando apenas Minha_loja.
