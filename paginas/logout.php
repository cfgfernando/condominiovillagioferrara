<?
session_start();
$_SESSION = array();
session_destroy();
RedirecionaRapido("?pg=0");
?>