<? 
include_once "paginas/autenticacao.php";
$ocorrencia  = $_POST['ocorrencia'];

if($_GET['opcao'] == "alterar"){
	
	$dt_ocorrencia = ConverteData($_POST['dt_ocorrencia']);
	$sql_cad = " UPDATE livro_ocorrencia 
	                SET ocorrencia = \"$ocorrencia\"
					   ,dt_ocorrencia = \"$dt_ocorrencia\" 
				  WHERE	cd_ocorrencia = $ocorrencia ";
	$res_cad = db_query($sql_cad);
	
	if($res_cad){
		echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=14");
	}else
		echo AlertDanger("Erro ao alterar o registro!");
}

$sql  = " SELECT * FROM livro_ocorrencia WHERE cd_ocorrencia = $ocorrencia ";
$res  = db_query($sql);
$rows = db_num_rows($res);
?>

<form action="?pg=8&opcao=cadastrar" method="post" name="form1">
          <div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Editar Livro de Ocorr&ecirc;ncia-</h2></div>
            <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>
            <div width="170" height="23" align="left" valign="middle" class="texto">Ocorr&ecirc;ncia:&nbsp;</div>
            <div width="555" align="left" valign="middle" class="texto"><input name="ocorrencia" type="text" class="form-control" id="ocorrencia" size="80" value="<?= db_result($res,"ocorrencia"); ?>" maxlength="80"></div>
            <div height="23" align="left" valign="middle" class="texto">Data:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="dt_ocorrencia" type="text" class="form-control" id="dt_ocorrencia" value="<?= ConverteData(db_result($res,"dt_ocorrencia")); ?>" size="12" maxlength="10" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);"></div>
            <div>&nbsp;</div>
            <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="texto" id="button" value="  Alterar  "></div>
</form>
