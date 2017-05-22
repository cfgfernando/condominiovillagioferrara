<? 
include_once "paginas/autenticacao.php";
$cd_enq = $_GET['cd_enq'];
 
if($_GET['opcao'] == "alterar"){
	$dt_inicio = ConverteData($_POST['dt_inicio']);
	$dt_fim = ConverteData($_POST['dt_fim']);
	$ativa_enq = $_POST['ativa_enq'];
	$sql_cad_op = " UPDATE enquete_perguntas SET dt_inicio = '$dt_inicio', dt_fim = '$dt_fim', ie_situacao = '$ativa_enq' WHERE cd_enquete = $cd_enq";
	$res_cad_op = db_query($sql_cad_op) or die (db_error());

	if($res_cad_op){
		echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=11");
	}else
		echo AlertDanger("Erro ao alterar o registro!");
}








$sql  = " SELECT * FROM enquete_perguntas WHERE cd_enquete = $cd_enq ";
$res  = db_query($sql); 
$rows = db_num_rows($res);

$sql_ops  = " SELECT * FROM enquete_opcoes WHERE cd_enquete = $cd_enq ";
$res_ops  = db_query($sql_ops); 
$rows_ops = db_num_rows($res_ops);

$sql_logs = " SELECT * FROM enquete_logs WHERE cd_enquete = $cd_enq ";
$res_logs = db_query($sql_logs);
$rows_logs = db_num_rows($res_logs);

$status_enq = db_result($res,"ie_situacao");
if($status_enq == "A"){
	$ativado = 1;
}else{
	$ativado = 0;
}
echo AlertInfo("Por motivo de seguran&ccedil;a as op&ccedil;&otilde;es da enquete n&atilde;o podem ser alteradas!");
?>

<form action="?pg=25&cd_enq=<?=$cd_enq;?>&opcao=alterar" method="post" name="form1">
  <div height="19" colspan="2" align="center" valign="middle" class="titulo">
    <h2>- Enquete -</h2>
  </div>
  <div width="180" height="23" align="left" valign="middle" class="texto" style="width:20%; min-width:120px; float:left;">Data Inicial:
    <input name="dt_inicio" type="text" class="form-control" id="pergunta_enq" value="<?=ConverteData(db_result($res, "dt_inicio"))?>" size="80" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);">
  </div>
  <div width="180" height="23" align="left" valign="middle" class="texto" style="width:20%; min-width:120px; float:left;">Data Final:
    <input name="dt_fim" type="text" class="form-control" id="pergunta_enq" value="<?=ConverteData(db_result($res, "dt_fim"))?>" size="80" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);">
  </div>
<?=LimpaFloat()?>
  <div> &nbsp; </div>
  <div>Status da Enquete: </div>
  <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-success <? if($ativado == "1"){ echo "active";} ?>">
      <input type="radio" value="A" name="ativa_enq" id="option1" <? if($ativado == "1"){ echo "checked";} ?>>
      <? if($ativado == "1"){ echo "**Ativo**";}else{echo "Ativar";} ?>
    </label>
    <label  class="btn btn-warning <? if($ativado == "0"){ echo "active";} ?>">
      <input type="radio" value="I" name="ativa_enq" id="option2" <? if($ativado == "0"){ echo "checked";} ?>>
      <? if($ativado == "0"){ echo "**Desativado**";}else{echo "Desativar";} ?>
    </label>
  </div>
  <div height="40" colspan="2" align="center" valign="middle" class="texto">
    <input name="button" type="submit" class="texto" id="button" value="  Alterar Enquete  ">
  </div>
</form>
<div>
  <div> </div>
  <div height="19" colspan="2" align="center" valign="middle" class="titulo">
    <h2>- J&aacute; votaram nesta enquete -</h2>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <?= $rows_logs; ?>
      pessoas j&aacute; votaram.</div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <!-- TÍTULO DA COLUNA DE CADA TABELA -->
          <thead>
            <tr>
              <th>CPF do Usu&aacute;rio</th>
              <th>Nome do Usu&aacute;rio</th>
            </tr>
          </thead>
          <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
          
          <!-- IMPRESSÃO DA TABELA -->
          <tbody>
            <!-- CORPO DA TABELA -->
            <? for ($i=0; $i<$rows_logs; $i++){
				$loginuserid = db_result($res_logs,"login_usuario", $i);
				$res_mora  = db_query(" SELECT * FROM morador WHERE login_usuario LIKE '$loginuserid' ");

			 ?>
            <tr class="odd gradeX">
              <td><?=$loginuserid?></td>
              <td><?=db_result($res_mora,"nm_morador") ?></td>
            </tr>
            <? } ?>
            <!-- CORPO DA TABELA -->
          </tbody>
          <!-- IMPRESSÃO DA TABELA -->
        </table>
      </div>
    </div>
  </div>
</div>
