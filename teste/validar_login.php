
<?php
session_start();

// Correção: O colchete deve fechar logo após a string "REQUEST_METHOD"
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"] ?? '';
    $senha = $_POST["senha"] ?? '';
    $adm = "adm";
    $pdw = "123";
    
    if ($usuario === $adm && $senha === $pdw) {
        $_SESSION["usuario"] = $usuario;
        header("Location: home.php");
        exit; // Boa prática: Garante que o script pare após o redirecionamento
    } else {
        echo "Usuário ou senha inválidos.";
    }
}
?>
