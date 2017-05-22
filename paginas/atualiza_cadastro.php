<? 
include_once "paginas/autentica.php";
$sql  = " SELECT *
		    FROM morador
		   WHERE cd_morador = ".$_SESSION['CD_MORADOR'];
$res  = db_query($sql);
$rows = db_num_rows($res);

if($_GET['opcao'] == "alterar"){
	$cd_morador	= $_GET['cd_morador'];
	$cd_morador	= $_SESSION['CD_MORADOR'];;
	$nr_lote = $_POST['nr_lote'];
	$nm_morador = $_POST['nm_morador'];									 									 	
	$ds_endereco = $_POST['ds_endereco'];
    $nr_endereco = $_POST['nr_endereco'];
    $ds_complemento = $_POST['ds_complemento'];
    $nm_bairro = $_POST['nm_bairro'];
    $nm_cidade = $_POST['nm_cidade'];
    $sg_uf = $_POST['sg_uf'];
    $nr_cep = $_POST['nr_cep'];
    $fone_morador = $_POST['fone_morador'];
    $nr_celular = $_POST['nr_celular'];
    $email_morador = $_POST['email_morador'];
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
	$dados_atualizados = 'S';
	$cd_cat_usuario = db_result($res,"cd_cat_usuario");

		
	$sql_existe_user = "SELECT login_usuario
						  FROM usuario
						 WHERE login_usuario = \"$login_usuario\"
						   AND senha_usuario = \"$senha_usuario\"
						 UNION
						SELECT login_usuario 
					   	  FROM morador
						 WHERE login_usuario = \"$login_usuario\"
						   AND senha_usuario = \"$senha_usuario\" 
						   AND cd_morador   <> \"$cd_morador\" ";
	$res_existe_user = mysql_query($sql_existe_user);
	
	if (! $res_existe_user){
		echo AlertSuccess("Erro pesquisar usu&aacute;rio!");
	}
	else{	
		//verificar se o usuario/senha j&aacute; existem
		if (@mysql_num_rows($res_existe_user) > 0){	
			echo AlertSuccess("Tente outro login e/ou senha!");
		}
		else{

			$sql_cad = " UPDATE morador SET nm_morador = \"$nm_morador\"									 									 	   ,ds_endereco = \"$ds_endereco\"
										   ,nr_endereco = \"$nr_endereco\"
										   ,ds_complemento = \"$ds_complemento\"
										   ,nm_bairro = \"$nm_bairro\"
										   ,nm_cidade = \"$nm_cidade\"
										   ,sg_uf = \"$sg_uf\"
										   ,nr_cep = \"$nr_cep\"
										   ,fone_morador = \"$fone_morador\"
										   ,nr_celular = \"$nr_celular\"
										   ,email_morador = \"$email_morador\"
										   ,login_usuario = \"$login_usuario\"
										   ,dados_atualizados = \"$dados_atualizados\"
										   ,cd_cat_usuario = \"$cd_cat_usuario\"

									  WHERE cd_morador = \"$cd_morador\" ";
			$res_cad = db_query($sql_cad);
			if($res_cad){
                                
				echo AlertSuccess("Dados atualizados com sucesso!");
			}
			else{
				echo AlertDanger("Erro ao alterar o morador!");
			}
		}
	}		
}



if($_GET['opcao'] != "alterar"){
	$nr_lote = db_result($res,"nr_lote");
	$nm_morador = db_result($res,"nm_morador");
	$ds_endereco = db_result($res,"ds_endereco");
	$nr_endereco = db_result($res,"nr_endereco");
	$ds_complemento = db_result($res,"ds_complemento");
	$nm_bairro = db_result($res,"nm_bairro");
	$nm_cidade = db_result($res,"nm_cidade");
	$sg_uf = db_result($res,"sg_uf");
	$nr_cep = db_result($res,"nr_cep");
	$fone_morador = db_result($res,"fone_morador");
	$nr_celular = db_result($res,"nr_celular");
	$email_morador = db_result($res,"email_morador");
	$login_usuario = db_result($res,"login_usuario");
	$senha_usuario = db_result($res,"senha_usuario");
	$cd_cat_usuario = db_result($res,"cd_cat_usuario");

}

?>
<script type="text/javascript">
	function checaCampos(){
		with (document.form1){

			if (email_morador.value == ""){
				alert("O campo e-mail nâo pode ficar em branco!");
				email_morador.focus();
				return false;
			}

		}
	}
