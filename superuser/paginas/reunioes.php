<? 
include_once "paginas/autenticacao.php";

if($_GET['opcao'] == "cadastrar"){
	$titulo_reuniao = $_POST['titulo_reuniao'];
	$ds_reuniao = $_POST['ds_reuniao'];
	$dt_reuniao = ConverteData($_POST['dt_reuniao']);
	$cd_cat_reuniao = $_POST['cd_cat_reuniao'];
	$ds_cat_reuniao = str_replace('"',"'",$_POST['ds_cat_reuniao']);
	
	$sql_cad = " INSERT INTO reuniao(titulo_reuniao
									,ds_reuniao
									,dt_reuniao
									,cd_cat_reuniao)
							 VALUES (\"$titulo_reuniao\"
							 		,\"$ds_reuniao\"
									,\"$dt_reuniao\"
									,\"$cd_cat_reuniao\" ) ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		$assunto = "Reuni&atilde;o cadastrada";
		$mensagem = "Uma reuni&atilde;o foi cadastrada no site $titulo_pagina. <br>$ds_reuniao";
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: <$titulo_pagina> <$contato-email>\r\n";
		
		if($cd_cat_reuniao == 1){
			// Envia email para todos os moradores:
			$sql_email = " SELECT * FROM morador ";
			$res_email = db_query($sql_email);
			for($i=0; $i<db_num_rows($res_email); $i++){
				$email = db_result($res_email,"email_morador",$i);
				mail($email,$assunto,$mensagem,$headers);
			}			
		}
		elseif($cd_cat_reuniao == 2){
			// Envia email para todos os diretores:
			$sql_email = " SELECT * FROM corpo_diretivo ";
			$res_email = db_query($sql_email);
			for($i=0; $i<db_num_rows($res_email); $i++){
				$email = db_result($res_email,"email_corpo",$i);
				mail($email,$assunto,$mensagem,$headers);
			}			
		}
		echo AlertSuccess("<b>Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
			Redireciona("?pg=16");
		
	}
	else{
		echo AlertDanger("Erro ao cadastrar o registro!");
	}
}

if($_GET['opcao'] == "excluir"){
	$cd_reuniao = $_GET['cd_reuniao'];
	$sql_del = " DELETE FROM reuniao WHERE cd_reuniao = \"$cd_reuniao\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=16");
	}else
		echo AlertDanger("Erro ao deletar o registro!");
}

$sql  = " SELECT *
			FROM reuniao
				,reuniao_categoria
		   WHERE reuniao.cd_cat_reuniao = reuniao_categoria.cd_cat_reuniao
		   ORDER BY reuniao.dt_reuniao DESC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('ds_reuniao', {enterMode: Number(2)} );
};
</script>
<div>
<form action="?pg=16&opcao=cadastrar" method="post" name="form1">
            <div height="19" colspan="2" align="center" valign="middle" class="titulo">
              <h2>- Reuni&otilde;es -</h2></div>
          <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>
          <div width="170" height="23" align="left" valign="middle" class="texto">T&iacute;tulo:
          <input name="titulo_reuniao" type="text" class="form-control" id="titulo_reuniao" size="80" maxlength="120"></div>
          <div height="23" align="left" valign="middle" style="float:left; width:50%; height:60px; min-width:150px;" class="texto">Data:<input name="dt_reuniao" type="text" class="form-control" id="dt_reuniao" value="<?= date('d/m/Y'); ?>" size="12" maxlength="10" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);" required="required"></div>
          <div height="23" align="left" valign="middle" style="float:left; width:50%; height:60px; min-width:150px;" class="texto">Categoria:<select name="cd_cat_reuniao" class="form-control" id="cd_cat_reuniao" required="required">
                <option value="">Selecione a Categoria</option>
                <?
		$sql_cat = " SELECT * FROM reuniao_categoria ORDER BY ds_cat_reuniao ASC ";
		$res_cat = db_query($sql_cat);
		for($i=0; $i<db_num_rows($res_cat); $i++){
			echo "<option value=\"".db_result($res_cat,"cd_cat_reuniao",$i)."\">".db_result($res_cat,"ds_cat_reuniao",$i)."</option> <br />";
		}
		?>
              </select></div>
              <?=LimpaFloat();?>
          <div height="23" align="left" valign="top" class="texto">Descri&ccedil;&atilde;o:
          <textarea name="ds_reuniao" cols="70" rows="10" class="form-control" id="ds_reuniao"></textarea></div>
         
              <div>&nbsp;</div>
          <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="btn btn-default" id="button" value="  Cadastrar  "></div>
          <div>&nbsp;</div>
          <div height="59" colspan="2" valign="top"><?
        if($rows == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!");
		}
		else{
		?>
              <div class="panel panel-default">
  <div class="panel-heading">Foram encontrados
                    <?= $rows; ?>
                    reuni&otilde;es cadastradas.</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <!-- TÍTULO DA COLUNA DE CADA TABELA -->
        <thead>
          <tr>
            <th>T&iacute;tulo</th>
            <th>Data</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
        
        <!-- IMPRESSÃO DA TABELA -->
        <tbody>
         <!-- CORPO DA TABELA -->
         <? for ($i=0; $i<$rows; $i++){ ?>
          <tr class="odd gradeX">
            <td><?= db_result($res,"titulo_reuniao",$i); ?></td>
            <td><?= ConverteData(db_result($res,"dt_reuniao",$i)); ?></td>
            <td align="center"><a href="?pg=30&cd_reuniao=<?= db_result($res,"cd_reuniao",$i); ?>"><img src="paginas/imagens/editar.png" alt="Alterar este registro" width="25" height="25" border="0"></a></td>
            <td align="center"><a href="?pg=16&opcao=excluir&cd_reuniao=<?= db_result($res,"cd_reuniao",$i); ?>"><img src="paginas/imagens/excluir.png" alt="Excluir este registro" width="25" height="25" border="0"></a></td>
          </tr>
          <? } ?>
          <!-- CORPO DA TABELA -->
        </tbody>
        <!-- IMPRESSÃO DA TABELA -->
      </table>
    </div>
  </div>
</div>

              <? } ?></div>

</form>
</div>
