<?
//------------ NÃO ALTERAR NADA AQUI - INICIO ------------------------ //
include_once "config.inc.php";
include_once "funcoes.bd.php";
include_once "banco.php";
include_once "funcoes.php";
$sql6  = " SELECT * FROM configuracoes";
$res6  = db_query($sql6);
$rows6 = db_num_rows($res6);
$contato_email	= db_result($res6,"contato_email");
$contato_fone	= db_result($res6,"contato_fone");
$email_sindico  =db_result($res6,"email_sindico");
$titulo_pagina = db_result($res6,"titulo_pagina");
$titulo_pagina_adm = db_result($res6,"titulo_pagina_adm");
$limiteCancelamento = db_result($res6,"limiteCancelamento");
$meumapa = db_result($res6,"meumapa");
$contato_site	= db_result($res6,"contato_site");
$servidor = $_SERVER['SERVER_NAME']; //NÃO MUDAR
$contatos_sites	= "http://".$servidor."/".$contato_site;
$exibir_visitantes	= db_result($res6,"visitante_conf");
$exibir_boletos = db_result($res6,"boleto_conf");
$nossoEndereco = db_result($res6,"endereco_config")." - ".db_result($res6,"bairro_config");
$nossaCidade = db_result($res6,"cidade_config");


//------------------------------------------------------------------------//

$cd_cat_usuario = $_SESSION['CD_CAT_USUARIO'];

$sql10  = " SELECT * FROM permissoes WHERE cd_cat_usuario = $cd_cat_usuario";
$res10  = db_query($sql10);
$rows10 = db_num_rows($res10);

$id_perm= db_result($res10,"id_perm");
$tipo_user_perm= db_result($res10,"tipo_user_perm");
$condominio_perm= db_result($res10,"condominio_perm");
$corpodiret_perm= db_result($res10,"corpodiret_perm");
$estatuto_perm= db_result($res10,"estatuto_perm");
$funcionario_perm = db_result($res10,"funcionario_perm");
$agenda_perm= db_result($res10,"agenda_perm");
$anunciar_perm= db_result($res10,"anunciar_perm");
$classificados_perm= db_result($res10,"classificados_perm");
$enquete_perm= db_result($res10,"enquete_perm");
$enquete_perm= db_result($res10,"enquete_perm");
$info_perm= db_result($res10,"info_perm");
$livrooco_perm= db_result($res10,"livrooco_perm");
$reservas_perm= db_result($res10,"reservas_perm");
$reservas_admin_perm= db_result($res10,"reservas_admin_perm");
$reunioes_perm= db_result($res10,"reunioes_perm");
$reunioes_admin_perm= db_result($res10, "reunioes_admin_perm");
$visitantes_perm= db_result($res10,"visitantes_perm");
$visitantes_admin_perm = db_result($res10, "visitantes_admin_perm");
$alterados_perm= db_result($res10,"alterados_perm");
$alterasenha_perm= db_result($res10,"alterasenha_perm");
$prestacontas_perm= db_result($res10,"prestacontas_perm");
$forum_perm = db_result($res10, "forum_perm");
$forum_admin_perm = db_result($res10, "forum_admin_perm");


//------------ NÃƒO ALTERAR NADA AQUI - FIM --------------------------//

?>