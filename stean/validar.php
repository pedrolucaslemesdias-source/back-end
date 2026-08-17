<?php
session_start();
 if($_SERVER["REQUEST_METHOD"]=="POST"){
   $nome_usuario = $_POST["nome/usuario"];
   $senha = $_POST["senha"];
   if($nome_usuario == "pedro" && $senha == "123456"){
      header("Location: home.php");
   }
   else{
    echo "404";
    echo  '<a href="loguin.php">Tentar outra vez.</a>';
   }
 }
?>