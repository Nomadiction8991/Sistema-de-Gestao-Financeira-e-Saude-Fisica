<?php
session_start();

// Destroi todas as variáveis de sessão
session_unset();
session_destroy();

// Redireciona para a página principal
header("Location: ../index.php");
exit();
?>
