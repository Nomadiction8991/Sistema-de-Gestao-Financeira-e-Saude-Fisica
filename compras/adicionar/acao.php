<?php
include_once('../../conexao.php');

try {
    // Verifica se a descrição foi enviada via POST
    if(isset($_POST['descricao'])) {
        // Dados do novo usuário
        $descricao = $_POST['descricao'];

        // Consulta SQL de inserção
        $sql = "INSERT INTO compras (descricao, concluido) VALUES (:descricao, :concluido)";

        // Preparação da consulta
        $stmt = $conexao->prepare($sql);

        // Verifica se a preparação da consulta foi bem-sucedida
        if ($stmt) {
            // Bind dos parâmetros
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindValue(':concluido', 0, PDO::PARAM_BOOL); // ou 1 se estiver concluído

            // Execução da consulta
            $stmt->execute();

            // Redirecionamento após a inserção bem-sucedida
            header('location: ../index.php');
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
