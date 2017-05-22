<? 
include_once "paginas/autenticacao.php";


if($_GET['opcao'] == "alterar"){
	$cd_clas	  = $_GET['cd_clas'];
	$nm_clas  	  = $_POST['nm_clas'];
	$fone_clas    = $_POST['fone_clas'];
	$status_clas    = $_POST['status_clas'];
	$celular_clas = $_POST['celular_clas'];
	$email_clas   = $_POST['email_clas'];
	$ds_clas  	  = str_replace('"',"'",$_POST['ds_clas']);
	$dt_clas  	  = ConverteData($_POST['dt_clas']);
	
	$sql_cad = " UPDATE classificados SET  nm_clas = \"$nm_clas\"
								  		  ,fone_clas = \"$fone_clas\"
										  ,celular_clas = \"$celular_clas\"
										  ,email_clas = \"$email_clas\"
										  ,ds_clas = \"$ds_clas\"
										  ,dt_clas = \"$dt_clas\"
										  ,status_clas = \"$status_clas\"
									WHERE  cd_clas = \"$cd_clas\" ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=7");
	}else{
		echo AlertDanger("Erro ao alterar o registro!");
	}
}

$sql  = " SELECT * FROM classificados WHERE cd_clas = ".$_GET['cd_clas'];
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('ds_clas', {enterMode: Number(2)} );
};
</script>
<form action="?pg=17&opcao=alterar&cd_clas=<?= $_GET['cd_clas']; ?>" method="post" name="form1">
          <div>&nbsp;<br />&nbsp;</div>
            <div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Classificados -</h2></div>

            <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>

            <div width="180" height="23" align="left" valign="middle" class="texto">Nome:&nbsp;</div>
            <div width="545" align="left" valign="middle" class="texto"><input name="nm_clas" type="text" class="form-control" id="nm_clas" value="<?= db_result($res,"nm_clas"); ?>" size="60" maxlength="60"></div>

            <div height="23" align="left" valign="middle" class="texto">Telefone:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="fone_clas" type="text" class="form-control" id="fone_clas" onKeyPress="return txtBoxFormat(this, '(99)9999-9999', event);" value="<?= db_result($res,"fone_clas"); ?>" size="16" maxlength="13">
</div>

            <div height="23" align="left" valign="middle" class="texto">Celular:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="celular_clas" type="text" class="form-control" id="celular_clas" onKeyPress="return txtBoxFormat(this, '(99)99999-9999', event);" value="<?= db_result($res,"celular_clas"); ?>" size="16" maxlength="14">
</div>

            <div height="23" align="left" valign="middle" class="texto">E-mail:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="email_clas" type="text" class="form-control" id="email_clas" value="<?= db_result($res,"email_clas"); ?>" size="60" maxlength="60"></div>

            <div height="23" align="left" valign="top" class="texto">Produto/Descri&ccedil;&atilde;o:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><textarea name="ds_clas" cols="60" rows="10" class="form-control" id="ds_clas"><?= db_result($res,"ds_clas"); ?>
</textarea></div>

            <div height="23" align="left" valign="middle" class="texto">Data:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="dt_clas" type="text" class="form-control" id="dt_clas" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);" value="<?= ConverteData(db_result($res,"dt_clas")); ?>" size="12" maxlength="10"></div>

			<div>Selecione a sua decis&atildeo sobre o evento:</div>
			<div class="btn-group" data-toggle="buttons">
			  <label class="btn btn-success <? if(db_result($res,"status_clas") == "Aprovado"){ echo "active";} ?>">
				<input type="radio" value="Aprovado" name="status_clas" id="option1" <? if(db_result($res,"status_clas") == "Aprovado"){ echo "checked";} ?>> Aprovar
			  </label>
			  <label class="btn btn-danger <? if(db_result($res,"status_clas") == "Reprovado"){ echo "active";} ?>">
				<input type="radio" value="Reprovado" name="status_clas" id="option2" <? if(db_result($res,"status_clas") == "Reprovado"){ echo "checked";} ?>> Rejeitar
			  </label>
			</div>
			
			<div>&nbsp;<br />&nbsp;</div>
            <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="texto" id="button" value="  Alterar  "></div>

</form>

