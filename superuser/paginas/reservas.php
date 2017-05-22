<? 
include_once "paginas/autenticacao.php";


if($_GET['opcao'] == "excluir"){
	$cd_res = $_GET['cd_res'];
	$sql_del = " DELETE FROM reservas WHERE cd_res = \"$cd_res\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=10");
	}
	else
		echo AlertDanger("Erro ao deletar o registro!");
}

$sql  = " SELECT * FROM reservas ORDER BY dt_res DESC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('ds_res', {enterMode: Number(2)} );
};
</script>

<div>
  <div>&nbsp;<br />
    &nbsp;</div>
  <div height="59" colspan="2" valign="top">
    <?
        if($rows == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!");
		}
		else{
		?>
    <div class="panel panel-default">
      <div class="panel-heading">Foram encontrados
        <?= $rows; ?>
        reservas.</div>
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
              </tr>
            </thead>
            <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
            
            <!-- IMPRESSÃO DA TABELA -->
            <tbody>
              <!-- CORPO DA TABELA -->
              <? for ($i=0; $i<$rows; $i++){ ?>
              <tr class="odd gradeX">
                <td><?= db_result($res,"ds_res",$i); ?></td>
                <td><?= db_result($res,"fone_res",$i); ?></td>
                <td><?= ConverteData(db_result($res,"dt_res",$i)); ?></td>
                <td><?= db_result($res,"status_res",$i); ?></td>
                <td align="center"><a href="?pg=34&cd_res=<?= db_result($res,"cd_res",$i); ?>"><img src="paginas/imagens/editar.png" alt="Alterar reservas" width="25" height="25" border="0"></a></td>
              </tr>
              <? } ?>
              <!-- CORPO DA TABELA -->
            </tbody>
            <!-- IMPRESSÃO DA TABELA -->
          </table>
        </div>
      </div>
    </div>
    <? } ?>
  </div>
</div>
<div align="left">
  <h2>Locais Dispon&iacute;veis para Reservas</h2>
</div>
<?
if($_GET['op'] == "excluir"){
	$id_local = $_GET['id_local'];
	$sql_del = " DELETE FROM reserva_locais WHERE id_local = \"$id_local\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=10");
	}
	else
		echo AlertDanger("Erro ao deletar o registro!");
}
if($_GET['op'] == "inserir"){
	$nome_local = $_POST['nome_local'];
	$sql_ins = " INSERT INTO reserva_locais (nome_local) VALUES ('$nome_local')";
	$res_ins = db_query($sql_ins) or die('Erro '. db_error());
	if($res_ins){ 
		echo AlertSuccess("<b>Registro inserido com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=10");
	}
	else
		echo AlertDanger("Erro ao inserir o registro!");
}
$sql_locais  = " SELECT * FROM reserva_locais ORDER BY nome_local ASC ";
$res_locais  = db_query($sql_locais);
$rows_locais = db_num_rows($res_locais);
?>
<form action="?pg=10&op=inserir" method="post" enctype="multipart/form-data" name="form1">
  <div width="170" height="23" align="left" valign="middle" class="texto">Nome:
    <input name="nome_local" type="text" class="form-control" id="nome_local" size="80" maxlength="80">
  </div><div><br />
  <input name="button" type="submit" class="btn btn-default" id="button" value="  Adicionar Local  "></div><br />
</form>
<div class="panel panel-default">
  <div class="panel-heading">Foram encontrados
    <?= $rows_locais ?>
    locais</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>#</th>
            <th>Local</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
          <? $j; for ($i=0; $i<$rows_locais; $i++){ $j++; ?>
          <tr class="odd gradeX">
            <td><?=$j?></td>
            <td><?= db_result($res_locais,"nome_local",$i); ?></td>
            <td class="center"><a href="?pg=10&op=excluir&id_local=<?= db_result($res_locais,"id_local",$i); ?>"><img src="paginas/imagens/excluir.png" alt="Excluir este registro" width="25" height="25" border="0"></a></td>
          </tr>
          <? } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
