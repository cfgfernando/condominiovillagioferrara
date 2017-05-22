<?
if ( (! $_SESSION['CD_CAT_USUARIO']) or (trim($_SESSION["CD_CAT_USUARIO"]) == "") ){
	$logado = "offline";
}
else{
	$logado = "online";
}
?>