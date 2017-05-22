<?
$id_dtmora = $_GET['id_dtmora'];
$sql  = " SELECT * FROM dados_morador WHERE id_dtmora = $id_dtmora ";
$res  = db_query($sql);
$rows = db_num_rows($res);


if($_GET['opcao'] == "alterar"){
$idmorador_dtmora = $_POST['idmorador_dtmora'];
$valor_dtmora = $_POST['valor_dtmora'];
$valoracres1_dtmora = ConverteRealCad($_POST['valoracres1_dtmora']);
$valoracres2_dtmora = ConverteRealCad($_POST['valoracres2_dtmora']);
$demonstrativo2_dtmora = $_POST['demonstrativo2_dtmora'];
$demonstrativo3_dtmora = $_POST['demonstrativo3_dtmora'];
$nossonum_dtmora = $_POST['nossonum_dtmora'];
$numdoc_dtmora = $_POST['numdoc_dtmora'];
$venc_dtmora = ConverteData($_POST['venc_dtmora']);
$mes_dtmora = $_POST['mes_dtmora'];
$ano_dtmora = $_POST['ano_dtmora'];

for($i=0; $i<count($idmorador_dtmora); $i++){
$sql_mora = " UPDATE dados_morador SET valor_dtmora = $valor_dtmora
									, valoracres1_dtmora = $valoracres1_dtmora
									, valoracres2_dtmora = $valoracres2_dtmora
									, demonstrativo2_dtmora = $demonstrativo2_dtmora
									, demonstrativo3_dtmora = $demonstrativo3_dtmora
									, nossonum_dtmora = $nossonum_dtmora
									, numdoc_dtmora = $numdoc_dtmora
									, mes_dtmora = $mes_dtmora
									, ano_dtmora = $ano_dtmora 
											WHERE id_dtmora = $id_dtmora ";
$res_mora  = db_query($sql_mora) or die(db_error());
$contador += 1;
	if($res_mora){
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: $titulo_pagina <$contato_email>\r\n";
		$assunto = "Alteração em seu boleto referente à $mes_dtmora/$ano_dtmora";
		$mensagem = "boleto alterado";
		$email = db_result($res,"email_morador",$i);
				mail($email,$assunto,$mensagem,$headers);
		}
}
	if($email){
		echo AlertSuccess("<b>Registro atualizado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=39");
	} else {
		echo AlertDanger("Erro ao atualizar o registro!");
	}
}


$idmorador_dtmora = db_result($res,"idmorador_dtmora");
$valor_dtmora = db_result($res,"valor_dtmora");
$valoracres1_dtmora = ConverteReal(db_result($res,"valoracres1_dtmora"));
$valoracres2_dtmora = ConverteReal(db_result($res,"valoracres2_dtmora"));
$demonstrativo2_dtmora = db_result($res,"demonstrativo2_dtmora");
$demonstrativo3_dtmora = db_result($res,"demonstrativo3_dtmora");
$nossonum_dtmora = db_result($res,"nossonum_dtmora");
$numdoc_dtmora = db_result($res,"numdoc_dtmora");
$venc_dtmora = ConverteData(db_result($res,"venc_dtmora"));
$mes_dtmora = db_result($res,"mes_dtmora");
$ano_dtmora = db_result($res,"ano_dtmora");

