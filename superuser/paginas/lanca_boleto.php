<?
$sql  = " SELECT * FROM morador ORDER BY nm_morador ASC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

$res_email  = db_query(" SELECT * FROM morador ");


if($_GET['opcao'] == "inserir"){
$idmorador_dtmora = $_POST['idmorador_dtmora'];
$valor_dtmora = $_POST['valor_dtmora'];
$valoracres1_dtmora = ConverteRealCad($_POST['valoracres1_dtmora']);
$valoracres2_dtmora = ConverteRealCad($_POST['valoracres2_dtmora']);
$demonstrativo2_dtmora = $_POST['demonstrativo2_dtmora'];
$demonstrativo3_dtmora = $_POST['demonstrativo3_dtmora'];
$nossonum_dtmora = $_POST['nossonum_dtmora'];
$numdoc_dtmora = $_POST['numdoc_dtmora'];
$venc_dtmora = ConverteData($_POST['venc_dtmora']);
$mes_dtmora = $_POST['mes_dtmora'];
$ano_dtmora = $_POST['ano_dtmora'];

for($i=0; $i<count($idmorador_dtmora); $i++){
$sql_mora = " INSERT INTO dados_morador(idmorador_dtmora
								,valor_dtmora
								,valoracres1_dtmora
								,valoracres2_dtmora
								,demonstrativo2_dtmora
								,demonstrativo3_dtmora
								,nossonum_dtmora
								,numdoc_dtmora
								,venc_dtmora
								,mes_dtmora
								,ano_dtmora) VALUES (\"$idmorador_dtmora[$i]\"
													,\"$valor_dtmora\"
													,\"$valoracres1_dtmora\"
													,\"$valoracres2_dtmora\"
													,\"$demonstrativo2_dtmora\"
													,\"$demonstrativo3_dtmora\"
													,\"$nossonum_dtmora\"
													,\"$numdoc_dtmora\"
													,\"$venc_dtmora\"
													,\"$mes_dtmora\"
													,\"$ano_dtmora\") ";
$res_mora  = db_query($sql_mora) or die(db_error());
$contador += 1;
	if($res_mora){
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: $titulo_pagina <$contato_email>\r\n";
		$assunto = "Novo boleto disponivel $mes_dtmora/$ano_dtmora";
		$mensagem = "boleto disponivel";
		$email = db_result($res_email,"email_morador",$idmorador_dtmora[$i]);
				mail($email,$assunto,$mensagem,$headers);
		}
}
	if($res_mora){
		echo AlertSuccess("<b>$contador Registro inserido com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=39");
	} else {
		echo AlertDanger("Erro ao inserir o registro!");
	}
}



if($_GET['opcao'] == "excluir"){
	$id_dtmora = $_GET['id_dtmora'];
	$sql_del = " DELETE FROM dados_morador WHERE id_dtmora = $id_dtmora ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=39");
	}
	else
		echo AlertDanger("Erro ao deletar o registro!");
}

if($_GET['opcao'] == "deletar_todos"){
$valores = $_POST['excluir'];
	for($i=0; $i<count($valores); $i++){
		$sql_del = "DELETE FROM dados_morador WHERE id_dtmora = $valores[$i]";
		$res_del = db_query($sql_del);
		$contador += 1;
	}
	if($res_del){
		echo AlertSuccess("<b>$contador registros deletados com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=39");
	}else{
		echo AlertDanger("Erro ao alterar o registro!");
	}
}
?>
<script type="text/javascript">
		
function CheckUnCheckAll(field,valor){
	if (valor.checked==true) {
		for (i = 0; i < field.length; i++) {
			field[i].checked = true;
		}
	} else {
		for (i = 0; i < field.length; i++) {
			field[i].checked = false;
		}
	}
}
		
</script>

