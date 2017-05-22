<?
if ( (! $_SESSION['CD_CAT_USUARIO']) or (trim($_SESSION["CD_CAT_USUARIO"]) == "") ){	
        RedirecionaRapido("index.php");
	exit();
}
else{
	$CD_CAT_USUARIO = $_SESSION['CD_CAT_USUARIO'];
	$CD_FUNC = $_SESSION['CD_FUNC'];
}
?>