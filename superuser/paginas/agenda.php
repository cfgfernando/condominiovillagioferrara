<? 
include_once "paginas/autenticacao.php";


if($_GET['opcao'] == "cadastrar"){
	$reserva = $_POST['reserva'];
	$dt_agenda = ConverteData($_POST['dt_agenda']);
	$sql_cad = " INSERT INTO agenda (reserva
									,dt_agenda)
							 VALUES (\"$reserva\"
									,\"$dt_agenda\") ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		echo AlertSuccess("<b>Registro cadastrado com sucesso! </b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
		Redireciona("?pg=12");
	}else{
		echo AlertDanger("Erro ao cadastrar o registro!");
	}
}

if($_GET['opcao'] == "excluir"){
	$cd_agenda = $_GET['cd_agenda'];
	$sql_del = " DELETE FROM agenda WHERE cd_agenda = \"$cd_agenda\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso! </b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
		Redireciona("?pg=12");
	}else{
		echo AlertDanger("Erro ao deletar o registro!");
	}
}

$sql  = " SELECT * FROM agenda ORDER BY dt_agenda DESC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<div>
<form action="?pg=12&opcao=cadastrar" method="post" name="form1">
        <div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Agenda -</h2></div>
          
      <div>
        <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>
          </div>
      <div>
        <div width="170" height="23" align="left" valign="middle" class="texto">Reserva:&nbsp;</div>
            <div width="555" align="left" valign="middle" class="texto"><input name="reserva" type="text" class="form-control" id="reserva" size="70"></div>
          </div>
      <div>
        <div height="23" align="left" valign="middle" class="texto">Data:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="dt_agenda" type="text" class="form-control" id="dt_agenda" value="<?= date('d/m/Y'); ?>" size="12" maxlength="10" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);">
            00/00/0000</div>
          </div>

        <div height="40" colspan="2" align="center" valign="middle" class=""><input name="button" class="btn btn-default" type="submit" id="button" width="40px"  value="  Cadastrar  "></div> </form>

      <div>&nbsp;<br />&nbsp; </div>
        <div height="96" colspan="2" valign="top"><?
        if($rows == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!");
		
}
		else{
		?>
     </div>

       
       <div class="panel panel-default">
  <div class="panel-heading">Foram encontrados
                <?= $rows; ?> 
                registros na agenda.</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <!-- TÍTULO DA COLUNA DE CADA TABELA -->
        <thead>
          <tr>
            <th>Reserva</th>
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
            <td><?= db_result($res,"reserva",$i); ?></td>
            <td><?= ConverteData(db_result($res,"dt_agenda",$i)); ?></td>
            <td align="center"><a href="?pg=26&cd_agenda=<?= db_result($res,"cd_agenda",$i); ?>"><img src="paginas/imagens/editar.png" alt="Alterar este registro" width="25" height="25" border="0"></a></td>
            <td align="center"><a href="?pg=12&opcao=excluir&cd_agenda=<?= db_result($res,"cd_agenda",$i); ?>"><img src="paginas/imagens/excluir.png" alt="Excluir este registro" width="25" height="25" border="0"></a></td>
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