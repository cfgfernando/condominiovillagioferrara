<? 
include_once "paginas/autenticacao.php";

if($_GET['opcao'] == "alterar"){
	$cd_morador	= $_GET['cd_morador'];
	$nr_lote = $_POST['nr_lote'];
	$nm_morador = $_POST['nm_morador'];									 									 	$ds_endereco = $_POST['ds_endereco'];
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
	$cd_cat_usuario = $_POST['cd_cat_usuario'];
	
	if ($cd_morador == 1){
		$cd_cat_usuario == 4;
	}
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
		echo AlertDanger("Erro pesquisar usuário!");
	}
	else{	
		//verificar se o usuario/senha já existem
		if (@mysql_num_rows($res_existe_user) > 0){	
			echo AlertDanger("Tente outro login e/ou senha!");
		}
		else{

			$sql_cad = " UPDATE morador SET nm_morador = \"$nm_morador\"									 									 		,ds_endereco = \"$ds_endereco\"
										   ,nr_endereco = \"$nr_endereco\"
										   ,ds_complemento = \"$ds_complemento\"
										   ,nm_bairro = \"$nm_bairro\"
										   ,nm_cidade = \"$nm_cidade\"
										   ,sg_uf = \"$sg_uf\"
										   ,nr_cep = \"$nr_cep\"
										   ,fone_morador = \"$fone_morador\"
										   ,nr_celular = \"$nr_celular\"
										   ,email_morador = \"$email_morador\"
										   ,cd_cat_usuario	= \"$cd_cat_usuario\"					 
									  WHERE cd_morador = \"$cd_morador\" ";
			$res_cad = db_query($sql_cad);
			if($res_cad){
				echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=31");
			}
			else{
				echo AlertDanger("Erro ao alterar o registro!");
			}
		}
	}
}

$sql  = " SELECT *
		    FROM morador
		   WHERE cd_morador = ".$_GET['cd_morador'];
$res  = db_query($sql);
$rows = db_num_rows($res);

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
	$cd_cat_usuario= db_result($res,"cd_cat_usuario");
}

?>
<script type="text/javascript">
	function checaCampos(){
		with (document.form1){

			if (login_usuario.value == ""){
				alert("É necessário preencher o campo Login!");
				login_usuario.focus();
				return false;
			}

			if (senha_usuario.value == ""){
				alert("É necessário preencher o campo Senha!");
				senha_usuario.focus();
				return false;
			}

		}
	}
</script>

