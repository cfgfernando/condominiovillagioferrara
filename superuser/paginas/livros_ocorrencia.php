<? 
include_once "paginas/autenticacao.php";

if($_GET['opcao'] == "cadastrar"){
	$ocorrencia  = $_POST['ocorrencia'];
	$dt_ocorrencia = ConverteData($_POST['dt_ocorrencia']);
	$sql_cad = " INSERT INTO livro_ocorrencia (ocorrencia
								  		,dt_ocorrencia)
						   		 VALUES (\"$ocorrencia\"
							 	 		,\"$dt_ocorrencia\") ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		//===============================================e-mail inicio ==================================//
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: $titulo_pagina <$contato_email>\r\n";
		$assunto = "Nova ocorrencia registrada no site $titulo_pagina";
		$mensagem = $ocorrencia;
		// Envia email para todos os moradores:
			$sql_email = " SELECT * FROM morador ";
			$res_email = db_query($sql_email);
			for($i=0; $i<db_num_rows($res_email); $i++){
				$email = db_result($res_email,"email_morador",$i);
				mail($email,$assunto,$mensagem,$headers);
			}	
		
		//===============================================e-mail fim ==================================//
		
		echo AlertSuccess("<b>Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=14");
	}
	else
		echo AlertDanger("Erro ao cadastrar o registro!");
}

if($_GET['opcao'] == "excluir"){
	$cd_ocorrencia = $_GET['cd_ocorrencia'];
	$sql_del = " DELETE FROM livro_ocorrencia WHERE cd_ocorrencia = \"$cd_ocorrencia\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=14");
	}
	else
		echo AlertDanger("Erro ao deletar o registro!");
}

$sql  = " SELECT * FROM livro_ocorrencia ORDER BY ocorrencia ASC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

?>

<div>
  <form action="?pg=14&opcao=cadastrar" method="post" name="form1">
    <div height="19" colspan="2" align="center" valign="middle" class="titulo">
      <h2>- Livro de Ocorr&ecirc;ncias-</h2>
    </div>
    <div height="19" colspan="2" align="center" valign="middle" class="texto">
      <?= $msg; ?>
    </div>
    <div width="170" height="23" align="left" valign="middle" class="texto" style="float:left; width:80%">Ocorr&ecirc;ncia:
      <input name="ocorrencia" type="text"  class="form-control" id="ocorrencia" size="80" maxlength="80">
    </div>
    <div height="23" align="left" valign="middle" class="texto" style="width:20%; float:left">Data:
      <input name="dt_ocorrencia" type="text" class="form-control" id="dt_ocorrencia" value="<?= date('d/m/Y'); ?>" size="12" maxlength="10" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);">
    </div>
    <div>&nbsp;</div>
    <div height="40" colspan="2" align="center" valign="middle" class="texto">
      <input name="button" type="submit" class="btn btn-default" id="button" value="  Cadastrar  ">
    </div>
    <div>&nbsp;</div>
    <div height="95" colspan="2" valign="top">
  </form>
  <?
        if($rows == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!");
		}
		else{
		?>
  <div class="panel panel-default">
    <div class="panel-heading">Foram encontrados
      <?= $rows; ?>
      ocorr&ecirc;ncias.</div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <!-- TÍTULO DA COLUNA DE CADA TABELA -->
          <thead>
            <tr>
              <th>Ocorr&ecirc;ncia</th>
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
              <td><?= db_result($res,"ocorrencia",$i); ?></td>
              <td><?= ConverteData(db_result($res,"dt_ocorrencia",$i)); ?></td>
              <td align="center"><a href="?pg=8&cd_agenda=<?= db_result($res,"cd_ocorrencia",$i); ?>"><img src="paginas/imagens/editar.png" alt="Alterar este registro" width="25" height="25" border="0"></a></td>
              <td align="center"><a href="?pg=14&opcao=excluir&cd_ocorrencia=<?= db_result($res,"cd_ocorrencia",$i); ?>"><img src="paginas/imagens/excluir.png" alt="Excluir este registro" width="25" height="25" border="0"></a></td>
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
