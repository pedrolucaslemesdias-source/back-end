<?php
session_start();
if (!isset($_SESSION["usuario"])){
    header("nova_conta.php");
    
    exit;
}
?>