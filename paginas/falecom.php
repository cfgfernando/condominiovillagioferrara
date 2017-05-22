<?php
if ($_GET['opcao'] == "envia"){
$cpf = $_POST['cpf'];

if (ValidaCPF($cpf)){
	
$nome 		= $_POST['nome'];
$email 		= $_POST['email'];
$mensagem 	= nl2br($_POST['mensagem']);
$telefone	= $_POST['telefone'];
$cpf = $_POST['cpf'];


$msg_email = " Nova solicita&ccedil;o de acesso <br />
Confira os dados dele (a): <br /><br />
<b>Nome:</b> $nome <br />
<b>E-mail:</b> $email <br />
<b>Endere&ccedil;:</b> $mensagem <br />
<b>Telefone:</b> $telefone<br />
<b>CPF:</b> $cpf <br />
";

	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: $nome <$email>\r\n";
	if(mail($contato_email, "Solicitação de acesso Sistema de Condominio", $msg_email, $headers)){
		echo AlertSuccess("<b>Obrigado!</b> Aguarde, assim que recebermos sua solicita&ccedil;&atilde;o entraremos em contato.");
	}
	else{
		echo AlertDanger("<b>Desculpe!</b> N&atilde;o foi poss&iacute;vel enviar o seu contato. Ocorreu algum erro durante o processo.");
	}

} else {
	if (!$cpf){
		echo AlertDanger("<b>CPF inv&aacute;lido!</b> Confira seu CPF e tente novamente.");
	} else {
		$msg = "";
	}
}
}
?>

<form action="?pg=20&opcao=envia" method="post" name="form1" onsubmit="return checaCampos();">
  <div width="100%" border="0" cellpadding="0" cellspacing="0">
    <div height="30" colspan="2" align="left" valign="middle" class="titulo">
      <h2>Solicite sua Conta de Acesso </h2>
      <hr></div>
      <br />
    </div>
    <div height="52" colspan="2" align="left" valign="middle" class="texto">Preencha todos os dados abaixo para solicitar sua conta de acesso!<br>
      <br />
    </div>
    <div align="center"><? echo $msg; ?></div>
    <div style="min-width:220px;" width="90" height="23" align="left" valign="middle">Nome:&nbsp;
      <input name="nome" style="min-width:220px;" type="text" class="form-control" id="nome" size="300" />
    </div>
    <div height="23" style="float:left; width:50%; min-width:220px;" align="left" valign="middle">E-mail:&nbsp;
      <input name="email" style="min-width:220px;" type="text" class="form-control" id="email" size="40" />
    </div>
    <div height="23" align="left" style="width:50%; min-width:220px; float:left" valign="middle">Telefone:&nbsp;
      <input name="telefone" style="min-width:220px;" type="text" class="form-control" id="telefone" size="14" maxlength="14" onkeypress="return txtBoxFormat(this, '(99)9999-9999', event);" />
    </div>
    <div height="23" style="float:left; width:50%; min-width:220px;" align="left" valign="middle">Endere&ccedil;o:&nbsp;
      <input name="mensagem" style="min-width:220px;" type="text" class="form-control" id="mensagem" size="500" />
    </div>
    <div height="22" style="float:left; width:50%; min-width:220px;" align="left" valign="middle">CPF:&nbsp;
      <input name="cpf" style="min-width:220px;" type="text" class="form-control" id="cpf" onkeypress="return txtBoxFormat(this, '999.999.999-99', event);" maxlength="14" />
      </span></div>
    <div>&nbsp;</div>
    <div height="40" colspan="2" align="center" valign="middle" class="texto">
      <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
    </div>
    <div>&nbsp;</div>
    <div height="40" colspan="2" align="center" valign="middle" class="texto_destaque">Ou ligue:</div>
    <? //= $contato_email; ?>
    <div height="40" colspan="2" align="center" valign="middle" class="texto"><img src="paginas/imagens/icone_telefone_09.gif" width="25" height="19" align="absmiddle" />
      <?= $contato_fone; ?>
    </div>
  </div>
</form>
