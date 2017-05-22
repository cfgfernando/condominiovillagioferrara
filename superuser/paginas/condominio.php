<? 
include_once "paginas/autenticacao.php";

$cod_condominio = 1;
$sql  = " SELECT * FROM condominio WHERE cod_condominio = ".$cod_condominio;
$res  = db_query($sql);
$rows = db_num_rows($res);

if($_GET['opcao'] == "alterar"){
	
	$tit_condominio = $_POST['tit_condominio'];
	$txt_condominio = str_replace('"',"'",$_POST['txt_condominio']);
	
	
	if (db_result($res,"cod_condominio") == ""){
		$sql_cad = "INSERT INTO condominio (cod_condominio
									 ,tit_condominio
									,txt_condominio)
							 VALUES (\"$cod_condominio\"
							 		,\"$tit_condominio\"
									,\"$txt_condominio\")";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Dados inseridos com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
			Redireciona("?pg=2");
		}else{
			echo AlertDanger("Erro ao inserir os dados!");
		}
		
	}else{
		$sql_cad = " UPDATE condominio SET  tit_condominio = \"$tit_condominio\"
										,txt_condominio = \"$txt_condominio\"
								  		WHERE  condominio.cod_condominio = \"$cod_condominio\"";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Dados alterados com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
			Redireciona("?pg=2");
		}else{
			echo AlertDanger("Erro ao alterar os dados!");
		}
	}
}




?>
<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('txt_condominio', {enterMode: Number(2)} );
};
</script>
<div>
<form action="?pg=2&opcao=alterar&cod_condominio=1" method="post" enctype="multipart/form-data" name="form1">
          <div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Condom&iacute;nio -</h2></div>

            <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>

            <div width="170" height="23" align="left" valign="middle" class="texto">T&iacute;tulo:&nbsp;</div>
            <div width="555" align="left" valign="middle" class="texto"><input name="tit_condominio" type="text" class="form-control" id="tit_condominio" value="<?= db_result($res,"tit_condominio"); ?>" size="80" maxlength="120"></div>

            <div height="23" align="left" valign="top" class="texto">Descri&ccedil;&atilde;o:&nbsp;</div>
            <div rowspan="2" align="left" valign="top" class="texto"><textarea name="txt_condominio" cols="70" rows="10" class="form-control" id="txt_condominio"><?= db_result($res,"txt_condominio"); ?>
</textarea></div>
<div>&nbsp;</div>
            <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="btn btn-default" id="button" value="  Alterar  "></div>
</form>
</div>