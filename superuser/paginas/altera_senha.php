<?php
include_once "paginas/autenticacao.php";

if (isset($_POST['bt_alterar'])){
	$cd_morador = $_SESSION['CD_MORADOR'];
	$cd_usuario = $_SESSION['CD_USUARIO'];

	$senha_atual = md5($_POST['senha_atual']);
	$login_usuario = $_POST['login_usuario'];
	$senha_usuario = md5($_POST['senha_usuario']);	
	$confirma_senha = md5($_POST['confirma_senha']);
	
	if ($cd_morador != ""){
		$sql_verifica = " SELECT login_usuario 
							FROM morador
						   WHERE login_usuario = \"$login_usuario\"
							 AND senha_usuario = \"$senha_atual\" 
							 AND cd_morador    = \"$cd_morador\" "; 

		$sql_existe_user = "SELECT login_usuario 
							  FROM morador
							 WHERE login_usuario = \"$login_usuario\"
							   AND senha_usuario = \"$senha_usuario\" 
							   AND cd_morador   <> \"$cd_morador\" ";

		$sql_upd = " UPDATE morador SET login_usuario = \"$login_usuario\"
									   ,senha_usuario = \"$senha_usuario\"								 
								  WHERE cd_morador = \"$cd_morador\" ";
		
	}
	elseif ($cd_usuario != ""){
		$sql_verifica = "SELECT login_usuario
					  	   FROM funcionario
					      WHERE login_usuario = \"$login_usuario\"
					        AND senha_usuario = \"$senha_atual\"
					        AND cd_usuario   = \"$cd_usuario\" ";

		$sql_existe_user = "SELECT login_usuario
							  FROM funcionario
							 WHERE login_usuario = \"$login_usuario\"
							   AND senha_usuario = \"$senha_usuario\"
							   AND cd_usuario <> \"$cd_usuario\" ";

		$sql_upd = " UPDATE funcionario SET login_usuario = \"$login_usuario\"
									   ,senha_usuario = \"$senha_usuario\"								 
								  WHERE cd_usuario = \"$cd_usuario\" ";
							
	}
	else{
		$sql_verifica = " SELECT login_usuario 
							FROM funcionario
						   WHERE 1 <> 1 ";
	}
		
	//executa a verificação
	$res_verifica = mysql_query($sql_verifica);
	
	if (! $res_verifica){
		echo AlertDanger("Erro ao verificar usuário!");
	}
	else{	
		//verificar se o usuario/senha são válidos
		if (@mysql_num_rows($res_verifica) > 0){	

			//executa a validação
			$res_existe_user = mysql_query($sql_existe_user);
			
			if (! $res_existe_user){
				echo AlertDanger("Erro ao pesquisar usuário!");
			}
			else{	
				//verificar se o usuario/senha já existem
				if (@mysql_num_rows($res_existe_user) > 0){	
					echo AlertDanger("Tente outro login e/ou senha!");
				}
				else{
					//executa o update
					$res_upd = mysql_query($sql_upd);
					
					if($res_upd){
						echo AlertSuccess("Senha alterada com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
						Redireciona("index.php");
					}
					else{
						echo AlertDanger("Erro ao atualizar os dados!</font>");
					}
				}
			}
		}
		else{
			echo AlertWarning("Usuário e/ou senha inválido(s)");
		}			
	}
}
if($_SESSION['CD_MORADOR']){
$sql  = " SELECT *
		    FROM morador
		   WHERE cd_morador = ".$_SESSION['CD_MORADOR'];
$res  = db_query($sql);
$valor = db_result($res,"login_usuario");
}
elseif($_SESSION['CD_USUARIO']){
$sql  = " SELECT *
		    FROM usuario
		   WHERE cd_usuario = ".$_SESSION['CD_USUARIO'];
$res  = db_query($sql);
$valor = db_result($res,"login_usuario");
}
else{

}
?>
<script>
	function checaDados(){
		with(document.form1){
			if (login_usuario.value == ""){
				alert("Favor preencher o campo login!");
				login_usuario.focus();
				return false;
			}

			if (senha_atual.value == ""){
				alert("Favor preencher o campo senha atual!");
				senha_atual.focus();
				return false;
			}

			if (senha_usuario.value == ""){
				alert("Favor preencher o campo senha!");
				senha_usuario.focus();
				return false;
			}

			if (confirma_senha.value == ""){
				alert("Favor preencher o campo confirma senha!");
				confirma_senha.focus();
				return false;
			}
			
			if (senha_usuario.value != confirma_senha.value){
				alert("O campo senha e confirma senha possuem valores diferentes!");
				senha_usuario.value = "";
				confirma_senha.value = "";
				senha_usuario.focus();				
				return false;
			}
		}
	}
</script>

<div width="100%" border="0" cellpadding="0" cellspacing="0">
  <div height="30" colspan="2" align="left" valign="middle" class="titulo"><h2>Altera&ccedil;&atilde;o de Senha</h2><br />
  </div>
  <div height="30" colspan="2" align="center" valign="middle" class="texto">
    <?=$msg; ?></div>
  <form action="<?=$PHP_SELF;?>" name="form1" method="post" onSubmit="return checaDados(); ">
    <div width="121" height="25" style="width:20%" align="left" valign="middle" class="texto">Login:
      <input name="login_usuario" type="text" class="form-control" id="login_usuario" size="20" maxlength="20" value="<?=$valor;?>" readonly="readonly"/>
    </div>
    <div height="25" align="left" style="width:20%" valign="middle" class="texto">Senha Atual:
      <input name="senha_atual" type="password" class="form-control" id="senha_atual" size="20" maxlength="20"/>
    </div>
    <div height="25" align="left" style="width:20%" valign="middle" class="texto">Nova Senha:
      <input name="senha_usuario" type="password" class="form-control" id="senha_usuario" size="20" maxlength="20"/>
    </div>
    <div height="25" align="left" style="width:20%" valign="middle" class="texto">Confirma Senha:
      <input name="confirma_senha" type="password" class="form-control" id="confirma_senha" size="20" maxlength="20" />
    </div>
    <div> &nbsp;</div>
    <div height="50" colspan="2" align="left" valign="middle" class="texto">
      <input type="submit" name="bt_alterar" class="btn btn-default" id="bt_alterar" value="Alterar"/>
    </div>
  </form>
</div>

<?

$sql= "SELECT morador.cd_morador, funcionario.cd_func
FROM morador
INNER JOIN funcionario
ON morador.login_usuario=funcionario.login_usuario
ORDER BY morador.cd_morador";
$res = db_query($sql);
$rows = db_num_rows($res);
for ($i = 0; $i < $rows; $i++){
echo "Imprime: ".db_result($res, "login_usuario", $i);
}

?>
