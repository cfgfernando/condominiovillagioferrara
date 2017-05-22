<style type="text/css">
.titbanco {
	font-size:14px;
	color:#F00;
	font-weight: bold;
}
</style>
<?
$sql_dtbnc  = " SELECT * FROM dados_banco ";
$res_dtbnc  = db_query($sql_dtbnc);
$rows_dtbnc = db_num_rows($res_dtbnc);

if ($_GET['op']=="salvar"){
$id_dtbnc= $_POST['id_dtbnc'];
$banco_dtbnc= $_POST['banco_dtbnc'];
$carteira_dtbnc= $_POST['carteira_dtbnc'];
$desccarteira_dtbnc= $_POST['desccarteira_dtbnc'];
$agencia_dtbnc= $_POST['agencia_dtbnc'];
$digagencia_dtbnc= $_POST['digagencia_dtbnc'];
$conta_dtbnc= $_POST['conta_dtbnc'];
$digconta_dtbnc= $_POST['digconta_dtbnc'];
$contacedente_dtbnc= $_POST['contacedente_dtbnc'];
$digcontacedente_dtbnc= $_POST['digcontacedente_dtbnc'];
$localpgto_dtbnc= $_POST['localpgto_dtbnc'];
$txboleto_dtbnc= $_POST['txboleto_dtbnc'];
$imagem_dtbnc= $_POST['imagem_dtbnc'];
$status_dtbnc= $_POST['status_dtbnc'];
$id_dtbnc = $_POST['id_dtbnc'];

$convenio_dtbnc = $_POST['convenio_dtbnc'];
$contrato_dtbnc = $_POST['contrato_dtbnc'];
$variacao_carteira_dtbnc = $_POST['variacao_carteira_dtbnc'];
$formatacao_convenio_dtbnc = $_POST['formatacao_convenio_dtbnc'];
$formatacao_nosso_numero_dtbnc = $_POST['formatacao_nosso_numero_dtbnc'];
	
$sql_altera	= "UPDATE dados_banco SET carteira_dtbnc	=	\"$carteira_dtbnc\"
										,desccarteira_dtbnc	=	\"$desccarteira_dtbnc\"
										,agencia_dtbnc	=	\"$agencia_dtbnc\"
										,digagencia_dtbnc	=	\"$digagencia_dtbnc\"
										,conta_dtbnc	=	\"$conta_dtbnc\"
										,digconta_dtbnc	=	\"$digconta_dtbnc\"
										,contacedente_dtbnc	=	\"$contacedente_dtbnc\"
										,digcontacedente_dtbnc	=	\"$digcontacedente_dtbnc\"
										,localpgto_dtbnc	=	\"$localpgto_dtbnc\"
										,txboleto_dtbnc	=	\"$txboleto_dtbnc\"
										,status_dtbnc	=	\"$status_dtbnc\"
										,convenio_dtbnc = \"$convenio_dtbnc\"
										,contrato_dtbnc = \"$contrato_dtbnc\"
										,variacao_carteira_dtbnc = \"$variacao_carteira_dtbnc\"
										,formatacao_convenio_dtbnc = \"$formatacao_convenio_dtbnc\"
										,formatacao_nosso_numero_dtbnc = \"$formatacao_nosso_numero_dtbnc\"
											WHERE id_dtbnc = \"$id_dtbnc\" ";
$res_altera  = db_query($sql_altera) or die (mysql_error());
if ($res_altera){
	echo AlertSuccess("<b>Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
	Redireciona("?pg=38");
} else {
	echo AlertDanger("Erro ao alterar!");
}
}
?>
<form name="form1" id="form1" method="post" novalidate="novalidate" action="?pg=38&op=salvar">
  <div class="itau">
    <div class="titbanco">BANCO ITA&Uacute;</div>
    <div><img src="../paginas/boleto/imagens/<?=db_result($res_dtbnc,"imagem_dtbnc", 4);?>" alt="Banco" width="150" height="40" title="Banco" /></div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Agencia:
      <input name="agencia_dtbnc" type="text" value="<?=db_result($res_dtbnc,"agencia_dtbnc", 4)?>" class="form-control" id="agencia_dtbnc" size="60" maxlength="60" placeholder="Num da agencia sem digito">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Conta:
      <input name="conta_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"conta_dtbnc", 4)?>" placeholder="Num da conta sem digito">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Conta DV:
      <input name="digconta_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"digconta_dtbnc", 4)?>" placeholder="Digito do n&uacute;mero da conta">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Carteira:
      <input name="carteira_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"carteira_dtbnc", 4)?>" placeholder="Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Taxa do Boleto:
      <input name="txboleto_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"txboleto_dtbnc", 4)?>" placeholder="Valor da taxa de boleto. Ex: 2.50 (sem o R$)">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Local de Pagamento:
      <input name="localpgto_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"localpgto_dtbnc", 4)?>" placeholder="Até o vencimento, pagável em qualquer agência bancária">
    </div>
    <? $Ativar_itau = db_result($res_dtbnc,"status_dtbnc", 4)?>
    <div width="555" align="left" valign="middle" class="texto">Ativar Banco Itaú: <br />
      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-success <? if($Ativar_itau == "1"){ echo "active";} ?>">
          <input type="radio" value="1" name="status_dtbnc" <? if($Ativar_itau == "1"){ echo "checked";} ?>>
          <? if($Ativar_itau == "1"){ echo "*Ativado*";}else{echo "Ativar";} ?>
        </label>
        <label  class="btn btn-warning <? if($Ativar_itau == "0"){ echo "active";} ?>">
          <input type="radio" value="0" name="status_dtbnc" <? if($Ativar_itau == "0"){ echo "checked";} ?>>
          <? if($Ativar_itau == "0"){ echo "*Desativado*";}else{echo "Desativar";} ?>
        </label>
      </div>
    </div>
  </div>
  <p>
  <input name="id_dtbnc" type="hidden" value="<?=db_result($res_dtbnc,"id_dtbnc", 4)?>">
  
    <input class="btn btn-primary" type="submit" name="Submit" value="Salvar" />
  </p>
</form>
<br>
<br>
<form name="form1" id="form1" method="post" novalidate="novalidate" action="?pg=38&op=salvar">
  <div class="real">
    <div class="titbanco">BANCO REAL</div>
    <div><img src="../paginas/boleto/imagens/<?=db_result($res_dtbnc,"imagem_dtbnc", 5);?>" alt="Banco" width="150" height="40" title="Banco" /></div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Agencia:
      <input name="agencia_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"agencia_dtbnc", 5)?>" placeholder="Num da agencia sem digito">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Conta:
      <input name="conta_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"conta_dtbnc", 5)?>" placeholder="Num da conta sem digito">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Carteira:
      <input name="carteira_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"carteira_dtbnc", 5)?>" placeholder="Codigo da carteira">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Taxa do Boleto:
      <input name="txboleto_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"txboleto_dtbnc", 5)?>" placeholder="Valor da taxa de boleto. Ex: 2.50 (sem o R$)">
    </div>
    <? $Ativar_real = db_result($res_dtbnc,"status_dtbnc", 5)?>
    <div width="555" align="left" valign="middle" class="texto">Ativar Banco Real: <br />
      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-success <? if($Ativar_real == "1"){ echo "active";} ?>">
          <input type="radio" value="1" name="status_dtbnc" <? if($Ativar_real == "1"){ echo "checked";} ?>>
          <? if($Ativar_real == "1"){ echo "*Ativado*";}else{echo "Ativar";} ?>
        </label>
        <label  class="btn btn-warning <? if($Ativar_real == "0"){ echo "active";} ?>">
          <input type="radio" value="0" name="status_dtbnc" <? if($Ativar_real == "0"){ echo "checked";} ?>>
          <? if($Ativar_real == "0"){ echo "*Desativado*";}else{echo "Desativar";} ?>
        </label>
      </div>
    </div>
  </div>
  <p>
    <input class="btn btn-primary" type="submit" name="Submit" value="Salvar" />
  </p>
</form>
<br>
<br>
<form name="form1" id="form1" method="post" novalidate="novalidate" action="?pg=38&op=salvar">
  <div class="banespa">
    <div class="titbanco">BANCO BANESPA</div>
    <div><img src="../paginas/boleto/imagens/<?=db_result($res_dtbnc,"imagem_dtbnc", 2);?>" alt="Banco" width="150" height="30" title="Banco" /></div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> C&oacute;digo Cedente:
      <input name="contacedente_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"contacedente_dtbnc", 2)?>" placeholder="Código do cedente">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Ponto de Venda:
      <input name="agencia_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"agencia_dtbnc", 2)?>" placeholder="Ag&ecirc;ncia">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Carteira:
      <input name="carteira_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"carteira_dtbnc", 2)?>" placeholder="Codigo da carteira (COB - SEM Registro)">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Taxa do Boleto:
      <input name="txboleto_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"txboleto_dtbnc", 2)?>" placeholder="Valor da taxa de boleto. Ex: 2.50 (sem o R$)">
    </div>
    <? $Ativar_banespa = db_result($res_dtbnc,"status_dtbnc", 2)?>
    <div width="555" align="left" valign="middle" class="texto">Ativar Banco Banespa: <br />
      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-success <? if($Ativar_banespa == "1"){ echo "active";} ?>">
          <input type="radio" value="1" name="status_dtbnc" <? if($Ativar_banespa == "1"){ echo "checked";} ?>>
          <? if($Ativar_banespa == "1"){ echo "*Ativado*";}else{echo "Ativar";} ?>
        </label>
        <label  class="btn btn-warning <? if($Ativar_banespa == "0"){ echo "active";} ?>">
          <input type="radio" value="0" name="status_dtbnc" <? if($Ativar_banespa == "0"){ echo "checked";} ?>>
          <? if($Ativar_banespa == "0"){ echo "*Desativado*";}else{echo "Desativar";} ?>
        </label>
      </div>
    </div>
  </div>
  <p>
    <input class="btn btn-primary" type="submit" name="Submit" value="Salvar" />
  </p>
</form>
<br>
<br>
<form name="form1" id="form1" method="post" novalidate="novalidate" action="?pg=38&op=salvar">
  <div class="santander_banespa">
    <div class="titbanco">BANCO SANTANDER BANESPA</div>
    <div><img src="../paginas/boleto/imagens/<?=db_result($res_dtbnc,"imagem_dtbnc", 6);?>" alt="Banco" width="150" height="40" title="Banco" /></div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> C&oacute;digo Cliente:
      <input name="contacedente_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"contacedente_dtbnc", 6)?>" placeholder="Código do Cliente (PSK)">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Ponto de Venda:
      <input name="agencia_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"agencia_dtbnc", 6)?>" placeholder="Ag&ecirc;ncia">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Carteira:
      <input name="carteira_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"carteira_dtbnc", 6)?>" placeholder="Codigo da carteira ('102' Cobrança Simples - SEM Registro)">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Descrição da Carteira:
      <input name="desccarteira_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"desccarteira_dtbnc", 6)?>" placeholder="Descrição da carteira (COBRANÇA SIMPLES - CSR)">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Taxa do Boleto:
      <input name="txboleto_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"txboleto_dtbnc", 6)?>" placeholder="Valor da taxa de boleto. Ex: 2.50 (sem o R$)">
    </div>
    <? $Ativar_santanderbanespa = db_result($res_dtbnc,"status_dtbnc", 6)?>
    <div width="555" align="left" valign="middle" class="texto">Ativar Banco Santander Banespa: <br />
      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-success <? if($Ativar_santanderbanespa == "1"){ echo "active";} ?>">
          <input type="radio" value="1" name="status_dtbnc" <? if($Ativar_santanderbanespa == "1"){ echo "checked";} ?>>
          <? if($Ativar_santanderbanespa == "1"){ echo "*Ativado*";}else{echo "Ativar";} ?>
        </label>
        <label  class="btn btn-warning <? if($Ativar_santanderbanespa == "0"){ echo "active";} ?>">
          <input type="radio" value="0" name="status_dtbnc" <? if($Ativar_santanderbanespa == "0"){ echo "checked";} ?>>
          <? if($Ativar_santanderbanespa == "0"){ echo "*Desativado*";}else{echo "Desativar";} ?>
        </label>
      </div>
    </div>
  </div>
  <p>
    <input class="btn btn-primary" type="submit" name="Submit" value="Salvar" />
  </p>
</form>
<br>
<br>
<form name="form1" id="form1" method="post" novalidate="novalidate" action="?pg=38&op=salvar">
  <div class="hsbc">
    <div class="titbanco">BANCO HSBC</div>
    <div><img src="../paginas/boleto/imagens/<?=db_result($res_dtbnc,"imagem_dtbnc", 3);?>" alt="Banco" width="150" height="30" title="Banco" /></div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> C&oacute;digo Cedente:
      <input name="contacedente_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"contacedente_dtbnc", 3)?>" placeholder="Código do cedente">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Carteira:
      <input name="carteira_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"carteira_dtbnc", 3)?>" placeholder="Código da Carteira (CNR)">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Taxa do Boleto:
      <input name="txboleto_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"txboleto_dtbnc", 3)?>" placeholder="Valor da taxa de boleto. Ex: 2.50 (sem o R$)">
    </div>
    <? $Ativar_hsbc = db_result($res_dtbnc,"status_dtbnc", 3)?>
    <div width="555" align="left" valign="middle" class="texto">Ativar Banco HSBC: <br />
      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-success <? if($Ativar_hsbc == "1"){ echo "active";} ?>">
          <input type="radio" value="1" name="status_dtbnc" <? if($Ativar_hsbc == "1"){ echo "checked";} ?>>
          <? if($Ativar_hsbc == "1"){ echo "*Ativado*";}else{echo "Ativar";} ?>
        </label>
        <label  class="btn btn-warning <? if($Ativar_hsbc == "0"){ echo "active";} ?>">
          <input type="radio" value="0" name="status_dtbnc" <? if($Ativar_hsbc == "0"){ echo "checked";} ?>>
          <? if($Ativar_hsbc == "0"){ echo "*Desativado*";}else{echo "Desativar";} ?>
        </label>
      </div>
    </div>
  </div>
  <p>
    <input class="btn btn-primary" type="submit" name="Submit" value="Salvar" />
  </p>
</form>
<br>
<br>
<form name="form1" id="form1" method="post" novalidate="novalidate" action="?pg=38&op=salvar">
  <div class="bradesco">
    <div class="titbanco">BANCO BRADESCO</div>
    <div><img src="../paginas/boleto/imagens/<?=db_result($res_dtbnc,"imagem_dtbnc", 0);?>" alt="Banco" width="150" height="40" title="Banco" /></div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Agencia:
      <input name="agencia_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"agencia_dtbnc", 0)?>" placeholder="Num da agencia sem digito">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Agencia DV:
      <input name="digagencia_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"digagencia_dtbnc", 0)?>" placeholder="Digito da agencia">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Conta:
      <input name="conta_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"conta_dtbnc", 0)?>" placeholder="Num da conta sem digito">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Conta DV:
      <input name="digconta_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"digconta_dtbnc", 0)?>" placeholder="Digito do n&uacute;mero da conta">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Conta Cedente:
      <input name="contacedente_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"contacedente_dtbnc", 0)?>" placeholder="Conta Cedente, sem digito (Somente Números)">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Conta Cedente DV:
      <input name="digcontacedente_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"digcontacedente_dtbnc", 0)?>" placeholder="Digito da Conta Cedente">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Carteira:
      <input name="carteira_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"carteira_dtbnc", 0)?>" placeholder="Código da Carteira: pode ser 06 ou 03">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Taxa do Boleto:
      <input name="txboleto_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"txboleto_dtbnc", 0)?>" placeholder="Valor da taxa de boleto. Ex: 2.50 (sem o R$)">
    </div>
    <? $Ativar_bradesco = db_result($res_dtbnc,"status_dtbnc", 0)?>
    <div width="555" align="left" valign="middle" class="texto">Ativar Banco Bradesco: <br />
      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-success <? if($Ativar_bradesco == "1"){ echo "active";} ?>">
          <input type="radio" value="1" name="status_dtbnc" <? if($Ativar_bradesco == "1"){ echo "checked";} ?>>
          <? if($Ativar_bradesco == "1"){ echo "*Ativado*";}else{echo "Ativar";} ?>
        </label>
        <label  class="btn btn-warning <? if($Ativar_bradesco == "0"){ echo "active";} ?>">
          <input type="radio" value="0" name="status_dtbnc" <? if($Ativar_bradesco == "0"){ echo "checked";} ?>>
          <? if($Ativar_bradesco == "0"){ echo "*Desativado*";}else{echo "Desativar";} ?>
        </label>
      </div>
    </div>
  </div>
  <p>
    <input class="btn btn-primary" type="submit" name="Submit" value="Salvar" />
  </p>
</form>
<br>
<br>
<form name="form1" id="form1" method="post" novalidate="novalidate" action="?pg=38&op=salvar">
  <div class="bb">
    <div class="titbanco">BANCO DO BRASIL</div>
    <div><img src="../paginas/boleto/imagens/<?=db_result($res_dtbnc,"imagem_dtbnc", 1);?>" alt="Banco" width="150" height="40" title="Banco" /></div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Agência:
      <input name="agencia_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"agencia_dtbnc", 1)?>" placeholder="Num da agencia sem digito">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Conta:
      <input name="conta_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"conta_dtbnc", 1)?>" placeholder="Num da conta sem digito">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Convênio:
      <input name="convenio_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"convenio_dtbnc", 1)?>" placeholder="Num do convênio - REGRA: 6 ou 7 ou 8 dígitos">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Contrato:
      <input name="contrato_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"contrato_dtbnc", 1)?>" placeholder="Num do seu contrato">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Carteira:
      <input name="carteira_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<? if (db_result($res_dtbnc,"carteira_dtbnc", 1) == "") echo "value='18'"; else echo db_result($res_dtbnc,"carteira_dtbnc", 1);?>" placeholder="18">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Variação da Carteira:
      <input name="desccarteira_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"desccarteira_dtbnc", 1)?>" placeholder="Variação da Carteira, com traço (opcional) Ex: -019">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Formatação do Convênio:
      <input name="formatacao_convenio_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"formatacao_convenio_dtbnc", 1)?>" placeholder="REGRA: 8 p/ Convênio c/ 8 dígitos, 7 p/ Convênio c/ 7 dígitos, ou 6 se Convênio c/ 6 dígitos EX: 7">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Formatação do Nosso Número:
      <input name="formatacao_nosso_numero_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"formatacao_nosso_numero_dtbnc", 1)?>" placeholder="REGRA: Usado apenas p/ Convênio c/ 6 dígitos: 1 se for NossoNúmero de até 5 dígitos ou 2 para opção de até 17 dígitos - EX: 2">
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto"> Taxa do Boleto:
      <input name="txboleto_dtbnc" type="text" class="form-control" id="input_bnc" size="60" maxlength="60" value="<?=db_result($res_dtbnc,"txboleto_dtbnc", 1)?>" placeholder="Valor da taxa de boleto. Ex: 2.50 (sem o R$)">
    </div>
    <? $Ativar_bb = db_result($res_dtbnc,"status_dtbnc", 1)?>
    <div width="555" align="left" valign="middle" class="texto">Ativar Banco do Brasil: <br />
      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-success <? if($Ativar_bb == "1"){ echo "active";} ?>">
          <input type="radio" value="1" name="status_dtbnc" <? if($Ativar_bb == "1"){ echo "checked";} ?>>
          <? if($Ativar_bb == "1"){ echo "*Ativado*";}else{echo "Ativar";} ?>
        </label>
        <label  class="btn btn-warning <? if($Ativar_bb == "0"){ echo "active";} ?>">
          <input type="radio" value="0" name="status_dtbnc" <? if($Ativar_bb == "0"){ echo "checked";} ?>>
          <? if($Ativar_bb == "0"){ echo "*Desativado*";}else{echo "Desativar";} ?>
        </label>
      </div>
    </div>
  </div>
  <p>
    <input class="btn btn-primary" type="submit" name="Submit" value="Salvar" />
  </p>
</form>
