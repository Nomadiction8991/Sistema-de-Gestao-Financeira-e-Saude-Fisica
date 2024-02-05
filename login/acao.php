<?php
session_start();
require_once("../conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_md5= md5($senha);

    // Consulta SQL para verificar se o email e senha correspondem a um usuário no banco de dados
    $consulta = $conexao->prepare("SELECT * FROM usuarios WHERE email=? AND senha=?");
    $consulta->execute([$email, $senha_md5]);

    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Se o usuário existe, inicia a sessão e redireciona para o painel
        $_SESSION["usuario_id"]=$usuario["id"];
        header("Location: ../index.php");
        exit();
    } else {
        // Se a autenticação falhar, redireciona para a página de login com uma mensagem de erro
        header("Location: index.php");
        exit();
    }
}
?>
