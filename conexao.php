<?php
$servidor="localhost";
$usuario="id21774715_homologacao_anvy";
$senha="^5f!uKMD%F*jq6";
$banco="id21774715_homologacao_anvy";

try {
    $conexao=new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Conexão falhou: " . $e->getMessage());
}
?>
