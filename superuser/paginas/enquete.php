<? 
include_once "paginas/autenticacao.php";

if($_GET['opcao'] == "cadastrar"){
	
foreach( $_POST as $nome_campo => $valor){ 
	$comando = "$" . $nome_campo . "='" . $valor . "';";
	$preenche [$kmr] = $valor;
	$kmr++;
	eval($comando); 
	} 

	$dt_inicio  = ConverteData(date('d/m/Y'));
	$dt_fim  = ConverteData(date('d/m/Y'));
	
	$sql_cad_per = "INSERT INTO enquete_perguntas (DT_CADASTRO, DS_PERGUNTA, DT_INICIO, DT_FIM, IE_SITUACAO) VALUES (CURRENT_TIMESTAMP, '$pergunta', '$dt_inicio', '$dt_fim', 'I')";
	$res_cad_per = db_query($sql_cad_per);
	
	$sql_consult = "SELECT * FROM enquete_perguntas ORDER BY  CD_ENQUETE DESC";
	$res_consult = db_query($sql_consult);
	$ultimovalor = db_result($res_consult, "CD_ENQUETE");
	
	for ($j=0; $j<$kmr; $j++){
		if($preenche[$j] != ""){
			$sql_cad_op = " INSERT INTO enquete_opcoes (CD_ENQUETE, DS_OPCAO, QT_VOTO) VALUES ('$ultimovalor', '$preenche[$j]', '0') ";
			$res_cad_op = db_query($sql_cad_op) or die (db_error());
		}
	}
	
	if($res_cad_op){
		echo AlertSuccess("Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
		Redireciona("?pg=11");
	}else{
		echo AlertDanger("Erro ao cadastrar o registro!");
	}
}

if($_GET['opcao'] == "excluir"){
	$cd_enq = $_GET['cd_enq'];
	$sql_del = " DELETE FROM enquete_perguntas WHERE cd_enquete = \"$cd_enq\" ";
	$res_del = db_query($sql_del);
	$sql_del2 = " DELETE FROM enquete_opcoes WHERE cd_enquete = \"$cd_enq\" ";
	$res_del2 = db_query($sql_del2);
	if($res_del){
		$sql_del2 = " DELETE FROM enquete_opcoes WHERE cd_enquete = \"$cd_enq\" ";
		$res_del2 = db_query($sql_del2);
		if($res_del){
			echo AlertSuccess("Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
			Redireciona("?pg=11");
		}else{
		echo AlertDanger("Erro ao deletar op&ccedil;&otilde;es!");
		}
	}else{
		echo AlertDanger("Erro ao deletar pergunta!");
	}
}


$sql  = " SELECT * FROM enquete_perguntas ORDER BY cd_enquete ASC";
$res  = db_query($sql);
$rows = db_num_rows($res);
echo AlertInfo("Por motivo de seguran&ccedil;a as op&ccedil;&otilde;es da enquete n&atilde;o podem ser alteradas ap&oacute;s cadastradas!");
?>

<div>
  <form action="?pg=11&opcao=cadastrar" method="post" name="form1">
    Pergunta:
    <input class="form-control" type="text" name="pergunta" value="">
    <br/>
    <div id="novoimput"></div>
    <br/>
    <input type="button" value="Adicionar Op&ccedil;&atilde;o" onClick="mais(pergunta.value)">
    <br>
    &nbsp;<br>
    <input type="submit" value="Cadastrar">
  </form>
  <div>&nbsp;</div>
  <div height="62" colspan="2" valign="top">
    <?
        if($rows == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!");
		}
		else{
		?>
    <div class="panel panel-default">
      <div class="panel-heading">Foram encontrados
        <?= $rows; ?>
        enquetes.</div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <!-- TÍTULO DA COLUNA DE CADA TABELA -->
            <thead>
              <tr>
                <th>Pergunta:</th>
                <th>N&ordm; de Votos</th>
                <th>Data Final da Enquete</th>
                <th>Ativa/Desativa</th>
                <th>Editar</th>
                <th>Excluir</th>
              </tr>
            </thead>
            <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
            
            <!-- IMPRESSÃO DA TABELA -->
            <tbody>
              <!-- CORPO DA TABELA -->
              <? for ($i=0; $i<$rows; $i++){ 
				$res_calc  = db_query("SELECT * FROM enquete_logs WHERE cd_enquete = 1+$i");
				$rows_calc = db_num_rows($res_calc);
				
				?>
              <tr class="odd gradeX">
                <td><?= db_result($res,"ds_pergunta", $i); ?></td>
                <td><?=$rows_calc?></td>
                <td><?= ConverteData(db_result($res,"dt_fim", $i)); ?></td>
                <td align="center"><?
				if (db_result($res,"ie_situacao", $i) == "A"){
					echo "Ativo";
				}else{
					echo "Desativado";
				}
			 ?></td>
                <td align="center"><a href="?pg=25&cd_enq=<?= db_result($res,"cd_enquete",$i); ?>"><img src="paginas/imagens/editar.png" alt="Alterar esta enquete" width="25" height="25" border="0"></a></td>
                <td align="center"><a href="?pg=11&opcao=excluir&cd_enq=<?= db_result($res,"cd_enquete",$i); ?>"><img src="paginas/imagens/excluir.png" alt="Excluir esta enquete" width="25" height="25" border="0"></a></td>
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
  <? } ?>
</div>
<script>
var input = 1;
function mais(campo) {
 
var valor = "Op&ccedil;&atilde;o "+input+" - "+campo+" <input class='form-control' type='text' name='opcao"+input+"' value=''><br>";
var nova = document.getElementById("novoimput");
var novadiv = document.createElement("div");
var nomediv = "div";
novadiv.innerHTML = "Op&ccedil;&atilde;o "+input+" <input class='form-control' type='text' name='opcao"+input+"' value=''>";
nova.appendChild(novadiv);
 
input++;
}
</script>