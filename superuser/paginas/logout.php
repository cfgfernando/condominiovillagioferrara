<?
$_SESSION = array();
session_destroy();
$logado = "offline";
RedirecionaRapido("index.php");
?>