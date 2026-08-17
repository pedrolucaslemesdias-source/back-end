<?php
session_start();
if(!isset($_SESSION["nome/usuario"])){
    header("Location:loguin.php");
}
?>