<form action="?pg=39&opcao=inserir" method="post" enctype="multipart/form-data" name="form1">
  <div align="left" valign="middle" class="texto">Selecione um ou mais moradores: <strong style="font-size:9px;">(Segure ctrl ou shift para vários)</strong>
    <select name="idmorador_dtmora[]" class="form-control" id="idmorador_dtmora[]" multiple="multiple" required="required">
      <?
	for($i=0; $i<db_num_rows($res); $i++){
			echo "<option value=\"".db_result($res,"cd_morador",$i)."\">".db_result($res,"nm_morador",$i)."</option> <br />";
		}
	?>
    </select>
    <br />
  </div>
  <div align="left" valign="middle" class="texto">Valor:
    <input name="valor_dtmora" type="text" class="form-control" size="8" maxlength="8" placeholder="Ex. 1235,00" required="required">
  </div>
  <div style="clear: left;">&nbsp;</div>
  <div class="tamanho">
    <div  align="left" valign="middle" class="texto" style="width:70%; float:left;">Acrescimo 1:
      <input name="demonstrativo2_dtmora" type="text" class="form-control" size="200" maxlength="200">
    </div>
    <div style="width:2%; float:left;">&nbsp;</div>
    <div  align="left" valign="middle" class="texto" style="width:28%; float:left;">Valor do acrescimo 1:
      <input name="valoracres1_dtmora" type="text" class="form-control" size="8" maxlength="8" placeholder="Ex. 1235,00">
    </div>
    <div style="clear: left;">&nbsp;</div>
    <div align="left" valign="middle" class="texto" style="width:70%; float:left;">Acrescimos 2:
      <input name="demonstrativo3_dtmora" type="text" class="form-control" size="200" maxlength="200">
    </div>
    <div style="width:2%; float:left;">&nbsp;</div>
    <div align="left" valign="middle" class="texto" style="width:28%; float:left;">Valor do acrescimo 2:
      <input name="valoracres2_dtmora" type="text" class="form-control" size="8" maxlength="8" placeholder="Ex. 1235,00">
    </div>
  </div>
  <div style="clear: left;">&nbsp;</div>
  <div class="tamanho">
    <div align="left" valign="middle" class="texto" style="width:49%; float:left;">Nosso N&uacute;mero:
      <input name="nossonum_dtmora" type="text" class="form-control" size="7" maxlength="7" required="required">
    </div>
    <div style="width:2%; float:left;">&nbsp;</div>
    <div align="left" valign="middle" class="texto" style="width:49%; float:left;">N&deg; do Documento:
      <input name="numdoc_dtmora" type="text" class="form-control" size="7" maxlength="7" required="required">
    </div>
  </div>
  <div style="clear: left;">&nbsp;</div>
  <div class="tamanho">
    <div align="left" valign="middle" class="texto" style="width:32%; float:left;">Vencimento:
      <input name="venc_dtmora" type="text" class="form-control" size="10" maxlength="10" id="calendario" onkeypress="return txtBoxFormat(this, '99/99/9999', event);">
    </div>
    <div style="width:1.8%; float:left;">&nbsp;</div>
    <div align="left" valign="middle" class="texto" style="width:32%; float:left;">M&ecirc;s Refer&ecirc;ncia:
      <select name="mes_dtmora" class="form-control" id="mes_dtmora">
        <option value="Jan"> Janeiro</option>
        <option value="Fev"> Fevereiro</option>
        <option value="Mar"> Mar&ccedil;o</option>
        <option value="Abr"> Abril</option>
        <option value="Mai"> Maio</option>
        <option value="Jun"> Junho</option>
        <option value="Jul"> Julho</option>
        <option value="Ago"> Agosto</option>
        <option value="Set"> Setembro</option>
        <option value="Out"> Outubro</option>
        <option value="Nov"> Novembro</option>
        <option value="Dez"> Dezembro</option>
      </select>
    </div>
    <div style="width:1.8%; float:left;">&nbsp;</div>
    <div align="left" valign="middle" class="texto" style="width:32%; float:left;">Ano Refer&ecirc;ncia:
      <select name="ano_dtmora" class="form-control" id="ano_dtmora">
        <? for ($i =0; $i < 3; $i++){ ?>
        <option value="<?=date("Y")+$i; ?>">
        <?=date("Y")+$i; ?>
        </option>
        <? } ?>
      </select>
    </div>
  </div>
  <div>
    <p>&nbsp;</p>
  </div>
  <div height="40" colspan="2" align="center" valign="middle" class="texto">
    <input name="button" type="submit" class="btn btn-default" id="button" value="  Inserir  ">
  </div>
</form>
<div>
  <p>&nbsp;</p>
</div>
<? $mesatual = substr(ConverteMes(date("m")), 0, 3);?>
<?
$sql_lanca  = " SELECT * FROM dados_morador WHERE mes_dtmora LIKE '$mesatual' ";
$res_lanca  = db_query($sql_lanca);
$rows_lanca = db_num_rows($res_lanca);
?>


<div height="124" valign="top">
    <?
        if($rows_lanca == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!");
		}
		else{
		?>
    <form action="?pg=39&opcao=deletar_todos" method="post" name="form1" onSubmit="return ConfirmForm('Deseja realmente excluir todos lan&ccedil;amentos?');">
      <div class="panel panel-default">
        <div class="panel-heading">Foram encontrados
          <?= $rows_lanca."/".$rows; ?>
          registros com lan&ccedil;amentos para o m&ecirc;s corrente.</div>
        <div class="panel-body">
          <div class="table-responsive">
            <div>
              <label for="todos">
                <input name="todos" type="checkbox" id="todos" value="sim" onClick="CheckUnCheckAll(document.getElementsByName('excluir[]'),this)">
                Selecionar Todos </label>
              </strong>
              <input name="Deletar" style="float:none; width:25%;" type="submit" class="btn btn-warning" value="Excluir todos lan&ccedil;amentos!">
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <!-- TÍTULO DA COLUNA DE CADA TABELA -->
              <thead>
                <tr>
                  <th>&nbsp;</th>
                  <th>Nome</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
              <!-- IMPRESSÃO DA TABELA -->
              <tbody>
                <!-- CORPO DA TABELA -->
                <? for ($i=0; $i<$rows_lanca; $i++){ 
				$busca = db_result($res_lanca,"idmorador_dtmora",$i);
				$res_nome  = db_query(" SELECT * FROM morador WHERE cd_morador = $busca ");
				?>
                <tr class="odd gradeX">
                  <td><input name="excluir[]" type="checkbox" id="excluir[]" value="<?=db_result($res_lanca,"id_dtmora",$i); ?>"></td>
                  <td><?= db_result($res_nome,"nm_morador"); ?></td>
                  <td align="center"><a href="?pg=40&id_dtmora=<?= db_result($res_lanca,"id_dtmora",$i); ?>"><img src="paginas/imagens/editar.png" width="25" height="25" border="0"></a></td>
                  <td align="center"><a href="?pg=39&opcao=excluir&id_dtmora=<?= db_result($res_lanca,"id_dtmora",$i); ?>"><img src="paginas/imagens/excluir.png" width="25" height="25" border="0"></a></td>
                </tr>
                <? } ?>
                <!-- CORPO DA TABELA -->
              </tbody>
              <!-- IMPRESSÃO DA TABELA -->
            </table>
          </div>
        </div>
      </div>
    </form>
    <? } ?>
  </div>