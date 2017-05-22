 <?
 include_once "paginas/autenticacao.php";
 

$id_config = 1;
 if($_GET['opcao'] == "alterar"){
	 
	$contato_email= $_POST['contato_email'];
	$contato_fone    = $_POST['contato_fone'];
	$facebook    = $_POST['facebook'];
	$twitter    = $_POST['twitter'];
	$googleplus    = $_POST['googleplus'];
	$email_sindico    = $_POST['email_sindico'];
	$endereco_config = $_POST['endereco_config'];
	$cidade_config = $_POST['cidade_config'];
	$bairro_config = $_POST['bairro_config'];
	$cep_config = $_POST['cep_config'];
	$titulo_pagina    = $_POST['titulo_pagina'];
	$titulo_pagina_adm    = $_POST['titulo_pagina_adm'];
	$limiteCancelamento    = $_POST['limiteCancelamento'];
	$meumapa    = LimpaLinkGoogle($_POST['meumapa']);
	$contato_site    = $_POST['contato_site'];
	$enderecoDoRss    = $_POST['enderecoDoRss'];
	$tit_home = $_POST['tit_home'];
	$QuantidadeExibir = $_POST['QuantidadeExibir'];
	$exibir_visitantes = $_POST['exibir_visitantes'];
	$exibir_forum = $_POST['exibir_forum'];
	$exibir_boleto = $_POST['exibir_boleto'];
	$prazoCriarLista = $_POST['prazocriarlista'];
	
	if($msg == ""){
		$sql_cad = " UPDATE configuracoes SET
										contato_email = \"$contato_email\"
										,contato_fone = \"$contato_fone\"	
										,facebook = \"$facebook\"
										,twitter = \"$twitter\"
										,googleplus = \"$googleplus\"
										,email_sindico = \"$email_sindico\"
										,endereco_config = \"$endereco_config\"
										,cidade_config = \"$cidade_config\"
										,bairro_config = \"$bairro_config\"
										,cep_config = \"$cep_config\"
										,titulo_pagina = \"$titulo_pagina\"
										,titulo_pagina_adm = \"$titulo_pagina_adm\"
										,limiteCancelamento = \"$limiteCancelamento\"
										,meumapa = \"$meumapa\"
										,contato_site = \"$contato_site\"
										,enderecoDoRss = \"$enderecoDoRss\"
										,tit_home = \"$tit_home\"
										,forum_conf=\"$exibir_forum\"
										,boleto_conf= \"$exibir_boleto\"
										,QuantidadeExibir = \"$QuantidadeExibir\"
										,visitante_conf = \"$exibir_visitantes\"
										,prazocriarlista = \"$prazoCriarLista\"
									WHERE  id_config = \"$id_config\" ";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=22");
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
 <form action="?pg=22&opcao=alterar" method="post" enctype="multipart/form-data" name="form1">
	<div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Configura&ccedil;&atilde;o -</h2></div>
    <div height="19" colspan="2" align="center" valign="middle" class="texto"><p><?= $msg; ?></p></div>
	<h2>Dados</h2>
	<p><div width="555" align="left" valign="middle" class="texto"> E-mail de Contato do Site: <font style="font-size:9px">(solicita&ccedil;&atilde;o de usu&aacute;rios)</font>
		<input name="contato_email" id="contato_email" type="text" class="form-control" value="<?= db_result($res,"contato_email"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Telefone de Contato do Site: 
		<input name="contato_fone" id="contato_fone" type="text" class="form-control" value="<?= db_result($res,"contato_fone"); ?>" size="14" maxlength="14" onkeypress="return txtBoxFormat(this, '(99)99999-9999', event);" >
	</div>
    <p><div width="555" align="left" valign="middle" class="texto"> E-mail do S&iacute;ndico: 
		<input name="email_sindico" id="email_sindico" type="text" class="form-control" value="<?= db_result($res,"email_sindico"); ?>" >
	</div>
    <hr />
    <h2>Endere&ccedil;o</h2>
    <p><div width="555" align="left" valign="middle" class="texto"> Rua/Avenida/Estrada: 
		<input name="endereco_config" id="endereco_config" type="text" class="form-control" value="<?= db_result($res,"endereco_config"); ?>" >
	</div>
    <p><div width="555" align="left" valign="middle" class="texto"> Bairro: 
		<input name="bairro_config" id="bairro_config" type="text" class="form-control" value="<?= db_result($res,"bairro_config"); ?>" >
	</div>
    <p><div width="555" align="left" valign="middle" class="texto"> Cidade-uf: 
		<input name="cidade_config" id="cidade_config" type="text" class="form-control" value="<?= db_result($res,"cidade_config"); ?>" >
	</div>
    <p><div width="555" align="left" valign="middle" class="texto"> CEP: 
		<input name="cep_config" id="cep_config" type="text" class="form-control" value="<?= db_result($res,"cep_config"); ?>" size="10" maxlength="10" onkeypress="return txtBoxFormat(this, '99.999-999', event);">
	</div>
    <hr />
    <h2>Redes Sociais</h2>
	<p><div width="555" align="left" valign="middle" class="texto"> Facebook: <font style="font-size:9px">(somente o final da url. Ex: facebook.com/O_Que_fica_aqui) </font>
		<input name="facebook" id="facebook" type="text" class="form-control" value="<?= db_result($res,"facebook"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Twitter: 
		<input name="twitter" id="twitter" type="text" class="form-control" value="<?= db_result($res,"twitter"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Google Plus: 
		<input name="googleplus" id="googleplus" type="text" class="form-control" value="<?= db_result($res,"googleplus"); ?>" >
	</div>
	
    <hr />
    <h2>Funcionais</h2>
	<p><div width="555" align="left" valign="middle" class="texto"> T&iacute;tulo da p&aacute;gina: 
		<input name="titulo_pagina" id="titulo_pagina" type="text" class="form-control" value="<?= db_result($res,"titulo_pagina"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> T&iacute;tulo da p&aacute;gina de Administra&ccedil;&atilde;o: 
		<input name="titulo_pagina_adm" id="titulo_pagina_adm" type="text" class="form-control" value="<?= db_result($res,"titulo_pagina_adm"); ?>" >
	</div>
	<p>
	<div width="555" align="left" valign="middle" class="texto"> Quantidade de dias limite para cancelamento de reservas: 
		<input name="limiteCancelamento" id="limiteCancelamento" type="text" class="form-control" value="<?= db_result($res,"limiteCancelamento"); ?>" >
	</div>
    <p>
    <div width="555" align="left" valign="middle" class="texto"> Quantidade de dias limite para criar lista de convidados para reservas: 
		<input name="prazocriarlista" id="prazocriarlista" type="text" class="form-control" value="<?= db_result($res,"prazocriarlista"); ?>" >
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Incorporar da Localiza&ccedil;&atilde;o do Condom&iacute;nio no Google maps: <a target="_NEW" href="https://support.google.com/maps/answer/144361?co=GENIE.Platform%3DDesktop&hl=pt-BR">Como fazer</a>
		<input name="meumapa" id="meumapa" type="text" class="form-control"  value='<iframe src="<?=$meumapa?>" width="600" height="450" frameborder="0" style="border:0"></iframe>'>
	</div>
	<p><div width="555" align="left" valign="middle" class="texto"> Pasta do Site: <font style="font-size:9px">(Somente se n&atilde;o estiver na raiz)</font>
		<input name="contato_site" id="contato_site" type="text" class="form-control" value="<?= db_result($res,"contato_site"); ?>" >
	</div>
    <hr />
    <h2>Home</h2>
    <p><div width="555" align="left" valign="middle" class="texto"> T&iacute;tulo da Home: 
		<input name="tit_home" id="tit_home" type="text" class="form-control" value="<?= db_result($res,"tit_home"); ?>" size="280" maxlength="280">
	</div>
    
	<p><div width="555" align="left" valign="middle" class="texto"> Endere&ccedil;o do RSS a ser exibido na home: 
		<input name="enderecoDoRss" id="enderecoDoRss" type="text" class="form-control" value="<?= db_result($res,"enderecoDoRss"); ?>" >
	</div>
    <p><div width="555" align="left" valign="middle" class="texto">Quantidade de not&iacute;cias a serem exibidas: 
		<input name="QuantidadeExibir" id="QuantidadeExibir" type="text" class="form-control" value="<?= db_result($res,"QuantidadeExibir"); ?>" size="2" maxlength="2">
	</div>
    
    <p>
    <div width="555" align="left" valign="middle" class="texto">Exibir op&ccedil;&atilde;o &quot;Visitantes&quot; no menu: 	<br /><div class="btn-group" data-toggle="buttons">
    <label class="btn btn-success <? if($exibir_visitantes == "1"){ echo "active";} ?>">
      <input type="radio" value="1" name="exibir_visitantes" <? if($exibir_visitantes == "1"){ echo "checked";} ?>>
      <? if($exibir_visitantes == "1"){ echo "*Exibir*";}else{echo "Exibir";} ?> </label>
      
    <label  class="btn btn-warning <? if($exibir_visitantes == "0"){ echo "active";} ?>">
      <input type="radio" value="0" name="exibir_visitantes" <? if($exibir_visitantes == "0"){ echo "checked";} ?>>
      <? if($exibir_visitantes == "0"){ echo "*Ocultar*";}else{echo "Ocultar";} ?> </label>
		</div>
	</div>
    
    
    <p>
    <? $exibir_forum = db_result($res6,"forum_conf")?>
    <div width="555" align="left" valign="middle" class="texto">Exibir op&ccedil;&atilde;o &quot;F&oacute;rum&quot; no menu: 	<br />
    	<div class="btn-group" data-toggle="buttons">
    <label class="btn btn-success <? if($exibir_forum == "1"){ echo "active";} ?>">
      <input type="radio" value="1" name="exibir_forum" <? if($exibir_forum == "1"){ echo "checked";} ?>>
      <? if($exibir_forum == "1"){ echo "*Exibir*";}else{echo "Exibir";} ?> </label>
      
    <label  class="btn btn-warning <? if($exibir_forum == "0"){ echo "active";} ?>">
      <input type="radio" value="0" name="exibir_forum" <? if($exibir_forum == "0"){ echo "checked";} ?>>
      <? if($exibir_forum == "0"){ echo "*Ocultar*";}else{echo "Ocultar";} ?> </label>
		</div>
	</div>
    
    
    <p>
    <? $exibir_boleto = db_result($res6,"boleto_conf")?>
    <div width="555" align="left" valign="middle" class="texto">Exibir op&ccedil;&atilde;o &quot;Boleto&quot; no menu: 	<br />
    	<div class="btn-group" data-toggle="buttons">
    <label class="btn btn-success <? if($exibir_boleto == "1"){ echo "active";} ?>">
      <input type="radio" value="1" name="exibir_boleto" <? if($exibir_boleto == "1"){ echo "checked";} ?>>
      <? if($exibir_boleto == "1"){ echo "*Exibir*";}else{echo "Exibir";} ?> </label>
      
    <label  class="btn btn-warning <? if($exibir_boleto == "0"){ echo "active";} ?>">
      <input type="radio" value="0" name="exibir_boleto" <? if($exibir_boleto == "0"){ echo "checked";} ?>>
      <? if($exibir_boleto == "0"){ echo "*Ocultar*";}else{echo "Ocultar";} ?> </label>
		</div>
	</div>
    
    
	<div height="40" colspan="2" align="center" valign="middle" class="texto">
		<p><input name="button" type="submit" class="btn btn-default" id="button" value="Salvar"></p>
	</div>
 </form>
 
 </div>