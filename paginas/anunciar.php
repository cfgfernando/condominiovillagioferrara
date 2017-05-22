<? 


if($_GET['opcao'] == "enviar"){
	$nm_clas  	  = $_POST['nm_clas'];
	$fone_clas    = $_POST['fone_clas'];
	$celular_clas = $_POST['celular_clas'];
	$email_clas   = $_POST['email_clas'];
	$ds_clas  	  = str_replace('"',"'",$_POST['ds_clas']);
	$dt_clas  	  = ConverteData($_POST['dt_clas']);
	$status_clas	  = "Aguardando aprova&ccedil;&atilde;o";
	
	$sql_cad = " INSERT INTO classificados (nm_clas
								  		  ,fone_clas
										  ,celular_clas
										  ,email_clas
										  ,ds_clas
										  ,dt_clas
										  ,status_clas)
						   		   VALUES (\"$nm_clas\"
								  		  ,\"$fone_clas\"
										  ,\"$celular_clas\"
										  ,\"$email_clas\"
										  ,\"$ds_clas\"
										  ,\"$dt_clas\"
										  ,\"$status_clas\") ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		echo AlertSuccess("Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=7");
	}else
		echoAlertDanger("Erro ao cadastrar o registro!");
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
<form action="?pg=9&opcao=enviar" method="post" name="form1">
          <div>&nbsp;<br />&nbsp;</div>
            <div height="19" colspan="2" align="left" valign="middle" class="titulo"><h2>Classificados</h2></div>

            <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>

            <div width="180" height="23" align="left" valign="middle" class="texto">Nome:&nbsp;</div>
            <div width="545" align="left" valign="middle" class="texto"><input name="nm_clas" type="text" class="form-control" id="nm_clas" size="60" maxlength="60"></div>

            <div height="23" align="left" valign="middle" style="float:left; width:25%; height:60px; min-width:150px;" class="texto">Telefone:<input name="fone_clas" type="text" class="form-control" id="fone_clas" onKeyPress="return txtBoxFormat(this, '(99)9999-9999', event);" size="16" maxlength="13">
</div>

            <div height="23" align="left" valign="middle" style="float:left; width:25%; height:60px; min-width:150px;" class="texto">Celular:<input name="celular_clas" type="text" class="form-control" id="celular_clas" onKeyPress="return txtBoxFormat(this, '(99)99999-9999', event);" size="16" maxlength="14">
</div>

            <div height="23" align="left" valign="middle" style="float:left; width:25%; height:60px; min-width:150px;" class="texto">E-mail:<input name="email_clas" type="text" class="form-control" id="email_clas" size="60" maxlength="60"></div>
            <div height="23" align="left" valign="middle" style="float:left; width:25%; height:60px; min-width:150px;" class="texto">Data da Solicita&ccedil;&atilde;o:<input name="dt_clas" type="text" class="form-control" id="dt_clas" value="<?= date('d/m/Y'); ?>" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);" size="12" maxlength="10" readonly="readonly"></div>
			<div class="clearfix"></div>
            <div height="23" align="left" valign="top" class="texto">Produto/Descri&ccedil;&atilde;o:
              <textarea name="ds_clas" cols="60" rows="10" class="form-control" id="ds_clas">
</textarea></div>
			<div>&nbsp;<br />&nbsp;</div>
            <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="btn btn-primary" id="button" value="Enviar"></div>

</form>

