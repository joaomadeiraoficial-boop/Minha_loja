<?php
// Inicia a sessão somente se ainda não estiver ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/utils.php';

// Tempo máximo de inatividade em segundos (ex: 15 minutos)
define('SESSION_TIMEOUT', 2 * 2);

// Verifica se o usuário está logado
if (empty($_SESSION['usuario'])) {
    flash_set('info', 'Por favor faça login para acessar essa página.');
    header('Location: /minha_loja/index.php');
    exit;
}

// Expiração de sessão por tempo de inatividade
if (isset($_SESSION['ultimo_acesso'])) {
    $tempo_inativo = time() - $_SESSION['ultimo_acesso'];
    if ($tempo_inativo > SESSION_TIMEOUT) {
        // Destrói a sessão e redireciona para login
        session_unset();
        session_destroy();
        flash_set('info', 'Sua sessão expirou. Faça login novamente.');
        header('Location: /minha_loja/index.php');
        exit;
    }
}
// Atualiza o último acesso
$_SESSION['ultimo_acesso'] = time();

// Verificação de perfil (se a página exigir)
if (isset($required_perfil) && is_string($required_perfil)) {
    if (empty($_SESSION['perfil']) || $_SESSION['perfil'] !== $required_perfil) {
        header('Location: /minha_loja/views/sem_permissao.php');
        exit;
    }
}
