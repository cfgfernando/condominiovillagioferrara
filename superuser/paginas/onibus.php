<? 
include_once "paginas/autenticacao.php";

$id_onibus = 1;
$sql  = " SELECT * FROM onibus WHERE id_onibus = ".$id_onibus;
$res  = db_query($sql);
$rows = db_num_rows($res);


if($_GET['opcao'] == "alterar"){
	
	$txt_onibus = str_replace('"',"'",$_POST['txt_onibus']);
	
	
	if (db_result($res,"id_onibus") == ""){
		$sql_cad = "INSERT INTO onibus (id_onibus
									 ,txt_onibus)
							 VALUES (\"$id_onibus\"
							 		,\"$txt_onibus\")";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Dados inseridos com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
			Redireciona("?pg=37");
		}else{
			echo AlertDanger("Erro ao inserir os dados!");
		}
		
	}else{
		$sql_cad = " UPDATE onibus SET  txt_onibus = \"$txt_onibus\"
								  		WHERE  onibus.id_onibus = \"$id_onibus\"";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=37");
		}else{
			echo AlertDanger("Erro ao alterar o registro!");
		}
	}
}

?>
<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('txt_onibus', {enterMode: Number(2)} );
};
</script>
<div>
<form action="?pg=37&opcao=alterar&id_onibus=1" method="post" enctype="multipart/form-data" name="form1">
          <div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Transportes -</h2></div>

            <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>
            <div height="23" align="left" valign="top" class="texto"><b>Descri&ccedil;&atilde;o:&nbsp;</b><br />
              Dica: Ao criar a tabela, no modo &quot;Código Fonte&quot; altere a &lt;table&gt; para &lt;table class='table table-bordered table-striped table-condensed'&gt; </div>
            <div rowspan="2" align="left" valign="top" class="texto"><textarea name="txt_onibus" cols="70" rows="10" class="form-control" id="txt_onibus"><?= db_result($res,"txt_onibus"); ?>
</textarea></div>
<div>&nbsp;</div>
            <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="btn btn-default" id="button" value="  Alterar  "></div>
</form>
<div align="right"><a href="paginas/modelo_tabela.txt" target="_new">Modelo de Tabela</a></div>
</div>
