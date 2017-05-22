<?php
include_once "config.php";

if($_GET['opcao'] == "descadastrar"){
	$nm_info = $_POST['nm_info'];
	$email_info = $_POST['email_info'];
	
	$sql_cad = " DELETE FROM informativo WHERE email_info = \"$email_info\" ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		echo AlertSuccess("Seu e-mail foi descadastrado de nosso informativo com sucesso! Até mais...");
	}
	else{
		echo AlertDanger("Não foi possível descadastrar seu e-mail de nosso informativo!");
	}
}

?>

<div>
<form action="informativo_desc.php?opcao=descadastrar" method="post" name="form1">
  <div height="30" colspan="3" align="left" valign="middle" class="titulo">
    <h2>Informativo - Descadastrar E-mail</h2>
    <hr>
  </div>
  <div height="26" colspan="3" align="left" valign="top" class="texto">Somente coloque seu e-mail na caixa abaixo se voc&ecirc; n&atilde;o deseja mais receber o  informativo:<br />
  </div>
  <div height="20" colspan="3" align="center" valign="middle" class="texto">
    <?= $msg; ?>
  </div>
  <div height="25" align="left" valign="middle">E-mail:&nbsp;</div>
  <div colspan="2" align="left" valign="middle" class="texto">
    <input name="email_info" type="text" class="form-control" id="email_info" size="45" />
  </div>
  <div height="40" colspan="2" align="left" valign="middle" class="texto">
    <input name="button" type="submit" class="btn btn-primary" id="button" value="  Descadastrar  " />
  </div>
</form>
</div>