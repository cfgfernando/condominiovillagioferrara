<?
$cd_cat_usuario = $_GET['cdcat'];
if($_GET['op'] == "salvar"){
	$condominio_perm= $_POST['condominio_perm2'];
	$corpodiret_perm= $_POST['corpodiret_perm2'];
	$estatuto_perm= $_POST['estatuto_perm2'];
	$funcionario_perm = $_POST['funcionario_perm2'];
	$agenda_perm= $_POST['agenda_perm2'];
	$anunciar_perm= $_POST['anunciar_perm2'];
	$classificados_perm= $_POST['classificados_perm2'];
	$enquete_perm= $_POST['enquete_perm2'];
	$info_perm= $_POST['info_perm2'];
	$livrooco_perm= $_POST['livrooco_perm2'];
	$reservas_perm= $_POST['reservas_perm2'];
	$reservas_admin_perm= $_POST['reservas_admin_perm2'];
	$reunioes_perm= $_POST['reunioes_perm2'];
	$reunioes_admin_perm= $_POST['reunioes_admin_perm2'];
	$visitantes_perm= $_POST['visitantes_perm2'];
	$visitantes_admin_perm = $_POST['visitantes_admin_perm2'];
	$alteradados_perm= $_POST['alteradados_perm2'];
	$alterasenha_perm= $_POST['alterasenha_perm2'];
	$prestacontas_perm= $_POST['prestacontas_perm2'];
	$forum_perm = $_POST['forum_perm2'];
	$forum_admin_perm = $_POST['forum_admin_perm2']; 
	$moradores_perm = $_POST['moradores_perm'];
	$moradores_inserir_perm = $_POST['moradores_inserir_perm'];
	$moradores_admin_perm = $_POST['moradores_admin_perm'];
	$boletos_perm = $_POST['boletos_perm'];
	
	$sql_cad = " UPDATE permissoes SET
										condominio_perm = \"$condominio_perm\"
										,corpodiret_perm = \"$corpodiret_perm\"
										,estatuto_perm = \"$estatuto_perm\"
										,funcionario_perm = \"$funcionario_perm\"
										,agenda_perm = \"$agenda_perm\"
										,anunciar_perm = \"$anunciar_perm\"
										,classificados_perm = \"$classificados_perm\"
										,enquete_perm = \"$enquete_perm\"
										,info_perm = \"$info_perm\"
										,livrooco_perm = \"$livrooco_perm\"
										,reservas_perm = \"$reservas_perm\"
										,reservas_admin_perm = \"$reservas_admin_perm\"
										,reunioes_perm = \"$reunioes_perm\"
										,reunioes_admin_perm = \"$reunioes_admin_perm\"
										,visitantes_perm = \"$visitantes_perm\"
										,visitantes_admin_perm = \"$visitantes_admin_perm\"
										,alteradados_perm = \"$alteradados_perm\"
										,alterasenha_perm = \"$alterasenha_perm\"
										,prestacontas_perm = \"$prestacontas_perm\"
										,forum_perm = \"$forum_perm\"
										,forum_admin_perm = \"$forum_admin_perm\"
										,moradores_perm = \"$moradores_perm\"
										,moradores_inserir_perm = \"$moradores_inserir_perm\"
										,moradores_admin_perm = \"$moradores_admin_perm\"
										,boletos_perm = \"$boletos_perm\"
									WHERE  cd_cat_usuario = \"$cd_cat_usuario\" ";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=15");
		}else{
			echo AlertDanger("Erro ao cadastrar o registro!");
		}
	
	
	
	
	 
}