</script>
<? if (db_result($res,"dados_atualizados") == "N"){
	echo AlertInfo("Necess&aacute;rio atualizar seus dados!");
}?>

<div>
<form action="?pg=18&opcao=alterar" method="post" name="form1" onsubmit="return checaCampos();">
  <div height="46" colspan="4" align="left" valign="middle" class="titulo"><b>
    <h2>Atualiza&ccedil;&atilde;o de Cadastro</h2>
    <hr>
  </div>
  <div width="136" height="25" align="left" valign="middle">Nome:&nbsp;</div>
  <div colspan="3" align="left" valign="middle">
    <input name="nm_morador" type="text" class="form-control" id="nm_morador"  value="<?= $nm_morador; ?>" size="47" maxlength="200" readonly="readonly"/>
  </div>
  
  <!-- SISTEMA SENHA -->
  <div width="136" height="25" align="left" valign="middle">Usu&aacute;rio:&nbsp;</div>
  <div style="500px">
    <div colspan="3" align="left" valign="middle" style="width:200px;">
      <input name="login_usuario" style="width:50%; float:left" type="text" class="form-control" id="login_usuario"  value="<?= $login_usuario; ?>" size="21" maxlength="20" readonly="readonly"/>
      <input name="senha_usuario" style="width:50%;" type="password" class="form-control" id="senha_usuario"  value="<?= $senha_usuario; ?>" size="21" maxlength="20" readonly="readonly"/>
    </div>
  </div>
  <!-- SISTEMA SENHA --> 
  
  <!-- SISTEMA ENDEREÇO -->
  <div style="width:auto">
    <div height="25" align="left" valign="middle" style="width:65%; float:left; min-width:170px;">Endere&ccedil;o:&nbsp;
      <input name="ds_endereco" type="text" class="form-control" id="ds_endereco"  value="<?= $ds_endereco; ?>"  maxlength="300"/>
    </div>
    <div width="136" style="width:10%; float:left; min-width:50px;" align="left" valign="middle">N&ordm;:&nbsp; <span class="texto">
      <input name="nr_endereco" type="text" class="form-control" id="nr_endereco" size="5" maxlength="6" value="<?= $nr_endereco; ?>"  onkeypress="return txtBoxFormat(this, '99999', event);"  />
      </span></div>
    <div height="25" align="left" valign="middle" class="texto" style="min-width:170px;">Compl.:&nbsp;
      <input name="ds_complemento" style="width:25%; min-width:170px;" type="text" class="form-control" id="ds_complemento"  value="<?= $ds_complemento; ?>" size="47" maxlength="20"/>
    </div>
    <div height="25" align="left" valign="middle" class="texto">Bairro:&nbsp;
      <input name="nm_bairro" type="text" class="form-control" id="nm_bairro"  value="<?= $nm_bairro; ?>" size="47" maxlength="20"/>
    </div>
  </div>
  <!-- FIM SISTEMA ENDEREO --> 
  
  <!-- SISTEMA CIDADE -->
  <div style="width:auto">
    <div height="25" align="left" valign="middle" class="texto" style="width:65%; float:left">Cidade:&nbsp;
      <input name="nm_cidade" type="text" class="form-control" id="nm_cidade"  value="<?= $nm_cidade; ?>" size="35" maxlength="50"/>
    </div>
    <div align="left" valign="middle"  class="texto" style="width:22%; float:left; min-width:100px;">UF:&nbsp;
      <select name="sg_uf" class="form-control" id="sg_uf"  >
        <option value="AC" <? if ($sg_uf == "AC"){ echo "selected"; } ?> >AC</option>
        <option value="AL" <? if ($sg_uf == "AL"){ echo "selected"; } ?> >AL</option>
        <option value="AM" <? if ($sg_uf == "AM"){ echo "selected"; } ?> >AM</option>
        <option value="AP" <? if ($sg_uf == "AP"){ echo "selected"; } ?> >AP</option>
        <option value="BA" <? if ($sg_uf == "BA"){ echo "selected"; } ?> >BA</option>
        <option value="CE" <? if ($sg_uf == "CE"){ echo "selected"; } ?> >CE</option>
        <option value="DF" <? if ($sg_uf == "DF"){ echo "selected"; } ?> >DF</option>
        <option value="ES" <? if ($sg_uf == "ES"){ echo "selected"; } ?> >ES</option>
        <option value="GO" <? if ($sg_uf == "GO"){ echo "selected"; } ?> >GO</option>
        <option value="MA" <? if ($sg_uf == "MA"){ echo "selected"; } ?> >MA</option>
        <option value="MG" <? if ($sg_uf == "MG"){ echo "selected"; } ?> >MG</option>
        <option value="MS" <? if ($sg_uf == "MS"){ echo "selected"; } ?> >MS</option>
        <option value="MT" <? if ($sg_uf == "MT"){ echo "selected"; } ?> >MT</option>
        <option value="PA" <? if ($sg_uf == "PA"){ echo "selected"; } ?> >PA</option>
        <option value="PB" <? if ($sg_uf == "PB"){ echo "selected"; } ?> >PB</option>
        <option value="PE" <? if ($sg_uf == "PE"){ echo "selected"; } ?> >PE</option>
        <option value="PI" <? if ($sg_uf == "PI"){ echo "selected"; } ?> >PI</option>
        <option value="PR" <? if ($sg_uf == "PR"){ echo "selected"; } ?> >PR</option>
        <option value="RJ" <? if ($sg_uf == "RJ"){ echo "selected"; } ?> >RJ</option>
        <option value="RN" <? if ($sg_uf == "RN"){ echo "selected"; } ?> >RN</option>
        <option value="RO" <? if ($sg_uf == "RO"){ echo "selected"; } ?> >RO</option>
        <option value="RR" <? if ($sg_uf == "RR"){ echo "selected"; } ?> >RR</option>
        <option value="RS" <? if ($sg_uf == "RS"){ echo "selected"; } ?> >RS</option>
        <option value="SC" <? if ($sg_uf == "SC"){ echo "selected"; } ?> >SC</option>
        <option value="SE" <? if ($sg_uf == "SE"){ echo "selected"; } ?> >SE</option>
        <option value="SP" <? if ($sg_uf == "SP"){ echo "selected"; } ?> >SP</option>
        <option value="TO" <? if ($sg_uf == "TO"){ echo "selected"; } ?> >TO</option>
      </select>
    </div>
    <div height="25" align="left" valign="middle" class="texto">CEP:&nbsp;
      <input name="nr_cep" type="text" style="width:13%; min-width:100px;" class="form-control" id="nr_cep" size="9" maxlength="9" value="<?= $nr_cep; ?>"  onkeypress="return txtBoxFormat(this, '99999-999', event);"/>
      </span></div>
  </div>
  <!-- FIM SISTEMA CIDADE --> 
  
  <!-- SISTEMA EMAIL -->
  <div style="width:auto">
    <div height="25" align="left" style="width:20%; float:left; min-width:110px;" valign="middle" class="texto">Telefone:&nbsp;
      <input name="fone_morador" style="width:100%; float:left; min-width:110px;" type="text" class="form-control" id="fone_morador" size="13" maxlength="13" value="<?= $fone_morador; ?>"  onkeypress="return txtBoxFormat(this, '(99)9999-9999', event);" />
      &nbsp;</div>
    <div height="25" align="left" style="width:20%; float:left; min-width:110px;" valign="middle" class="texto">Celular:&nbsp;
      <input name="nr_celular" type="text" style="width:100%; float:left; min-width:110px;" class="form-control" id="nr_celular" size="14" maxlength="14" value="<?= $nr_celular; ?>"  onkeypress="return txtBoxFormat(this, '(99)99999-9999', event);" />
      &nbsp;</div>
    &nbsp;<br />
    <div class="form-group input-group" ><span class="input-group-addon">@</span>
      <input type="text" style="width:100%; min-width:200px;" class="form-control" name="email_morador" id="email_morador"  value="<?= $email_morador; ?>" required="required">
    </div>
  </div>
  <!-- FIM SISTEMA EMAIL -->
  
  <div height="47" colspan="4" align="left" valign="middle">
    <input name="button" type="submit" class="btn btn-primary" id="button" value="Salvar " />
  </div>
  <div height="61" align="center" valign="middle" class="texto">
    <div>
      <?= $msg; ?>
    </div>
  </div>
</form>

<div>
<? include_once "envio_imagem.php"; ?>
</div>
</div>
