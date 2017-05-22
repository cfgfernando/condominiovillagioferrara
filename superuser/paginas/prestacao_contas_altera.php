<? 
include_once "paginas/autenticacao.php";
$diretorio = "../paginas/arquivos/prestacontas/";

if($_GET['opcao'] == "alterar"){
	$cd_max	      = $_GET['cd_contas'];
	$ds_contas    = $_POST['ds_contas'];
	
	$dt_mesano    = $_POST['dt_ano']."-".$_POST['dt_mes']."-01";
		
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
		$sql_cad = " UPDATE prestacao_contas SET  ds_contas = \"$ds_contas\"
												 ,dt_mesano = \"$dt_mesano\"	
												 ,arquivo = \"$arquivo\"
										   WHERE  cd_contas = \"$cd_max\" ";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=19");
		}else{
			echo AlertDanger("Erro ao alterar o registro!");
		}
	}
}

if($_GET['opcao'] == "excluir"){
	$cd_contas = $_GET['cd_contas'];
	$sql_arq = " SELECT * FROM prestacao_contas ";
	$res_arq = db_query($sql_arq);
	@unlink($diretorio.db_result($res_arq,"arquivo"));
}

$sql  = " SELECT * FROM prestacao_contas WHERE cd_contas = ".$_GET['cd_contas'];
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<form action="?pg=32&opcao=alterar&cd_contas=<?= $_GET['cd_contas']; ?>" method="post" enctype="multipart/form-data" name="form1">
<div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Presta&ccedil;&atilde;o de Contas -</h2></div>
       <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>
      <div width="170" height="23" align="left" valign="middle" class="texto">M&ecirc;s/Ano:&nbsp;</div>
            <div width="555" align="left" valign="middle" class="texto">
            <?
				$mesAno_cadastrado = db_result($res,"dt_mesano");
				$mes_cadastrado = substr($mesAno_cadastrado, 5, 2);
				$ano_cadastrado = substr($mesAno_cadastrado, 0, 4);
			?>
            	<select name="dt_mes" class="form-control">
                	<option value="01" <? if ($mes_cadastrado == 1){ echo "selected"; }?> >Janeiro</option>
                    <option value="02" <? if ($mes_cadastrado == 2){ echo "selected"; }?>>Fevereiro</option>
                    <option value="03" <? if ($mes_cadastrado == 3){ echo "selected"; }?>>Mar&ccedil;o</option>
                    <option value="04" <? if ($mes_cadastrado == 4){ echo "selected"; }?>>Abril</option>
                    <option value="05" <? if ($mes_cadastrado == 5){ echo "selected"; }?>>Maio</option>
                    <option value="06" <? if ($mes_cadastrado == 6){ echo "selected"; }?>>Junho</option>
                    <option value="07" <? if ($mes_cadastrado == 7){ echo "selected"; }?>>Julho</option>
                    <option value="08" <? if ($mes_cadastrado == 8){ echo "selected"; }?>>Agosto</option>
                    <option value="09" <? if ($mes_cadastrado == 9){ echo "selected"; }?>>Setembro</option>
                    <option value="10" <? if ($mes_cadastrado == 10){ echo "selected"; }?>>Outubro</option>
                    <option value="11" <? if ($mes_cadastrado == 11){ echo "selected"; }?>>Novembro</option>
                    <option value="12" <? if ($mes_cadastrado == 12){ echo "selected"; }?>>Dezembro</option>
            </select> 
            &nbsp;-&nbsp;
            <? 
				$ano_a2 = $ano_cadastrado-2;
				$ano_a1 = $ano_cadastrado-1;
				$ano_0 = $ano_cadastrado;
				$ano_p1 = $ano_cadastrado+1;
				$ano_p2 = $ano_cadastrado+2;
				
				if ($mes_anteior == 12){
					$ano_a2--;
					$ano_a1--;
					$ano_0--;
					$ano_p1--;
					$ano_p2--;
				}
			?>
           	<select name="dt_ano" class="form-control">
                	<option value="<?=$ano_a2;?>"><?=$ano_a2;?></option>
                    <option value="<?=$ano_a1;?>"><?=$ano_a1;?></option>
                    <option value="<?=$ano_0;?>" selected><?=$ano_0;?></option>
                    <option value="<?=$ano_p1;?>"><?=$ano_p1;?></option>
                    <option value="<?=$ano_p2;?>"><?=$ano_p2;?></option>
            </select> 
            </div>
      <div width="170" height="23" align="left" valign="middle" class="texto">Descri&ccedil;&atilde;o:&nbsp;</div>
            <div width="555" align="left" valign="middle" class="texto"><input name="ds_contas" type="text" class="form-control" id="ds_contas" value="<?= db_result($res,"ds_contas"); ?>" size="80" maxlength="80"></div>
       <div height="23" align="left" valign="middle" class="texto">Arquivo:&nbsp;</div>
          <div align="left" valign="middle" class="texto"><input name="arquivo" type="file" class="form-control" id="arquivo" size="50">
            <?
			$arquivo = $diretorio.db_result($res,"arquivo");
			$cd_contas = $_GET['cd_contas'];
			if( @file_exists($arquivo) && db_result($res,"arquivo") != "")
				echo " <a href=\"$arquivo\" target=\"_blank\">Ver arquivo</a>&nbsp;&nbsp;-&nbsp;&nbsp;<a href=\"?pg=32&opcao=excluir&cd_contas=$cd_contas\"><font color='red'>Excluir arquivo</font></a> ";
			?></div>
            <div>&nbsp;</div>
       <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="texto" id="button" value="  Alterar  "></div>
</form>
