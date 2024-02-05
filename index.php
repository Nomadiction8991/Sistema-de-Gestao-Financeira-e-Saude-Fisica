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
    <title>Anvy</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <header class="cabecalho">
        <img id="usuario" src="imagens/menu_usuario.png">
        <section class="logomarca">
            <img src="imagens/logomarca.png">
        </section>
    </header>
    <section id="menu_usuario">
        <h3>Weverton</h3>
        <h5>Weverton.anvy@gmail.com</h5>
        <ul class="menu">
            <li><img class="usuario_img" src="imagens/usuario.png"><a href="#" target="iframe">Meu Cadastro</a></li>
            <hr>
            <li><img class="logout_img" src="imagens/logout.png"><a href="encerrar_sessao/index.php">Encerrar Sessão</a></li>
        </ul>
    </section>
    <iframe name="iframe"></iframe>
    
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggleBtn = document.getElementById('usuario');
    var menu = document.getElementById('menu_usuario');

    toggleBtn.addEventListener('click', function() {
        menu.classList.toggle('active');
    });

    var menuItems = document.querySelectorAll('#menu_usuario ul li a');

    menuItems.forEach(function(item) {
        item.addEventListener('click', function() {
            menu.classList.remove('active');
        });
    });
});

</script>
</body>
</html>
