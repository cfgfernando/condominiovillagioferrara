<?
if($logado!="online"){
if($_GET['opcao'] == "login"){
	$login_usuario = $_POST['login_usuario'];
	$senha_usuario = md5($_POST['senha_usuario']);
	$msg = "";
	
	if($login_usuario == "")
		echo AlertDanger("Favor preencher o campo login!");
	if($senha_usuario == "")
		echo AlertDanger("Favor preencher o campo senha!");
	
	if($msg == ""){
		$sql = " SELECT *
				   FROM  funcionario ,usuario_categoria
				  WHERE funcionario.login_usuario = \"$login_usuario\"
					AND funcionario.senha_usuario = \"$senha_usuario\"
					AND usuario_categoria.cd_cat_usuario = \"3\" ";
		$res = mysql_query($sql);
		
		if(mysql_num_rows($res) == 0){
			$sql  = " SELECT *
						FROM morador
							,usuario_categoria
					   WHERE morador.login_usuario = \"$login_usuario\"
						 AND morador.senha_usuario = \"$senha_usuario\"
					   	 AND usuario_categoria.cd_cat_usuario = \"4\" "; 
			$res  = mysql_query($sql);
			$rows = mysql_num_rows($res);
			
			if(mysql_num_rows($res) == 0){
				echo AlertDanger("Login e/ou usuário não conferem!");
				$msg = "1";
				
			}
			else{
				$CD_MORADOR = db_result($res,"cd_morador");
				
				$_SESSION['CD_MORADOR']	= $CD_MORADOR;
							
				$dados_atualizados = db_result($res,"dados_atualizados");
				//echo "Resultado ".$dados_atualizados;
				
			}
		}
		else{
			$CD_FUNC = mysql_result($res,"cd_func");
			echo mysql_result($res,"cd_func");
			$dados_atualizados = db_result($res,"dados_atualizados");
			$_SESSION['CD_FUNC']	= $CD_FUNC;
		}
		
		if($msg == ""){
			$CD_CAT_USUARIO = mysql_result($res,0);
			$CD_FUNC = db_result($res,"cd_func");
			//$LOGIN_USUARIO = mysql_result($res,0);
			//$DS_USUARIO = mysql_result($res,0);
			//sleep (50);
			session_cache_expire(90); //90 minutos
			
			$_SESSION['CD_CAT_USUARIO'] = $CD_CAT_USUARIO;
			$_SESSION['CD_FUNC']	= $CD_FUNC;
			//$_SESSION['LOGIN_USUARIO'] = $LOGIN_USUARIO;
			//$_SESSION['DS_USUARIO'] 	= $DS_USUARIO;
			
			if ($dados_atualizados == "N"){
				$codigoMorador=$CD_MORADOR;
				RedirecionaRapido("?pg=18");

			}
			else{
				$codigoMorador=$CD_MORADOR;
				RedirecionaRapido("?pg=0");
				
			} 
		}
	}
}

?>
<script type="text/javascript">
	function checaCampos(){
		with(document.form_login){
			if(login_usuario.value == ""){
				alert('Favor inserir o login!');
				login_usuario.focus();
				return false;
			}
			if(senha_usuario.value == ""){
				alert('Favor inserir a senha!');
				senha_usuario.focus();
				return false;
			}
		}
	}
</script>
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>

<div align="center" style="width:100%">
<form action="?pg=1&opcao=login" method="post" name="form_login" onsubmit="return checaCampos();">
	<div border="0" style="width:200px;" class="logintable" cellpadding="0" cellspacing="0" >

			  <div>&nbsp;<br/>&nbsp;<br/>&nbsp;</div>
              <div class="form-group input-group">
              <span class="input-group-addon">Login&nbsp;</span>
              <input placeholder="CPF" width="200" name="login_usuario" id="login_usuario" type="text" class="form-control" onkeypress="return txtBoxFormat(this, '999.999.999-99', event);" maxlength="14"></div>
				<div class="form-group input-group">
              <span class="input-group-addon">Senha</span>
              <input width="200" name="senha_usuario" id="senha_usuario" type="password" class="form-control"></div>

             <div colspan="2" align="center" valign="middle"><input name="button" type="submit" class="btn btn-primary" id="button" value="  Entrar  " />
              </div>
              <div height="43" colspan="4" align="center"><a href="?pg=20">Criar Conta!</a></br></div>
				<div height="43" colspan="4" align="center"><a href="?pg=6">Esqueci a senha!</a></br></div>
              <? $msg= "Efetue Login";
	     if ($msg != "Efetue Login"){ 
	  ?>

      <div height="18" colspan="3" align="center" valign="middle" class="texto"><?= $msg; ?></div>

      <?
      }else{ echo "<div><div>&nbsp;</div></div>";}
	  ?> 
          </div>
	</form>
    </div>
    <? }  else {
		RedirecionaRapido("?pg=0");
	}?>