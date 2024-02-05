<?php
// Iniciar a sessão
session_start();

// Verificar se a variável de sessão está configurada para o usuário
if (!isset($_SESSION['usuario_id'])) {
    // Se não estiver logado, redirecione para a página de login ou exiba uma mensagem
    header("Location: login/index.php"); // Redireciona para a página de login
    exit(); // Certifique-se de que o código não continue executando após o redirecionamento
}

// Se chegou até aqui, o usuário está logado, e você pode continuar com o conteúdo da página.
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <form action="acao.php" method="POST" autocomplete="off">
        <input type="text" class="descricao" name="descricao" placeholder="Descrição" autofocus required>
        <button type="submit" class="adicionar">Adicionar</button>
    </form>
</body>
</html>