if($cd_cat_usuario!=4){
$sql102  = " SELECT * FROM permissoes WHERE cd_cat_usuario = $cd_cat_usuario";
$res102  = db_query($sql102);
$rows102 = db_num_rows($res102);

$id_perm2= db_result($res102,"id_perm");
$tipo_user_perm2= db_result($res102,"tipo_user_perm");


$condominio_perm2= db_result($res102,"condominio_perm");
$corpodiret_perm2= db_result($res102,"corpodiret_perm");
$estatuto_perm2= db_result($res102,"estatuto_perm");
$funcionario_perm2 = db_result($res102,"funcionario_perm");
$agenda_perm2= db_result($res102,"agenda_perm");
$anunciar_perm2= db_result($res102,"anunciar_perm");
$classificados_perm2= db_result($res102,"classificados_perm");
$enquete_perm2= db_result($res102,"enquete_perm");
$info_perm2= db_result($res102,"info_perm");
$livrooco_perm2= db_result($res102,"livrooco_perm");
$reservas_perm2= db_result($res102,"reservas_perm");
$reservas_admin_perm2= db_result($res102,"reservas_admin_perm");
$reunioes_perm2= db_result($res102,"reunioes_perm");
$reunioes_admin_perm2= db_result($res102, "reunioes_admin_perm");
$visitantes_perm2= db_result($res102,"visitantes_perm");
$visitantes_admin_perm2 = db_result($res102, "visitantes_admin_perm");
$alteradados_perm2= db_result($res102,"alteradados_perm");
$alterasenha_perm2= db_result($res102,"alterasenha_perm");
$prestacontas_perm2= db_result($res102,"prestacontas_perm");
$forum_perm2 = db_result($res102, "forum_perm");
$forum_admin_perm2 = db_result($res102, "forum_admin_perm");
$moradores_perm = db_result($res102, "moradores_perm");
$moradores_inserir_perm = db_result($res102, "moradores_inserir_perm");
$moradores_admin_perm = db_result($res102, "moradores_admin_perm");
$boletos_perm = db_result($res102, "boletos_perm");

?>
<div>
<div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Configura&ccedil;&atilde;o -</h2></div>
<hr />
<div align="left"><h2>Permiss&otilde;es de usu&aacute;rios do tipo "<?=$tipo_user_perm2?>".</h2></div>
<form action="?pg=29&cdcat=<?=$cd_cat_usuario?>&op=salvar" method="post" enctype="multipart/form-data" name="form1">
  <!-- Condomínio -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Condom&iacute;nio: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($condominio_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="condominio_perm2" <? if($condominio_perm2 == "1"){ echo "checked";} ?>>
        <? if($condominio_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($condominio_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="condominio_perm2" <? if($condominio_perm2 == "0"){ echo "checked";} ?>>
        <? if($condominio_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  <!-- Corpo Diretivo -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Corpo Diretivo: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($corpodiret_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="corpodiret_perm2" <? if($corpodiret_perm2 == "1"){ echo "checked";} ?>>
        <? if($corpodiret_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($corpodiret_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="corpodiret_perm2" <? if($corpodiret_perm2 == "0"){ echo "checked";} ?>>
        <? if($corpodiret_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  <!-- Estatuto -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Estatuto do Condom&iacute;nio: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($estatuto_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="estatuto_perm2" <? if($estatuto_perm2 == "1"){ echo "checked";} ?>>
        <? if($estatuto_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($estatuto_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="estatuto_perm2" <? if($estatuto_perm2 == "0"){ echo "checked";} ?>>
        <? if($estatuto_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Funcionarios -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Funcion&aacute;rios: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($funcionario_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="funcionario_perm2" <? if($funcionario_perm2 == "1"){ echo "checked";} ?>>
        <? if($funcionario_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($funcionario_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="funcionario_perm2" <? if($funcionario_perm2 == "0"){ echo "checked";} ?>>
        <? if($funcionario_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Agenda -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Agenda: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($agenda_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="agenda_perm2" <? if($agenda_perm2 == "1"){ echo "checked";} ?>>
        <? if($agenda_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($agenda_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="agenda_perm2" <? if($agenda_perm2 == "0"){ echo "checked";} ?>>
        <? if($agenda_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Anunciar -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Anunciar: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($anunciar_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="anunciar_perm2" <? if($anunciar_perm2 == "1"){ echo "checked";} ?>>
        <? if($anunciar_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($anunciar_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="anunciar_perm2" <? if($anunciar_perm2 == "0"){ echo "checked";} ?>>
        <? if($anunciar_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Classificados -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Classificados: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($classificados_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="classificados_perm2" <? if($classificados_perm2 == "1"){ echo "checked";} ?>>
        <? if($classificados_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($classificados_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="classificados_perm2" <? if($classificados_perm2 == "0"){ echo "checked";} ?>>
        <? if($classificados_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Enquete -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Enquete: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($enquete_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="enquete_perm2" <? if($enquete_perm2 == "1"){ echo "checked";} ?>>
        <? if($enquete_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($enquete_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="enquete_perm2" <? if($enquete_perm2 == "0"){ echo "checked";} ?>>
        <? if($enquete_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Informativo -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Inform&aacute;tivo: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($info_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="info_perm2" <? if($info_perm2 == "1"){ echo "checked";} ?>>
        <? if($info_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($info_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="info_perm2" <? if($info_perm2 == "0"){ echo "checked";} ?>>
        <? if($info_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Livro de Ocorrencias -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Livro de Ocorr&ecirc;ncias: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($livrooco_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="livrooco_perm2" <? if($livrooco_perm2 == "1"){ echo "checked";} ?>>
        <? if($livrooco_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($livrooco_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="livrooco_perm2" <? if($livrooco_perm2 == "0"){ echo "checked";} ?>>
        <? if($livrooco_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Reservas -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Reservas: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($reservas_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="reservas_perm2" <? if($reservas_perm2 == "1"){ echo "checked";} ?>>
        <? if($reservas_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($reservas_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="reservas_perm2" <? if($reservas_perm2 == "0"){ echo "checked";} ?>>
        <? if($reservas_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Permissão administrativa em reservas -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permiss&atilde;o <font color="#FF0000"><b>Administrativa</b></font> em Reservas: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($reservas_admin_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="reservas_admin_perm2" <? if($reservas_admin_perm2 == "1"){ echo "checked";} ?>>
        <? if($reservas_admin_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($reservas_admin_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="reservas_admin_perm2" <? if($reservas_admin_perm2 == "0"){ echo "checked";} ?>>
        <? if($reservas_admin_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Reuniões -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Reuni&otilde;es: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($reunioes_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="reunioes_perm2" <? if($reunioes_perm2 == "1"){ echo "checked";} ?>>
        <? if($reunioes_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($reunioes_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="reunioes_perm2" <? if($reunioes_perm2 == "0"){ echo "checked";} ?>>
        <? if($reunioes_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Permissão administrativa em Reuniões -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permiss&atilde;o <font color="#FF0000"><b>Administrativa</b></font> em Reuni&otilde;es: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($reunioes_admin_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="reunioes_admin_perm2" <? if($reunioes_admin_perm2 == "1"){ echo "checked";} ?>>
        <? if($reunioes_admin_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($reunioes_admin_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="reunioes_admin_perm2" <? if($reunioes_admin_perm2 == "0"){ echo "checked";} ?>>
        <? if($reunioes_admin_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Visitantes -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Visitantes: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($visitantes_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="visitantes_perm2" <? if($visitantes_perm2 == "1"){ echo "checked";} ?>>
        <? if($visitantes_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($visitantes_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="visitantes_perm2" <? if($visitantes_perm2 == "0"){ echo "checked";} ?>>
        <? if($visitantes_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Permitir administrativo em Visitantes -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permiss&atilde;o <font color="#FF0000"><b>Administrativa</b></font> em Visitantes: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($visitantes_admin_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="visitantes_admin_perm2" <? if($visitantes_admin_perm2 == "1"){ echo "checked";} ?>>
        <? if($visitantes_admin_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($visitantes_admin_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="visitantes_admin_perm2" <? if($visitantes_admin_perm2 == "0"){ echo "checked";} ?>>
        <? if($visitantes_admin_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Alterar dados -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Alterar Dados: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($alteradados_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="alteradados_perm2" <? if($alteradados_perm2 == "1"){ echo "checked";} ?>>
        <? if($alteradados_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($alteradados_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="alteradados_perm2" <? if($alteradados_perm2 == "0"){ echo "checked";} ?>>
        <? if($alteradados_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Alterar senha -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Alterar Senha: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($alterasenha_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="alterasenha_perm2" <? if($alterasenha_perm2 == "1"){ echo "checked";} ?>>
        <? if($alterasenha_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($alterasenha_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="alterasenha_perm2" <? if($alterasenha_perm2 == "0"){ echo "checked";} ?>>
        <? if($alterasenha_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Prestação de contas -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Presta&ccedil;&atilde;o de Contas: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($prestacontas_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="prestacontas_perm2" <? if($prestacontas_perm2 == "1"){ echo "checked";} ?>>
        <? if($prestacontas_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($prestacontas_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="prestacontas_perm2" <? if($prestacontas_perm2 == "0"){ echo "checked";} ?>>
        <? if($prestacontas_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  <!-- Fórum -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina F&oacute;rum: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($forum_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="forum_perm2" <? if($forum_perm2 == "1"){ echo "checked";} ?>>
        <? if($forum_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($forum_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="forum_perm2" <? if($forum_perm2 == "0"){ echo "checked";} ?>>
        <? if($forum_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Permissão administrativa no fórum -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permiss&atilde;o <font color="#FF0000"><b>Administrativa</b></font> em F&oacute;rum: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($forum_admin_perm2 == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="forum_admin_perm2" <? if($forum_admin_perm2 == "1"){ echo "checked";} ?>>
        <? if($forum_admin_perm2 == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($forum_admin_perm2 == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="forum_admin_perm2" <? if($forum_admin_perm2 == "0"){ echo "checked";} ?>>
        <? if($forum_admin_perm2 == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  <!-- Moradores -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir acessar p&aacute;gina Moradores: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($moradores_perm == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="moradores_perm" <? if($moradores_perm == "1"){ echo "checked";} ?>>
        <? if($moradores_perm == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($moradores_perm == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="moradores_perm" <? if($moradores_perm == "0"){ echo "checked";} ?>>
        <? if($moradores_perm == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  <!-- Inserir Moradores -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permitir Inserir Moradores no perfil: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($moradores_inserir_perm == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="moradores_inserir_perm" <? if($moradores_inserir_perm == "1"){ echo "checked";} ?>>
        <? if($moradores_inserir_perm == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($moradores_inserir_perm == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="moradores_inserir_perm" <? if($moradores_inserir_perm == "0"){ echo "checked";} ?>>
        <? if($moradores_inserir_perm == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  
  <!-- Permissão administrativa em Moradores -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permiss&atilde;o <font color="#FF0000"><b>Administrativa</b></font> em Moradores: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($moradores_admin_perm == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="moradores_admin_perm" <? if($moradores_admin_perm == "1"){ echo "checked";} ?>>
        <? if($moradores_admin_perm == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($moradores_admin_perm == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="moradores_admin_perm" <? if($moradores_admin_perm == "0"){ echo "checked";} ?>>
        <? if($moradores_admin_perm == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  <!-- Permissão administrativa em Moradores -->
  <p>
  <div width="555" align="left" valign="middle" class="texto">Permiss&atilde;o para ver <font color="#FF0000"><b>Boletos</b></font>: <br />
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success <? if($boletos_perm == "1"){ echo "active";} ?>">
        <input type="radio" value="1" name="boletos_perm" <? if($boletos_perm == "1"){ echo "checked";} ?>>
        <? if($boletos_perm == "1"){ echo "*Permitir*";}else{echo "Permitir";} ?>
      </label>
      <label  class="btn btn-warning <? if($boletos_perm == "0"){ echo "active";} ?>">
        <input type="radio" value="0" name="boletos_perm" <? if($boletos_perm == "0"){ echo "checked";} ?>>
        <? if($boletos_perm == "0"){ echo "*Bloquear*";}else{echo "Bloquear";} ?>
      </label>
    </div>
  </div>
  <div height="40" colspan="2" align="center" valign="middle" class="texto">
    <p>
      <input name="button" type="submit" class="btn btn-default" id="button" value="Salvar">
    </p>
  </div>
</form>
</div>
<? } else {
	RedirecionaRapido("?pg=15");
}?>