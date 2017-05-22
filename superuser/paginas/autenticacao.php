<?
if ($_SESSION['CD_CAT_USUARIO'] != 4){
	RedirecionaRapido("?pg=24");
	exit();
}
else {
	$CD_CAT_USUARIO = $_SESSION['CD_CAT_USUARIO'];
	$logado = "online";
}

?>