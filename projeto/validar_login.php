<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario == "pedro" && $senha == "123") {
        $_SESSION["usuario"] = $usuario; 
        
      
        header("Location: home.php");
        
     
        exit; 
    } else {
        echo "Erro na autenticação. <a href='index.php'>Tentar novamente</a>";
    }
}
?>
