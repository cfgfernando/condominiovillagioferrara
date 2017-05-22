<? 
include_once "paginas/autenticacao.php";
if($_GET['opcao'] == "cadastrar"){
	$cd_morador	= $_POST['cd_morador'];
	$nm_morador = $_POST['nm_morador'];
	$email_morador = $_POST['email_morador'];
	$fone_morador = $_POST['fone_morador'];
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
	$cd_cat_usuario = (integer)$_POST['cd_cat_usuario'];
	
	
	$login_usuario = $_POST['login_usuario_cpf'];
	$senha_usuario = md5($_POST['senha_usuario_cpf']);
	
	$dados_atualizados = "N";
	
	$tbmfuncionario = $_POST['tbmfuncionario'];
	$cargo_func = $_POST['cargo_func'];
	$nivel_func = $_POST['nivel_func'];

	if (ValidaCPF($login_usuario)){
	$sql_existe_user = "SELECT login_usuario
						  FROM funcionario
						 WHERE login_usuario = \"$login_usuario\"
						 UNION
						SELECT login_usuario 
					   	  FROM morador
						 WHERE login_usuario = \"$login_usuario\" ";
	$res_existe_user = mysql_query($sql_existe_user);
	
	if (! $res_existe_user){
		echo AlertDanger("Erro pesquisar usuário!");
	}
	else{	
		//verificar se o usuario/senha já existem
		if (@mysql_num_rows($res_existe_user) > 0){	
			echo AlertDanger("Este Login/Usu&aacute;rio j&aacute; existe!");
		}
		else{
			$sql_cad = " INSERT INTO morador (nm_morador
											 ,ds_endereco
											 ,nr_endereco
											 ,ds_complemento
											 ,nm_bairro
											 ,nm_cidade
											 ,sg_uf
											 ,nr_cep
											 ,fone_morador
											 ,nr_celular
											 ,email_morador
											 ,login_usuario
											 ,senha_usuario
											 ,dados_atualizados
											 ,cd_cat_usuario
											 ,tbmfuncionario)
									  VALUES (\"$nm_morador\"
									  		 ,\"$ds_endereco\"
											 ,\"$nr_endereco\"
											 ,\"$ds_complemento\"
											 ,\"$nm_bairro\"
											 ,\"$nm_cidade\"
											 ,\"$sg_uf\"
											 ,\"$nr_cep\"
											 ,\"$fone_morador\"
											 ,\"$nr_celular\"
											 ,\"$email_morador\"
											 ,\"$login_usuario\"
											 ,\"$senha_usuario\"
											 ,\"$dados_atualizados\"
											 ,\"$cd_cat_usuario\"
											 ,\"$tbmfuncionario\") ";
			$res_cad = db_query($sql_cad) or die('Erro morador'. db_error());
			$pegaval = db_query("SELECT * FROM morador ORDER BY cd_morador DESC");
			$val = db_result($pegaval, 'cd_morador');
			echo $val."<br>";
			if($tbmfuncionario == 1){
				$cadastrafunc = db_query( "INSERT INTO funcionario (nm_func
													, cargo_func
													, fone_func
													, email_func
													, login_usuario
													, senha_usuario
													, cd_cat_usuario
													, tbmmorador) 
													VALUES('$nm_morador'
													, '$cargo_func'
													, '$nr_celular'
													, '$email_morador'
													, '-$login_usuario-'
													, '$senha_usuario'
													, '$nivel_func'
													, '$val')"
													 ) or die('Erro funcionario '. db_error());	
			}
			if($res_cad){
				echo AlertSuccess("<b>Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=31");
			}	
			else{
				echo AlertDanger("Erro ao cadastrar o registro!");
			}
		}		
	}
	} else {
		echo AlertDanger("CPF inv&aacute;lido!");
	}
}

if($_GET['opcao'] == "excluir"){
	$cd_morador = $_GET['cd_morador'];
	if ($cd_morador != 1){
	$sql_del = " DELETE FROM morador WHERE cd_morador = \"$cd_morador\" ";
	$sql_del2 = " DELETE FROM funcionario WHERE tbmmorador = \"$cd_morador\" ";
	$res_del = db_query($sql_del);
	$res_del2 = db_query($sql_del2);
	if($res_del){
		echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=31");
	}
	else
		echo AlertDanger("Erro ao alterar o registro!");
}else{
	echo AlertDanger("Imposs&iacute;vel deletar o <b>Administrador</b> padr&atilde;o!");
}
}

$sql  = " SELECT *
		    FROM morador
		   ORDER BY nm_morador ASC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

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

