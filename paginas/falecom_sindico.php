<?php
if ($_GET['opcao'] == "envia"){
	
$nome 		= $_POST['nome'];
$email 		= $_POST['email'];
$telefone	= $_POST['telefone'];
$mensagem 	= nl2br($_POST['mensagem']);

$msg_email = " O usuário entrou em contato através do Portal $titulo_pagina<br />
Confira os dados dele: <br /><br />
<b>Nome:</b> $nome <br />
<b>E-mail:</b> $email <br />
<b>Telefone:</b> $telefone<br />
<b>Mensagem:</b> $mensagem <br />

";

	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: $nome <$email>\r\n";
	if(mail($email_sindico, "Fale comigo - E-mail do Sistema de Condominio", $msg_email, $headers)){
		echo AlertSuccess("<b>$nome</b>! Aguarde, assim que recebermos sua solicita&ccedil;&atilde;o entraremos em contato.");
	}
	else{
		echo AlertDanger("Desculpe <b>$nome</b>! N&atilde;o foi poss&iacute;vel enviar o seu contato.<br />Ocorreu algum erro durante o processo.<br />por favor utilize algumas das outras formas de contato listadas abaixo...");
	}

}
?>

<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('ds_res', {enterMode:Number(2)});
};
</script>

<form action="?pg=21&opcao=envia" method="post" name="form1" onsubmit="return checaCampos();">
  <div width="100%" border="0" cellpadding="0" cellspacing="0"> 
    	<div height="30" colspan="2" align="left" valign="middle" class="titulo">
        <h2>Fale com o S&iacute;ndico</h2><hr></div>
   		</div>
  <div>
      <div height="52" colspan="2" align="left" valign="middle" class="alert alert-info">Este &eacute; um canal de relacionamento entre seu sindico e voc&ecirc;. Tire suas d&uacute;vidas, d&ecirc; sugest&otilde;es, o nosso objetivo &eacute; sempre atender com qualidade e efici&ecirc;ncia.<br>
        <br />
      </div>
    </div>
    <div>
      <div width="90" style=" min-width:260px" height="23" align="left" valign="middle">Nome:&nbsp;</div>
      <div width="283" align="left" style=" min-width:260px" valign="middle" class="texto">
        <input name="nome" style=" min-width:260px" type="text" class="form-control" id="nome" size="300" />
      </div>
    </div>
    <div>
      <div height="23" style="float:left; width:50%; min-width:260px;" align="left" valign="middle">E-mail:&nbsp;
        <input name="email" type="text" class="form-control" id="email" size="100" />
      </div>
    </div>
    <div>
      <div height="23" style="float:left; width:50%; min-width:260px;" align="left" valign="middle">Telefone:&nbsp;
        <input name="telefone" type="text" class="form-control" id="telefone" size="14" maxlength="14" onkeypress="return txtBoxFormat(this, '(99)9999-9999', event);" />
      </div>
    </div>
    <div>
      <div height="23" style="min-width:260px; width:100%;" align="left" valign="middle">Mensagem:&nbsp;
        <textarea name="mensagem" style=" min-width:260px" cols="35" rows="10" class="form-control" id="compose-textarea"></textarea>
      </div>
    </div>
    <div>
      <div height="112" align="center"><?= $msg ?></div>
    </div>
    <div>
      <div height="40" colspan="2" align="center" valign="middle" class="texto"><p>&nbsp;</p>
        <p><button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button></p>
      </div>
    </div>
    <div>
      <div height="40" colspan="2" align="center" valign="middle" class="texto_destaque">Ou ligue:</div>
    </div>
    <div>
      <div height="40" colspan="2" align="center" valign="middle" class="texto"><img src="paginas/imagens/icone_telefone_09.gif" width="25" height="19" align="absmiddle" />
        <?= $contato_fone; ?>
      </div>
    </div>
    <div>
      <div height="80">&nbsp;</div>
      <div>&nbsp;</div>
    </div>
  </div>
  </div>
  </div>
  </div>
</form>
