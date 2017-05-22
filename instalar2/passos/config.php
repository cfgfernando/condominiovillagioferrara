<?
//------------ NÃO ALTERAR NADA AQUI - INICIO ------------------------ //
include_once "../paginas/config.inc.php";
include_once "passos/funcoes.bd.php";
include_once "passos/banco.php";
include_once "passos/funcoes.php";
	
$sql6  = " SELECT * FROM configuracoes";
$res6  = db_query($sql6);
$rows6 = db_num_rows($res6);

$contato_email	= db_result($res6,"contato_email");
$contato_fone	= db_result($res6,"contato_fone");

$facebook= db_result($res6,"facebook");
$twitter=db_result($res6,"twitter");
$linkedin=db_result($res6,"linkedin");

$email_sindico  =db_result($res6,"email_sindico");
$empresa_padrao = db_result($res6,"empresa_padrao");

$icone_url  = "<link rel=\"shortcut icon\" type=\"image/ico\" href=\"imagens/logo.ico\" />";
$titulo_pagina = db_result($res6,"titulo_pagina");
$descricao_do_site = "Meta Tags sobre o site";
$titulo_pagina_adm = db_result($res6,"titulo_pagina_adm");

$limiteCancelamento = db_result($res6,"limiteCancelamento");


$meumapa = db_result($res6,"meumapa");
$contato_site	= db_result($res6,"contato_site");

$tit_home	= db_result($res6,"tit_home");
$xml=(db_result($res6,"enderecoDoRss"));
$QuantidadeExibir = db_result($res6,"QuantidadeExibir");

$meta_tags  = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
$meta_tags .= "<meta name=\"title\" content=\"$titulo_pagina\" />";
$meta_tags .= "<meta name=\"description\" content=\"$descricao_do_site\" />";
$meta_tags .= "<meta name=\"keywords\" content=\"$descricao_do_site\" />";
$meta_tags .= "<META NAME=\"ROBOTS\" CONTENT=\"INDEX,FOLLOW\" />";
$meta_tags .= "<META HTTP-EQUIV=\"expires\" CONTENT=\"0\" />";
//------------ NÃO ALTERAR NADA AQUI - FIM ------------------------ //
?>