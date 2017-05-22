<? 
include_once "paginas/autenticacao.php";


$cod_estatuto = 1;
$sql  = " SELECT * FROM estatuto WHERE cod_estatuto = ".$cod_estatuto;
$res  = db_query($sql);
$rows = db_num_rows($res);

if($_GET['opcao'] == "alterar"){
	
	$tit_estatuto = $_POST['tit_estatuto'];
	$txt_estatuto = str_replace('"',"'",$_POST['txt_estatuto']);
	
	if (db_result($res,"cod_estatuto") == ""){
		$sql_cad = "INSERT INTO estatuto (cod_estatuto
									 ,tit_estatuto
									,txt_estatuto)
							 VALUES (\"$cod_estatuto\"
							 		,\"$tit_estatuto\"
									,\"$txt_estatuto\")";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Dados inseridos com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
			Redireciona("?pg=4");
		}else{
			echo AlertDanger("Erro ao inserir os dados!");
		}
		
	}else{
		$sql_cad = " UPDATE estatuto SET  tit_estatuto = \"$tit_estatuto\"
										,txt_estatuto = \"$txt_estatuto\"
								  		WHERE  estatuto.cod_estatuto = \"$cod_estatuto\"";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=4");
		}else{
			echo AlertDanger("Erro ao alterar o registro!");
		}
	}
}


?>
<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('txt_estatuto', {enterMode: Number(2)} );
};
</script>
<form action="?pg=4&opcao=alterar&cod_estatuto=1" method="post" enctype="multipart/form-data" name="form1">
          <div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Estatuto -</h2></div>

            <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>

            <div width="170" height="23" align="left" valign="middle" class="texto">T&iacute;tulo:&nbsp;</div>
            <div width="555" align="left" valign="middle" class="texto"><input name="tit_estatuto" type="text" class="form-control" id="tit_estatuto" value="<?= db_result($res,"tit_estatuto"); ?>" size="80" maxlength="120"></div>

            <div height="23" align="left" valign="top" class="texto">Descri&ccedil;&atilde;o:&nbsp;</div>
            <div rowspan="2" align="left" valign="top" class="texto"><textarea name="txt_estatuto" cols="70" rows="10" class="form-control" id="txt_estatuto"><?= db_result($res,"txt_estatuto"); ?>
</textarea></div>
<div>&nbsp;</div>
            <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="btn btn-default" id="button" value="  Alterar  "></div>
</form>
