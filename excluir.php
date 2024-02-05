<?php
include_once('../conexao.php');

try {
    // Verifica se a descrição foi enviada via POST
if (isset($_GET['descricao'])) {
    $descricao = urldecode($_GET['descricao']);

        // Consulta SQL de exclusão
        $sql = "DELETE FROM compras WHERE descricao=:descricao";

        // Preparação da consulta
        $stmt = $conexao->prepare($sql);

        // Verifica se a preparação da consulta foi bem-sucedida
        if ($stmt) {
            // Bind dos parâmetros
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);

            // Execução da consulta
            $stmt->execute();

            // Redirecionamento após a exclusão bem-sucedida
            header('location: index.php');
            exit();  // Certifique-se de sair após redirecionar
        } else {
            throw new Exception('Erro ao preparar a consulta.');
        }
    } else {
        throw new Exception('Descrição não fornecida via POST.');
    }
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
