<?php
if($_GET['opcao'] == "envia"){
	$login_usuario = $_POST['cpf'];
	
	if($login_usuario == "")
		echo AlertDanger("Favor preencher o campo CPF!");

		$sql = " SELECT *
				   FROM  funcionario 
				  WHERE funcionario.login_usuario = \"$login_usuario\" ";
		$res = mysql_query($sql);
		
		if(mysql_num_rows($res) == 0){
			$sql  = " SELECT *
						FROM morador
					   WHERE morador.login_usuario = \"$login_usuario\" "; 
			$res  = mysql_query($sql);
			$rows = mysql_num_rows($res);
			
			if(mysql_num_rows($res) == 0){
				echo AlertDanger("CPF n&atilde;o encontrado em nosso banco de dados!");
			}
			else{
				$novasenha = gera_chave(8);
				$md5novasenha = md5($novasenha);
			//===============================================e-mail inicio ==================================//
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: $titulo_pagina <$contato_email>\r\n";
		$assunto = "Nova senha gerada no site $titulo_pagina";
		$mensagem = "Como solicitado, uma nova senha foi gerada para voc&ecirc;! <br />
		Acesse o site usando:
		<br />CPF: {$login_usuario}
		<br />Senha: {$novasenha}";
			$email = db_result($res, "email_morador");
			if (mail($email,$assunto,$mensagem,$headers)){
			echo AlertSuccess("Nova senha enviada com sucesso para seu e-mail");
			$sql  = " UPDATE morador SET senha_usuario = \"$md5novasenha\" WHERE login_usuario = \"$login_usuario\" ";
			$res  = mysql_query($sql);
			}else{
				echo AlertDanger("Erro ao enviar e-mail");
			}

		
		//===============================================e-mail fim ==================================//
			}
		
		}elseif(mysql_num_rows($res) > 0){
			$novasenha = gera_chave(8);
			$md5novasenha = md5($novasenha);
			//===============================================e-mail inicio ==================================//
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: $titulo_pagina <$contato_email>\r\n";
		$assunto = "Nova senha gerada no site $titulo_pagina";
		$mensagem = "Como solicitado, uma nova senha foi gerada para voc&ecirc;! <br />
		Acesse o site usando:
		<br />CPF: {$login_usuario}
		<br />Senha: {$novasenha}";
			$email = db_result($res, "email_func");
			if (mail($email,$assunto,$mensagem,$headers)){
			echo AlertSuccess("Nova senha enviada com sucesso para seu e-mail");
			$sql  = " UPDATE funcionario SET senha_usuario = \"$md5novasenha\" WHERE login_usuario = \"$login_usuario\" ";
			$res  = mysql_query($sql);
			}else{
				echo AlertDanger("Erro ao enviar e-mail");
			}

		
		//===============================================e-mail fim ==================================//
		} else {
			echo AlertDanger("CPF n&atilde;o encontrado em nosso banco de dados!");
		}
			
}
?>

<form action="?pg=6&opcao=envia" method="post" name="form1" onsubmit="return checaCampos();">
  <div width="100%" border="0" cellpadding="0" cellspacing="0">
    <div height="30" colspan="2" align="left" valign="middle" class="titulo">
      <h2>Equeceu a senha? </h2>
      <hr></div>
      <br />
    </div>
    <div height="52" colspan="2" align="left" valign="middle" class="texto">Preencha o campo abaixo para resetar sua senha e receber por e-mail!<br>
      <br />
    </div>
    <div align="center">
    <div height="22" style="width:50%; min-width:220px;" align="center">
      <input placeholder="CPF" name="cpf" style="min-width:220px;" type="text" class="form-control" id="cpf" onkeypress="return txtBoxFormat(this, '999.999.999-99', event);" maxlength="14" />
      </span></div></div>
    <div>&nbsp;</div>
    <div height="40" colspan="2" align="center" valign="middle" class="texto">
      <input class="btn btn-primary" type="submit" name="button" id="button" value="  Solicitar  " />
    </div>
    <div>&nbsp;</div>
    <div height="40" colspan="2" align="center" valign="middle" class="texto_destaque">Ou ligue:</div>
    <? //= $contato_email; ?>
    <div height="40" colspan="2" align="center" valign="middle" class="texto"><img src="paginas/imagens/icone_telefone_09.gif" width="25" height="19" align="absmiddle" />
      <?= $contato_fone; ?>
    </div>
  </div>
</form>
