<?php
// Sempre inicia a sessão aqui
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/utils.php';

// Se não tiver usuário logado, manda pro login
if (empty($_SESSION['usuario'])) {
    flash_set('info', 'Por favor, faça login para acessar essa página.');
    header('Location: /minha_loja/index.php');
    exit;
}

// Verifica se a página requer perfil específico
if (isset($required_perfil) && is_string($required_perfil)) {
    if (empty($_SESSION['perfil']) || $_SESSION['perfil'] !== $required_perfil) {
        header('Location: /minha_loja/views/sem_permissao.php');
        exit;
    }
}
