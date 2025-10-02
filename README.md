# Minha Loja

Um sistema simples de gerenciamento de uma padaria online desenvolvido em **PHP** com uso de **PDO** para conexão ao banco de dados e segue uma estrutura MVC simples, que permite:

Login e autenticação de usuários (com controle de sessão).

Cadastro, listagem e gerenciamento de produtos.

Criação e acompanhamento de pedidos e itens de pedidos.

Organização por categorias de produtos.

Uso de prepared statements para evitar SQL Injection.

# Tecnologias Utilizadas

PHP (VisualCode)

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
- MySQL/Myadmin
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

O sistema da Minha Loja segue o padrão MVC e o fluxo principal de autenticação e gerenciamento é descrito abaixo:

1. Acesso à aplicação

-O usuário abre o navegador e acessa index.php.

-A página inicial apresenta o formulário de login.

2. Processamento de login

-Ao enviar os dados, o formulário chama autentica.php.

-Validar os campos recebidos (e-mail e senha).

-Consultar o banco de dados usando PDO (pdo.php).

-Verificar a senha com password_verify($senha_digitada, $hash_bd).

-Criar a sessão do usuário com $_SESSION['usuario'].

-Regenerar o ID da sessão para aumentar a segurança (session_regenerate_id(true)).

3. Proteção das páginas internas

-Todas as páginas privadas incluem verifica_sessao.php.

-Este arquivo verifica se a sessão existe e é válida, evitando acesso não autorizado.

-Caso o usuário não esteja autenticado, ele é redirecionado para a página de login.

4. Área autenticada / Dashboard

-Usuários autenticados acessam o Dashboard, com funcionalidades de gerenciamento da loja:

-Cadastro de produtos: criação de novos produtos com nome, descrição, preço, estoque e categoria.

-Listagem de produtos: exibe todos os produtos cadastrados, permitindo edição e exclusão.

-Gerenciamento de categorias: criar, listar, editar e excluir categorias.

-Cada ação é realizada por um Controller que chama o Model correspondente para acessar ou modificar o banco via PDO, e retorna os dados para a View.

5. Fluxo de CRUD (Produtos, Categorias e Pedidos)

-Controller: recebe requisição (ex.: criar produto) → chama Model → Model executa query no banco → Controller retorna dados → View mostra resultado ao usuário.

-Model: lida diretamente com o banco de dados usando queries preparadas (prepare() + execute()).

-View: interface HTML/PHP que exibe os dados (listas, formulários, alertas de sucesso/erro).

6. Logout / Finalização de sessão

-Usuário pode encerrar a sessão, que chama um script de logout, destruindo $_SESSION e redirecionando para index.php.

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