<form action="?pg=20&opcao=alterar&cd_morador=<?= $_GET['cd_morador']; ?>" method="post" name="form1" onSubmit="return checaCampos();">
          <div height="19" colspan="6" align="center" valign="middle" class="titulo">
            <h2>- Editar Usu&aacute;rio-</h2></div>
          <div height="19" colspan="6" align="center" valign="middle" class="texto"><?= $msg; ?></div>
         <div width="136" height="25" align="left" valign="middle">Nome:&nbsp;</div>
  <div colspan="3" align="left" valign="middle">
    <input name="nm_morador" type="text" class="form-control" id="nm_morador"  value="<?= $nm_morador; ?>" size="47" maxlength="20"/>
  </div>
  
  <!-- SISTEMA SENHA -->
  <div width="136" height="25" align="left" valign="middle">Usu&aacute;rio:&nbsp;</div>
  <div style="500px">
    <div colspan="3" align="left" valign="middle" style="width:200px;">
      <input name="login_usuario" style="width:100%;" type="text" class="form-control" id="login_usuario"  value="<?= db_result($res,"login_usuario");; ?>" size="21" maxlength="20" readonly="readonly"/>
	</div>
	</div>
 <!-- SISTEMA SENHA -->
  
  <!-- SISTEMA ENDEREÇO -->
  <div style="width:auto">
    <div height="25" align="left" valign="middle" style="width:65%; float:left">Endere&ccedil;o:&nbsp;
      <input name="ds_endereco" type="text" class="form-control" id="ds_endereco"  value="<?= $ds_endereco; ?>" size="35" maxlength="50"/>
    </div>
    <div width="136" style="width:10%; float:left" align="left" valign="middle">N&ordm;:&nbsp; <span class="texto">
      <input name="nr_endereco" type="text" class="form-control" id="nr_endereco" size="5" maxlength="6" value="<?= $nr_endereco; ?>"  onkeypress="return txtBoxFormat(this, '99999', event);"  />
      </span></div>
    <div height="25" align="left" valign="middle" class="texto">Compl.:&nbsp;
      <input name="ds_complemento" style="width:25%" type="text" class="form-control" id="ds_complemento"  value="<?= $ds_complemento; ?>" size="47" maxlength="20"/>
    </div>
    <div height="25" align="left" valign="middle" class="texto">Bairro:&nbsp;
      <input name="nm_bairro" type="text" class="form-control" id="nm_bairro"  value="<?= $nm_bairro; ?>" size="47" maxlength="20"/>
    </div>
  </div>
  <!-- FIM SISTEMA ENDEREO --> 
  
  <!-- SISTEMA CIDADE -->
  <div style="width:auto">
    <div height="25" align="left" valign="middle" class="texto" style="width:65%; float:left">Cidade:&nbsp;
      <input name="nm_cidade" type="text" class="form-control" id="nm_cidade"  value="<?= $nm_cidade; ?>" size="35" maxlength="20"/>
    </div>
    <div align="left" valign="middle"  class="texto" style="width:20%; float:left">UF:&nbsp;
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
      <input name="nr_cep" type="text" style="width:133px;" class="form-control" id="nr_cep" size="9" maxlength="9" value="<?= $nr_cep; ?>"  onkeypress="return txtBoxFormat(this, '99999-999', event);"/>
      </span></div>
  </div>
  <!-- FIM SISTEMA CIDADE --> 
  
  <!-- SISTEMA EMAIL -->
  <div style="width:auto">
    <div height="25" align="left" style="width:20%; float:left" valign="middle" class="texto">Telefone:&nbsp;
      <input name="fone_morador" style="width:100%; float:left" type="text" class="form-control" id="fone_morador" size="13" maxlength="13" value="<?= $fone_morador; ?>"  onkeypress="return txtBoxFormat(this, '(99)9999-9999', event);" />
      &nbsp;</div>
    <div height="25" align="left" style="width:20%; float:left" valign="middle" class="texto">Celular:&nbsp;
      <input name="nr_celular" type="text" style="width:100%; float:left" class="form-control" id="nr_celular" size="14" maxlength="14" value="<?= $nr_celular; ?>"  onkeypress="return txtBoxFormat(this, '(99)99999-9999', event);" />
      &nbsp;</div>
    &nbsp;<br />
    <div class="form-group input-group" ><span class="input-group-addon">@</span>
      <input type="text" style="width:100%;" class="form-control" name="email_morador" id="email_morador"  value="<?= $email_morador; ?>">
    </div>
  </div>
  <? if (db_result($res5,"cd_morador")== 1 && db_result($res5,"cd_morador") != db_result($res,"cd_morador")){?>
  <div>Tipo de Usu&aacute;rio: </div>
  <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-success <? if($cd_cat_usuario == "5"){ echo "active";} ?>">
      <input type="radio" value="5" name="cd_cat_usuario" id="option1" <? if($cd_cat_usuario == "5"){ echo "checked";} ?>>
      <? if($cd_cat_usuario == "5"){ echo "*Morador*";}else{echo "Morador";} ?> </label>
      
    <label  class="btn btn-warning <? if($cd_cat_usuario == "4"){ echo "active";} ?>">
      <input type="radio" value="4" name="cd_cat_usuario" id="option2" <? if($cd_cat_usuario == "4"){ echo "checked";} ?>>
      <? if($cd_cat_usuario == "4"){ echo "*Administrador*";}else{echo "Administrador";} ?> </label>
      
   <? } else { ?>
   		<? if (db_result($res5,"cd_morador")== 4){?>
      <input type="hidden" name="cd_cat_usuario" value="4" >
      <? }else{ ?>
      <input type="hidden" name="cd_cat_usuario" value="5" >
  <?
	  }
  }?>
  </div>
         <div height="40" colspan="6" align="center" valign="middle" class="texto"><input name="button" type="submit" class="btn btn-outline-success" id="button" value="  Alterar Morador  "></div>
</form>
