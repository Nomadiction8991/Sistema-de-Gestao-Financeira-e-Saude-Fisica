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



include_once('../conexao.php');

// Consulta de compras pendentes
$consultaPendentes = $conexao->query("SELECT * FROM compras WHERE concluido=0");
$comprasPendentes = $consultaPendentes->fetchAll(PDO::FETCH_ASSOC);

// Consulta de compras concluídas
$consultaConcluidas = $conexao->query("SELECT * FROM compras WHERE concluido=1");
$comprasConcluidas = $consultaConcluidas->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Sua Página</title>
</head>
<body>
    <section class="cabecalho">
        <a href="adicionar/index.php"><img class="adicionar" src="../imagens/adicionar.svg"></a>
    </section>

    <section class="lista">
        <h4>Pendentes</h4>
        <?php if (isset($comprasPendentes) && count($comprasPendentes) > 0): ?>
            <ol>
                <?php foreach ($comprasPendentes as $compra): ?>
                    <li>
                    <a href="concluir.php?descricao=<?php echo urlencode($compra['descricao']); ?>">✅</a>
                    <?php echo $compra['descricao']; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        <?php else: ?>
            <p>Compras em dia.</p>
        <?php endif; ?>
    </section>

    <section class="lista_concluidos">
        <h4>Concluídos</h4>
        <?php if (isset($comprasConcluidas) && count($comprasConcluidas) > 0): ?>
            <ol>
                <?php foreach ($comprasConcluidas as $compraConcluida): ?>
                    <li>
                        <a href="excluir.php?descricao=<?php echo urlencode($compraConcluida['descricao']); ?>">❌<a>
                        <a href="desfazer.php?descricao=<?php echo urlencode($compraConcluida['descricao']); ?>">➖<a>
                        <s><?php echo $compraConcluida['descricao']; ?></s>
                    </li>
                <?php endforeach; ?>
            </ol>
        <?php else: ?>
            <p>Nenhuma compra concluída.</p>
        <?php endif; ?>
    </section>
</body>
</html>
