<?php
include_once('../conexao.php');
if (isset($_GET['descricao'])) {
    $descricao = urldecode($_GET['descricao']);

    $sql="UPDATE compras SET concluido=0 WHERE descricao=:descricao";

$stmt = $conexao->prepare($sql);

        // Verifica se a preparação da consulta foi bem-sucedida
        if ($stmt) {
            // Bind dos parâmetros
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);

            // Execução da consulta
            $stmt->execute();

            // Redirecionamento após a atualização bem-sucedida
            header('location: index.php');
            exit();  // Certifique-se de sair após redirecionar
        } else {
            throw new Exception('Erro ao preparar a consulta.');
        }
    } else {
        throw new Exception('Descrição não fornecida via POST.');
    }

?>