<div>
  <form action="?pg=31&opcao=cadastrar" method="post" name="form1" onSubmit="return checaCampos();">
    <div height="19" colspan="6" align="center" valign="middle" class="titulo">
      <h2>- Usu&aacute;rios -</h2>
    </div>
    <div height="19" colspan="6" align="center" valign="middle" class="texto">
      <?= $msg; ?>
    </div>
    <div width="136" height="25" align="left" valign="middle">Nome:&nbsp;</div>
    <div colspan="3" align="left" valign="middle">
      <input name="nm_morador" type="text" class="form-control" id="nm_morador"  size="250" maxlength="250" required="required"/>
    </div>
    
    <!-- SISTEMA SENHA -->
    <div width="136" height="25" align="left" valign="middle">Usu&aacute;rio:&nbsp;</div>
    <div style="500px">
      <div class="form-group input-group" style="width:50%; float:left;"> <span class="input-group-addon">CPF</span>
        <input autocomplete="off" name="login_usuario_cpf" id="login_usuario_cpf" type="text" style="width:100%;" class="form-control" onkeypress="return txtBoxFormat(this, '999.999.999-99', event);" maxlength="14" required="required">
      </div>
      <div class="form-group input-group" style="width:50%;"> <span class="input-group-addon">Senha</span>
        <input autocomplete="off" name="senha_usuario_cpf" id="senha_usuario_cpf" type="password" style="width:100%;" class="form-control" required="required">
      </div>
    </div>
    <!-- SISTEMA SENHA --> 
    
    <!-- SISTEMA ENDEREÇO -->
    <div style="width:auto">
      <div height="25" align="left" valign="middle" style="width:65%; float:left">Endere&ccedil;o:&nbsp;
        <input name="ds_endereco" type="text" class="form-control" id="ds_endereco"   size="35" maxlength="50"/>
      </div>
      <div width="136" style="width:10%; float:left" align="left" valign="middle">N&ordm;:&nbsp; <span class="texto">
        <input name="nr_endereco" type="text" class="form-control" id="nr_endereco" size="5" maxlength="6"   onkeypress="return txtBoxFormat(this, '99999', event);"  />
        </span></div>
      <div height="25" align="left" valign="middle" class="texto">Compl.:&nbsp;
        <input name="ds_complemento" style="width:25%" type="text" class="form-control" id="ds_complemento"  v size="47" maxlength="20"/>
      </div>
      <div height="25" align="left" valign="middle" class="texto">Bairro:&nbsp;
        <input name="nm_bairro" type="text" class="form-control" id="nm_bairro"  size="47" maxlength="20"/>
      </div>
    </div>
    <!-- FIM SISTEMA ENDEREO --> 
    
    <!-- SISTEMA CIDADE -->
    <div style="width:auto">
      <div height="25" align="left" valign="middle" class="texto" style="width:65%; float:left">Cidade:&nbsp;
        <input name="nm_cidade" type="text" class="form-control" id="nm_cidade"  size="35" maxlength="20"/>
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
        <input name="nr_cep" type="text" style="width:15%;" class="form-control" id="nr_cep" size="9" maxlength="9" onkeypress="return txtBoxFormat(this, '99999-999', event);"/>
        </span></div>
    </div>
    <!-- FIM SISTEMA CIDADE --> 
    
    <!-- SISTEMA EMAIL -->
    <div style="width:auto">
      <div height="25" align="left" style="width:20%; float:left" valign="middle" class="texto">Telefone:&nbsp;
        <input name="fone_morador" style="width:100%; float:left" type="text" class="form-control" id="fone_morador" size="13" maxlength="13" onkeypress="return txtBoxFormat(this, '(99)9999-9999', event);" />
        &nbsp;</div>
      <div height="25" align="left" style="width:20%; float:left" valign="middle" class="texto">Celular:&nbsp;
        <input name="nr_celular" type="text" style="width:100%; float:left" class="form-control" id="nr_celular" size="14" maxlength="14" onkeypress="return txtBoxFormat(this, '(99)99999-9999', event);" />
        &nbsp;</div>
      &nbsp;<br />
      <div class="form-group input-group" ><span class="input-group-addon">@</span>
        <input type="text" style="width:100%;" class="form-control" name="email_morador" id="email_morador" required="required">
      </div>
    </div>
    <hr />
    <div align="left"><font color="#FF0000"><b>Morador e Funcion&aacute;rio</b></font></div>
    <!-- TIPO DE USUARIO -->
    <? if (db_result($res5,"cd_morador")== 1){ ?>
    <div>Tipo de Usu&aacute;rio:</div>
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success active">
        <input type="radio" value="5" name="cd_cat_usuario" id="option1" checked="checked">
        Morador </label>
      <label class="btn btn-warning">
        <input type="radio" value="4" name="cd_cat_usuario" id="option2" >
        Administrador </label>
    </div>
    <? } else {?>
    	<input type="hidden" value="5" name="cd_cat_usuario" id="option2" >
    <? } ?>
    
    <!-- FIM TIPO DE USUARIO -->
    <div> <br />O Morador &eacute; funcion&aacute;rio: <input name="tbmfuncionario" type="checkbox" value="1" /></div>
    <div height="23" align="left" valign="middle" class="texto">Se for funcion&aacute;rio, inserir cargo:
    <input name="cargo_func" type="text" class="form-control" id="cargo_func" size="80">
  </div>
  <div>Selecione o n&iacute;vel do Funcion&aacute;rio:</div>
			<div class="btn-group" data-toggle="buttons">
			  <label class="btn btn-success active">
				<input type="radio" value="2" name="nivel_func" checked="checked"> Outros
			  </label>
			  <label class="btn btn-danger">
				<input type="radio" value="3" name="nivel_func"> Portaria
			  </label>
			</div>
  <div>&nbsp;</div>
    <div height="40" colspan="6" align="center" valign="middle" class="texto">
      <input name="button" type="submit" class="btn btn-default" id="button" value="  Cadastrar Morador  ">
    </div>
    
    <div>&nbsp;</div>
  </form>
  <div height="98" colspan="6" valign="top">
    <?
        if($rows == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!");
		}
		else{
		?>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">Total de moradores cadastrados:
      <?= $rows; ?>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <!-- TÍTULO DA COLUNA DE CADA TABELA -->
          <thead>
            <tr>
              <th>Nome</th>
              <th>CPF</th>
              <th>E-mail</th>
              <th>Telefone</th>
              <th>Editar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
          
          <!-- IMPRESSÃO DA TABELA -->
          <tbody>
            <!-- CORPO DA TABELA -->
            <? for ($i=0; $i<$rows; $i++){ ?>
            <tr class="odd gradeX">
              <td><?= db_result($res,"nm_morador", $i); ?></td>
              <td><?= db_result($res,"login_usuario", $i); ?></td>
              <td><?= db_result($res,"email_morador", $i); ?></td>
              <td><? if (db_result($res,"fone_morador", $i) != "" and db_result($res,"nr_celular", $i) != ""){
				  	$separador = "/";
				  }
				  else{
				  	$separador = "";
				  }
				  
				  echo db_result($res,"fone_morador", $i).$separador.db_result($res,"nr_celular", $i); ?></td>
              <td class="center" align="center"><?
			   if (db_result($res5,"cd_morador")!= 1 && db_result($res,"cd_cat_usuario",$i) != 4) {
			    echo "<a href='?pg=20&cd_morador=".db_result($res,"cd_morador",$i)."'>
				<img src='paginas/imagens/editar.png' alt='Alterar esta enquete' width='25' height='25' border='0'></a>";
				} elseif (db_result($res5,"cd_morador")== 1){
				echo "<a href='?pg=20&cd_morador=".db_result($res,"cd_morador",$i)."'>
				<img src='paginas/imagens/editar.png' alt='Alterar esta enquete' width='25' height='25' border='0'></a>";	
				} elseif (db_result($res5,"cd_morador")!= 1 && db_result($res,"cd_morador",$i) == db_result($res5,"cd_morador")){
					echo "<a href='?pg=20&cd_morador=".db_result($res,"cd_morador",$i)."'>
				<img src='paginas/imagens/editar.png' alt='Alterar esta enquete' width='25' height='25' border='0'></a>";
				}else {
					echo "<img src='paginas/imagens/admin.png' alt='Excluir esta enquete' width='25' height='25' border='0'>";
				}
				?>
                </td>
              
              
              
              
              
              <td class="center" align="center"><?
			  if (db_result($res,'cd_cat_usuario',$i)==4){ $imagemicone= "del_admin.png";}else{$imagemicone="del_user.png";}
              if (db_result($res5,"cd_morador")!= 1 && db_result($res,"cd_cat_usuario",$i) != 4) {
					  echo "<a href='?pg=31&opcao=excluir&cd_morador=".db_result($res,'cd_morador',$i)."'><img src='paginas/imagens/".$imagemicone."' alt='Excluir esta enquete' width='25' height='25' border='0'></a>";
				} elseif (db_result($res5,"cd_morador")== 1 && db_result($res5,"cd_morador") != db_result($res,'cd_morador',$i)){
					echo "<a href='?pg=31&opcao=excluir&cd_morador=".db_result($res,'cd_morador',$i)."'><img src='paginas/imagens/".$imagemicone."' alt='Excluir esta enquete' width='25' height='25' border='0'></a>";
				} else {
					echo "<img src='paginas/imagens/admin.png' alt='Excluir esta enquete' width='25' height='25' border='0'>";
				}?></td>
            </tr>
            <? } ?>
            <!-- CORPO DA TABELA -->
          </tbody>
          <!-- IMPRESSÃO DA TABELA -->
        </table>
      </div>
    </div>
  </div>
  <? } ?>
</div>
