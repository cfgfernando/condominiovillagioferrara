<? 
include_once "paginas/autenticacao.php";

if($_GET['opcao'] == "cadastrar"){
	$email_info = $_POST['email_info'];
	
	$sql_cad = " INSERT INTO informativo (email_info) VALUES (\"$email_info\") ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		echo AlertSuccess("<b>Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=13");
	}
	else
		echo AlertDanger("Erro ao cadastrar o registro!");
}

if($_GET['opcao'] == "excluir"){
	$cd_info = $_GET['cd_info'];
	$sql_del = " DELETE FROM informativo WHERE cd_info = \"$cd_info\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("<b>Registro deletado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=13");
	}
	else
		echo AlertDanger("Erro ao deletar o registro!");
}

if($_GET['opcao'] == "deletar_emails"){
$valores = $_POST['excluir'];
	for($i=0; $i<count($valores); $i++){
		$sql_del = "DELETE FROM informativo WHERE cd_info = $valores[$i]";
		$res_del = db_query($sql_del);
		$contador += 1;
	}
	if($res_del){
		echo AlertSuccess("<b>$contador registros deletados com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=13");
	}else{
		echo AlertDanger("Erro ao alterar o registro!");
	}
}

$sql  = " SELECT * FROM informativo ORDER BY email_info ASC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

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
<div>
<div width="725" height="19" align="center" valign="middle" class="titulo">
  <h2>- Informativo -</h2>
</div>
<div height="19" align="center" valign="middle" class="texto">
  <?= $msg; ?>
</div>
  <form action="?pg=13&opcao=cadastrar" method="post" name="form1">
    <div width="180" height="20" align="left" valign="middle" class="texto">E-mail:&nbsp;</div>
    <div width="545" align="left" valign="middle" class="texto">
      <input name="email_info" type="text" class="form-control" id="email_info" size="60" maxlength="80">
    </div>
    <div> &nbsp;</div>
    <div height="28" colspan="2" align="center" valign="bottom" class="texto">
      <input name="button" type="submit" class="btn btn-default" id="button" value="  Cadastrar  ">
    </div>
    <div> &nbsp;</div>
  </form>
<div height="47" align="center" valign="middle" class="texto">
  <? if ($rows > 0){
	echo "<p><span class='texto'><font color='blue'><b> <a href=\"?pg=27\"><img src=\"paginas/imagens/80.gif\" alt=\"Enviar e-mail informativo\" width=\"17\" height=\"15\" border=\"0\"> Enviar e-mail informativo!</a> </b></font></span></p>";
	}
	?>
</div>
<div height="124" valign="top">
  <?
        if($rows == 0){
			echo AlertInfo("N&atilde;o h&aacute; registros de dados!");
		}
		else{
		?>
        
        <form action="?pg=13&opcao=deletar_emails" method="post" name="form1" onSubmit="return ConfirmForm('Deseja realmente excluir os usuários selecionados?');">
              <div class="panel panel-default">
  <div class="panel-heading">Foram encontrados
    <?= $rows; ?>
    registros na agenda.</div>
  <div class="panel-body">
    <div class="table-responsive">
    <div>
    		<label for="todos">
              <input name="todos" type="checkbox" id="todos" value="sim" onClick="CheckUnCheckAll(document.getElementsByName('excluir[]'),this)">
              Selecionar Todos </label>
            </strong>
            <input name="Deletar" style="float:none; width:25%;" type="submit" class="btn btn-warning" value="Excluir Usu&aacute;rios Selecionados!">
            </div>
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <!-- TÍTULO DA COLUNA DE CADA TABELA -->
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>E-mail</th>
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
          <td><input name="excluir[]" type="checkbox" id="excluir[]" value="<?=db_result($res, "cd_info", $i); ?>"></td>
          <td><?= db_result($res,"email_info",$i); ?></td>
          <td align="center"><a href="?pg=28&cd_info=<?= db_result($res,"cd_info",$i); ?>"><img src="paginas/imagens/editar.png" width="25" height="25" border="0"></a></td>
          <td align="center"><a href="?pg=13&opcao=excluir&cd_info=<?= db_result($res,"cd_info",$i); ?>"><img src="paginas/imagens/excluir.png" width="25" height="25" border="0"></a></td>
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
</div>