?>
<form action="?pg=40&opcao=alterar" method="post" enctype="multipart/form-data" name="form1">
  <div align="left" valign="middle" class="texto">Valor:
    <input name="valor_dtmora" type="text" class="form-control" size="8" maxlength="8" value="<?=$valor_dtmora?>" placeholder="Ex. 1235,00" required="required">
  </div>
  <div style="clear: left;">&nbsp;</div>
  <div class="tamanho">
    <div  align="left" valign="middle" class="texto" style="width:70%; float:left;">Acrescimo 1:
      <input name="demonstrativo2_dtmora" type="text" class="form-control" size="200" value="<?=$demonstrativo2_dtmora?>" maxlength="200">
    </div>
    <div style="width:2%; float:left;">&nbsp;</div>
    <div  align="left" valign="middle" class="texto" style="width:28%; float:left;">Valor do acrescimo 1:
      <input name="valoracres1_dtmora" type="text" class="form-control" size="8" maxlength="8" value="<?=$valoracres1_dtmora?>" placeholder="Ex. 1235,00">
    </div>
    <div style="clear: left;">&nbsp;</div>
    <div align="left" valign="middle" class="texto" style="width:70%; float:left;">Acrescimos 2:
      <input name="demonstrativo3_dtmora" type="text" class="form-control" size="200" value="<?=$demonstrativo3_dtmora?>" maxlength="200">
    </div>
    <div style="width:2%; float:left;">&nbsp;</div>
    <div align="left" valign="middle" class="texto" style="width:28%; float:left;">Valor do acrescimo 2:
      <input name="valoracres2_dtmora" type="text" class="form-control" size="8" maxlength="8" value="<?=$valoracres2_dtmora?>" placeholder="Ex. 1235,00">
    </div>
  </div>
  <div style="clear: left;">&nbsp;</div>
  <div class="tamanho">
    <div align="left" valign="middle" class="texto" style="width:49%; float:left;">Nosso N&uacute;mero:
      <input name="nossonum_dtmora" type="text" class="form-control" size="7" maxlength="7" value="<?=$nossonum_dtmora?>" required="required">
    </div>
    <div style="width:2%; float:left;">&nbsp;</div>
    <div align="left" valign="middle" class="texto" style="width:49%; float:left;">N&deg; do Documento:
      <input name="numdoc_dtmora" type="text" class="form-control" size="7" maxlength="7" value="<?=$numdoc_dtmora?>" required="required">
    </div>
  </div>
  <div style="clear: left;">&nbsp;</div>
  <div class="tamanho">
    <div align="left" valign="middle" class="texto" style="width:32%; float:left;">Vencimento:
      <input name="venc_dtmora" type="text" class="form-control" size="10" maxlength="10" value="<?=$venc_dtmora?>" id="calendario" onkeypress="return txtBoxFormat(this, '99/99/9999', event);">
    </div>
    <div style="width:1.8%; float:left;">&nbsp;</div>
    <div align="left" valign="middle" class="texto" style="width:32%; float:left;">M&ecirc;s Refer&ecirc;ncia:
      <select name="mes_dtmora" class="form-control" id="mes_dtmora">
        <option value="Jan" <? if ($mes_dtmora == "Jan") echo "selected"?>> Janeiro</option>
        <option value="Fev" <? if ($mes_dtmora == "Fev") echo "selected"?>> Fevereiro</option>
        <option value="Mar" <? if ($mes_dtmora == "Mar") echo "selected"?>> Mar&ccedil;o</option>
        <option value="Abr" <? if ($mes_dtmora == "Abr") echo "selected"?>> Abril</option>
        <option value="Mai" <? if ($mes_dtmora == "Mai") echo "selected"?>> Maio</option>
        <option value="Jun" <? if ($mes_dtmora == "Jun") echo "selected"?>> Junho</option>
        <option value="Jul" <? if ($mes_dtmora == "Jul") echo "selected"?>> Julho</option>
        <option value="Ago" <? if ($mes_dtmora == "Ago") echo "selected"?>> Agosto</option>
        <option value="Set" <? if ($mes_dtmora == "Set") echo "selected"?>> Setembro</option>
        <option value="Out" <? if ($mes_dtmora == "Out") echo "selected"?>> Outubro</option>
        <option value="Nov" <? if ($mes_dtmora == "Nov") echo "selected"?>> Novembro</option>
        <option value="Dez" <? if ($mes_dtmora == "Dez") echo "selected"?>> Dezembro</option>
      </select>
    </div>
    <div style="width:1.8%; float:left;">&nbsp;</div>
    <div align="left" valign="middle" class="texto" style="width:32%; float:left;">Ano Refer&ecirc;ncia:
      <select name="ano_dtmora" class="form-control" id="ano_dtmora">
        <? for ($i =0; $i < 3; $i++){ ?>
        <option value="<?=date("Y")+$i; ?>" <? if ($ano_dtmora == date("Y")+$i) echo "selected"?>>
        <?=date("Y")+$i; ?>
        </option>
        <? } ?>
      </select>
    </div>
  </div>
  <div>
    <p>&nbsp;</p>
  </div>
  <div height="40" colspan="2" align="center" valign="middle" class="texto">
    <input name="button" type="submit" class="btn btn-default" id="button" value="  Alterar  ">
  </div>
</form>