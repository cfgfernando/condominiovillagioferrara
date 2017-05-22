<? 
include_once "paginas/autenticacao.php";


if($_GET['opcao'] == "alterar"){
	$cd_reuniao = $_GET['cd_reuniao'];
	$titulo_reuniao = $_POST['titulo_reuniao'];
	$ds_reuniao = $_POST['ds_reuniao'];
	$dt_reuniao = ConverteData($_POST['dt_reuniao']);
	$cd_cat_reuniao = $_POST['cd_cat_reuniao'];
	$ds_cat_reuniao = str_replace('"',"'",$_POST['ds_cat_reuniao']);
	
	$sql_cad = " UPDATE reuniao SET  titulo_reuniao = \"$titulo_reuniao\"
									,ds_reuniao = \"$ds_reuniao\"
									,dt_reuniao = \"$dt_reuniao\"
									,cd_cat_reuniao = \"$cd_cat_reuniao\"
							  WHERE  cd_reuniao = \"$cd_reuniao\" ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=16");
	}else{
		echo AlertDanger("Erro ao alterar o registro!");
	}
}

$sql  = " SELECT *
			FROM reuniao
				,reuniao_categoria
		   WHERE reuniao.cd_cat_reuniao = reuniao_categoria.cd_cat_reuniao
		     AND reuniao.cd_reuniao = ".$_GET['cd_reuniao']."
		   ORDER BY reuniao.dt_reuniao DESC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('ds_reuniao', {enterMode: Number(2)} );
};
</script>
<form action="?pg=30&opcao=alterar&cd_reuniao=<?= $_GET['cd_reuniao']; ?>" method="post" name="form1">
        <div height="19" colspan="2" align="center" valign="middle" class="titulo">
          <h2>- Atualiza Reuni&atilde;o-</h2></div>
        <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>
       <div width="170" height="23" align="left" valign="middle" class="texto">T&iacute;tulo:&nbsp;</div>
            <div width="555" align="left" valign="middle" class="texto"><input name="titulo_reuniao" type="text" class="form-control" id="titulo_reuniao" value="<?= db_result($res,"titulo_reuniao"); ?>" size="80" maxlength="120"></div>
       <div height="23" align="left" valign="top" class="texto">Descri&ccedil;&atilde;o:&nbsp;</div>
        <div rowspan="2" align="left" valign="top" class="texto"><textarea name="ds_reuniao" cols="70" rows="10" class="form-control" id="ds_reuniao"><?= db_result($res,"ds_reuniao"); ?></textarea></div>
       <div height="23" align="left" valign="middle" class="texto">Data:&nbsp;</div>
       <div align="left" valign="middle" class="texto"><input name="dt_reuniao" type="text" class="form-control" id="dt_reuniao" value="<?= ConverteData(db_result($res,"dt_reuniao")); ?>" size="12" maxlength="10" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);"></div>
       <div height="23" align="left" valign="middle" class="texto">Categoria: <span style="font-size:9px">(A opção diretoria &eacute; visivel apenas para administradores)</span>&nbsp;</div>
       <div align="left" valign="middle" class="texto"><select name="cd_cat_reuniao" class="form-control" id="cd_cat_reuniao" >
            <?
			$cat_atual = db_result($res,"cd_cat_reuniao"); 
		$sql_cat = " SELECT * FROM reuniao_categoria ORDER BY ds_cat_reuniao ASC ";
		$res_cat = db_query($sql_cat);
		for($i=0; $i<db_num_rows($res_cat); $i++){
			if($cat_atual == db_result($res_cat,"cd_cat_reuniao",$i))
				echo "<option value=\"".db_result($res_cat,"cd_cat_reuniao",$i)."\" selected>".db_result($res_cat,"ds_cat_reuniao",$i)."</option> <br />";
			else
				echo "<option value=\"".db_result($res_cat,"cd_cat_reuniao",$i)."\">".db_result($res_cat,"ds_cat_reuniao",$i)."</option> <br />";
		}
		?>
            </select></div>
            <div>&nbsp;</div>
       <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="texto" id="button" value="  Alterar  "></div>
</form>