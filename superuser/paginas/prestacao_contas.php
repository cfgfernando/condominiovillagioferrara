<? 
include_once "paginas/autenticacao.php";

$diretorio = "../paginas/arquivos/prestacontas/";

if($_GET['opcao'] == "cadastrar"){
	$ds_contas    = $_POST['ds_contas'];
	$dt_mesano    = $_POST['dt_ano']."-".$_POST['dt_mes']."-01";
	
	$cd_max	      = MaxCampo('cd_contas','prestacao_contas');
	
	$arquivo 	  = $_FILES['arquivo']['name'];
	$arquivo_tmp  = $_FILES['arquivo']['tmp_name'];
	
	if($arquivo != ""){
		$arquivo = strtolower($arquivo);  // Todos os caracteres minúsculos
		$extensao = strrchr($arquivo,'.');
		$arquivo = $cd_max."_prestacao_contas".$extensao;
		if( !move_uploaded_file($arquivo_tmp,$diretorio.$arquivo) ){
			echo AlertDanger("N&atilde;o foi poss&iacute;vel fazer o upload do arquivo!");
		}
	}
	if($msg == ""){
		$sql_cad = " INSERT INTO prestacao_contas (cd_contas
												  ,ds_contas
												  ,dt_mesano
												  ,arquivo)
										   VALUES (\"$cd_max\"
												  ,\"$ds_contas\"
												  ,\"$dt_mesano\"
												  ,\"$arquivo\") ";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Presta&ccedil;&atilde;o de contas cadastrada com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=19");
		}else
			echo AlertDanger("Erro ao cadastrar a presta&ccedil;&atilde;o de contas!");
	}
}

if($_GET['opcao'] == "excluir"){
	$cd_contas = $_GET['cd_contas'];
	$sql_arq = " SELECT * FROM prestacao_contas ";
	$res_arq = db_query($sql_arq);
	@unlink($diretorio.db_result($res_arq,"arquivo"));
	
	$sql_del = " DELETE FROM prestacao_contas WHERE cd_contas = \"$cd_contas\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=19");
	}
	else
		echo AlertDanger("Erro ao deletar o registro!");
}

$sql  = " SELECT * FROM prestacao_contas ORDER BY dt_mesano DESC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<form action="?pg=19&opcao=cadastrar" method="post" enctype="multipart/form-data" name="form1">
			<div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Presta&ccedil;&atilde;o de Contas -</h2></div>
           <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>
           
          <div width="170" height="23" align="left" valign="middle" class="texto">M&ecirc;s/Ano:</div><div><?
            $mes_atual = date("m");
			
			if ($mes_atual == 1){
				$mes_anterior == 12;
			}
			else{
				$mes_anterior = $mes_atual - 1;
			}
			
			?>
              <select name="dt_mes" class="form-control" style="float:left; width:20%;">
                <option value="01" <? if ($mes_anterior == 1){ echo "selected"; }?> >Janeiro</option>
                <option value="02" <? if ($mes_anterior == 2){ echo "selected"; }?>>Fevereiro</option>
                <option value="03" <? if ($mes_anterior == 3){ echo "selected"; }?>>Mar&ccedil;o</option>
                <option value="04" <? if ($mes_anterior == 4){ echo "selected"; }?>>Abril</option>
                <option value="05" <? if ($mes_anterior == 5){ echo "selected"; }?>>Maio</option>
                <option value="06" <? if ($mes_anterior == 6){ echo "selected"; }?>>Junho</option>
                <option value="07" <? if ($mes_anterior == 7){ echo "selected"; }?>>Julho</option>
                <option value="08" <? if ($mes_anterior == 8){ echo "selected"; }?>>Agosto</option>
                <option value="09" <? if ($mes_anterior == 9){ echo "selected"; }?>>Setembro</option>
                <option value="10" <? if ($mes_anterior == 10){ echo "selected"; }?>>Outubro</option>
                <option value="11" <? if ($mes_anterior == 11){ echo "selected"; }?>>Novembro</option>
                <option value="12" <? if ($mes_anterior == 12){ echo "selected"; }?>>Dezembro</option>
              </select>
              
              <? 
				$ano_a2 = date("Y")-2;
				$ano_a1 = date("Y")-1;
				$ano_0 = date("Y");
				$ano_p1 = date("Y")+1;
				$ano_p2 = date("Y")+2;
				
				if ($mes_anteior == 12){
					$ano_a2--;
					$ano_a1--;
					$ano_0--;
					$ano_p1--;
					$ano_p2--;
				}
			?>
              <select name="dt_ano" class="form-control" style="width:20%;">
                <option value="<?=$ano_a2;?>">
                <?=$ano_a2;?>
                </option>
                <option value="<?=$ano_a1;?>">
                <?=$ano_a1;?>
                </option>
                <option value="<?=$ano_0;?>" selected>
                <?=$ano_0;?>
                </option>
                <option value="<?=$ano_p1;?>">
                <?=$ano_p1;?>
                </option>
                <option value="<?=$ano_p2;?>">
                <?=$ano_p2;?>
                </option>
              </select>
              </div>
           <div>
          <div width="170" height="23" align="left" valign="middle" class="texto">Descri&ccedil;&atilde;o:<input name="ds_contas" type="text" class="form-control" id="ds_contas" size="80" maxlength="80"></div>
          <div height="23" align="left" valign="middle" class="texto">Arquivo:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="arquivo" type="file" class="form-control" id="arquivo" size="60"></div>
            </div>
            <div>&nbsp;</div>
          <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="btn btn-default" id="button" value="  Cadastrar  "></div>
          <div>&nbsp;</div>
          <div height="96" colspan="2" valign="top"><?
        if($rows == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!");
		}
		else{
		?>
              <div class="panel panel-default">
  <div class="panel-heading">Foram encontradas
                    <?= $rows; ?>
                    presta&ccedil;&otilde;es de contas cadastradas.</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <!-- TÍTULO DA COLUNA DE CADA TABELA -->
        <thead>
          <tr>
            <th>M&ecirc;s/Ano</th>
            <th>Descri&ccedil;&atilde;o</th>
            <th>Arquivo</th>
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
            <td><?= substr(ConverteData(db_result($res,"dt_mesano",$i)),3,7); ?></td>
            <td><?= db_result($res,"ds_contas",$i); ?></td>
            <td><?
				$arquivo = db_result($res,"arquivo",$i);
				$arq = $diretorio.$arquivo;
				if( @file_exists($arq) && $arquivo != "")
					echo " <a href=\"$arq\" target=\"_blank\">Ver arquivo</a> ";
				else
					echo "-";
				?></td>
            <td class="center"><a href="?pg=32&cd_contas=<?= db_result($res,"cd_contas",$i); ?>"><img src="paginas/imagens/editar.png" alt="Alterar este registro" width="25" height="25" border="0"></a></td>
            <td class="center"><a href="?pg=19&opcao=excluir&cd_contas=<?= db_result($res,"cd_contas",$i); ?>"><img src="paginas/imagens/excluir.png" alt="Excluir este registro" width="25" height="25" border="0"></a></td>
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
