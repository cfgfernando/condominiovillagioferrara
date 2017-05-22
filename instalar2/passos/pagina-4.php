 <?
include_once "passos/mostra_erros.php";
include_once "passos/config.php";
$id_config = 1;
 if($_GET['opcao'] == "alterar"){
	 
	$contato_email= $_POST['contato_email'];
	$contato_fone    = $_POST['contato_fone'];
	$facebook    = $_POST['facebook'];
	$twitter    = $_POST['twitter'];
	$linkedin    = $_POST['linkedin'];
	$email_sindico    = $_POST['email_sindico'];
	$email_padrao    = $_POST['email_padrao'];
	$empresa_padrao    = $_POST['empresa_padrao'];
	$titulo_pagina    = $_POST['titulo_pagina'];
	$titulo_pagina_adm    = $_POST['titulo_pagina_adm'];
	$limiteCancelamento    = $_POST['limiteCancelamento'];
	$meumapa    = LimpaLinkGoogle($_POST['meumapa']);
	$contato_site    = $_POST['contato_site'];
	$enderecoDoRss    = $_POST['enderecoDoRss'];
	$tit_home = $_POST['tit_home'];
	$QuantidadeExibir = $_POST['QuantidadeExibir'];
	
	if($msg == ""){
		$sql_cad = " UPDATE configuracoes SET
										contato_email = \"$contato_email\"
										,contato_fone = \"$contato_fone\"	
										,facebook = \"$facebook\"
										,twitter = \"$twitter\"
										,linkedin = \"$linkedin\"
										,email_sindico = \"$email_sindico\"
										,email_padrao = \"$email_padrao\"
										,titulo_pagina = \"$titulo_pagina\"
										,titulo_pagina_adm = \"$titulo_pagina_adm\"
										,limiteCancelamento = \"$limiteCancelamento\"
										,meumapa = \"$meumapa\"
										,contato_site = \"$contato_site\"
										,enderecoDoRss = \"$enderecoDoRss\"
										,tit_home = \"$tit_home\"
										,QuantidadeExibir = \"$QuantidadeExibir\"
									WHERE  id_config = \"$id_config\" ";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?passo=5");
		}else{
			echo AlertDanger("Erro ao cadastrar o registro!");
		}
	}
}
$sql  = " SELECT * FROM configuracoes WHERE  id_config = ".$id_config;
$res  = db_query($sql);
$rows = db_num_rows($res);
 ?>
 <div>
 <form action="?passo=4&opcao=alterar" method="post" enctype="multipart/form-data" name="form1">
	<div align="center"><p style="font-size:19px; padding-top:20px;"><b>Configura&ccedil;&atilde;o</b></div>
	<div><? echo AlertInfo("<b>Aten&ccedil;&atilde;o!</b> Todos os dados podem ser alterados quando desejar."); ?> </div>
	<p><div width="555" align="left" valign="middle" class="texto"> E-mail de Contato do Site: <font style="font-size:9px">(solicita&ccedil;&atilde;o de usu&aacute;rios)</font>
		<input name="contato_email" id="contato_email" type="text" class="form-control" value="<?= db_result($res,"contato_email"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Telefone de Contato do Site: 
		<input name="contato_fone" id="contato_fone" type="text" class="form-control" value="<?= db_result($res,"contato_fone"); ?>" size="14" maxlength="14" onkeypress="return txtBoxFormat(this, '(99)99999-9999', event);" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Facebook: <font style="font-size:9px">(somente o final da url. Ex: facebook.com/O_Que_fica_aqui) </font>
		<input name="facebook" id="facebook" type="text" class="form-control" value="<?= db_result($res,"facebook"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Twitter: 
		<input name="twitter" id="twitter" type="text" class="form-control" value="<?= db_result($res,"twitter"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Linkedin: 
		<input name="linkedin" id="linkedin" type="text" class="form-control" value="<?= db_result($res,"linkedin"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> E-mail do S&iacute;ndico: 
		<input name="email_sindico" id="email_sindico" type="text" class="form-control" value="<?= db_result($res,"email_sindico"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> T&iacute;tulo da p&aacute;gina: 
		<input name="titulo_pagina" id="titulo_pagina" type="text" class="form-control" value="<?= db_result($res,"titulo_pagina"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> T&iacute;tulo da p&aacute;gina de Administra&ccedil;&atilde;o: 
		<input name="titulo_pagina_adm" id="titulo_pagina_adm" type="text" class="form-control" value="<?= db_result($res,"titulo_pagina_adm"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Quantidade de dias limite para cancelamento: 
		<input name="limiteCancelamento" id="limiteCancelamento" type="text" class="form-control" value="<?= db_result($res,"limiteCancelamento"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Incorporar da Localiza&ccedil;&atilde;o do Condom&iacute;nio no Google maps: <a target="_NEW" href="https://support.google.com/maps/answer/144361?co=GENIE.Platform%3DDesktop&hl=pt-BR">Como fazer</a>
		<input name="meumapa" id="meumapa" type="text" class="form-control"  value='<iframe src="<?=$meumapa?>" width="600" height="450" frameborder="0" style="border:0"></iframe>'>
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Pasta do Site: <font style="font-size:9px">(Somente se n&atilde;o estiver na raiz, caso esteja na raiz, deixe em branco)</font>
		<input name="contato_site" id="contato_site" type="text" class="form-control" value="<?= db_result($res,"contato_site"); ?>" >
	</div>
    <p><div width="555" align="left" valign="middle" class="texto"> T&iacute;tulo da Home: 
		<input name="tit_home" id="tit_home" type="text" class="form-control" value="<?= db_result($res,"tit_home"); ?>" size="280" maxlength="280">
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Endere&ccedil;o do RSS a ser exibido na home: 
		<input name="enderecoDoRss" id="enderecoDoRss" type="text" class="form-control" value="<?= db_result($res,"enderecoDoRss"); ?>" >
	</div>
    <p><div width="555" align="left" valign="middle" class="texto">Quantidade de not&iacute;cias a serem exibidas: 
		<input name="QuantidadeExibir" id="QuantidadeExibir" type="text" class="form-control" value="<?= db_result($res,"QuantidadeExibir"); ?>" size="2" maxlength="2">
	</div>
	<div height="40" colspan="2" align="center" valign="middle" class="texto" style=" padding-top:15px">
		<input name="button" type="submit" class="btn btn-default" id="button" value="Alterar">
	</div>
 </form>
 
 </div>