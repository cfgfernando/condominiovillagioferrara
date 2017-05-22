<? 
include_once "paginas/autenticacao.php";


if($_GET['opcao'] == "cadastrar"){
	$nm_clas  	  = $_POST['nm_clas'];
	$fone_clas    = $_POST['fone_clas'];
	$celular_clas = $_POST['celular_clas'];
	$email_clas   = $_POST['email_clas'];
	$ds_clas  	  = str_replace('"',"'",$_POST['ds_clas']);
	$dt_clas  	  = ConverteData($_POST['dt_clas']);
	
	$sql_cad = " INSERT INTO classificados (nm_clas
								  		  ,fone_clas
										  ,celular_clas
										  ,email_clas
										  ,ds_clas
										  ,dt_clas)
						   		   VALUES (\"$nm_clas\"
								  		  ,\"$fone_clas\"
										  ,\"$celular_clas\"
										  ,\"$email_clas\"
										  ,\"$ds_clas\"
										  ,\"$dt_clas\") ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		echo AlertSuccess("Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=7");
	}else
		echoAlertDanger("Erro ao cadastrar o registro!");
}

if($_GET['opcao'] == "excluir"){
	$cd_clas = $_GET['cd_clas'];
	$sql_del = " DELETE FROM classificados WHERE cd_clas = \"$cd_clas\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=7");
	}else
		echo AlertDanger("Erro ao deletar o registro!");
}

$sql  = " SELECT * FROM classificados ORDER BY nm_clas ASC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('ds_clas', {enterMode: Number(2)} );
};
</script>
<form action="?pg=7&opcao=cadastrar" method="post" name="form1">
<div>&nbsp;<br />&nbsp;</div>
      <div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Classificados -</h2></div>

      <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>

      <div width="180" height="23" align="left" valign="middle" class="texto">Nome:&nbsp;</div>
      <div width="545" align="left" valign="middle" class="texto"><input name="nm_clas" type="text" class="form-control" id="nm_clas" size="60" maxlength="60"></div>

      <div height="23" align="left" valign="middle" class="texto">Telefone:&nbsp;</div>
  <div align="left" valign="middle" class="texto"><input name="fone_clas" type="text" class="form-control" id="fone_clas" size="16" maxlength="13" onKeyPress="return txtBoxFormat(this, '(99)9999-9999', event);">
      </div>

      <div height="23" align="left" valign="middle" class="texto">Celular:&nbsp;</div>
  <div align="left" valign="middle" class="texto"><input name="celular_clas" type="text" class="form-control" id="celular_clas" size="16" maxlength="14" onKeyPress="return txtBoxFormat(this, '(99)99999-9999', event);">
      </div>

      <div height="23" align="left" valign="middle" class="texto">E-mail:&nbsp;</div>
      <div align="left" valign="middle" class="texto"><input name="email_clas" type="text" class="form-control" id="email_clas" size="60" maxlength="60"></div>

      <div height="23" align="left" valign="top" class="texto">Produto/Descri&ccedil;&atilde;o:&nbsp;</div>
      <div align="left" valign="middle" class="texto"><textarea name="ds_clas" cols="60" rows="10" class="form-control" id="ds_clas"></textarea></div>

      <div height="23" align="left" valign="middle" class="texto">Data:&nbsp;</div>
      <div align="left" valign="middle" class="texto"><input name="dt_clas" type="text" class="form-control" id="dt_clas" size="12" maxlength="10" value="<?= date('d/m/Y'); ?>" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);">
        </div>

      <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="btn btn-default" id="button" value="  Cadastrar  "></div>
<div>&nbsp;<br />&nbsp;</div>
      <div height="59" colspan="2" valign="top"><?
        if($rows == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!"); 
		}
		else{
		?>
        <div class="panel panel-default">
  <div class="panel-heading">Foram encontrados
          <?= $rows; ?>
          classificados</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <!-- TÍTULO DA COLUNA DE CADA TABELA -->
        <thead>
          <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Data</th>
			<th>Status</th>
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
            <td><?= db_result($res,"nm_clas",$i); ?></td>
            <td><?= db_result($res,"fone_clas",$i); ?></td>
            <td><?= ConverteData(db_result($res,"dt_clas",$i)); ?></td>
			<td><?= db_result($res,"status_clas",$i); ?></td>
            <td class="center"><a href="?pg=17&cd_clas=<?= db_result($res,"cd_clas",$i); ?>"><img src="paginas/imagens/editar.png" alt="Alterar classificado" width="25" height="25" border="0"></a></td>
            <td class="center"><a href="?pg=7&opcao=excluir&cd_clas=<?= db_result($res,"cd_clas",$i); ?>"><img src="paginas/imagens/excluir.png" alt="Excluir classificado" width="25" height="25" border="0"></a></td>
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
