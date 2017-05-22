<? 
include_once "paginas/autenticacao.php";


if($_GET['opcao'] == "alterar"){
	$cd_res	  = $_GET['cd_res'];
	$nm_res  	  = $_POST['nm_res'];
	$fone_res    = $_POST['fone_res'];
	$celular_res = $_POST['celular_res'];
	$email_res   = $_POST['email_res'];
    $status_res  = $_POST['status_res'];
	$ds_res  	  = $_POST['ds_res'];
	$dt_res  	  = ConverteData($_POST['dt_res']);
	$datamens	= $_POST['dt_res'];
	
	$sql_cad = " UPDATE reservas SET  nm_res = \"$nm_res\" ,status_res = \"$status_res\"
								  		  ,fone_res = \"$fone_res\"
										  ,celular_res = \"$celular_res\"
										  ,email_res = \"$email_res\"
										  ,ds_res = \"$ds_res\"
										  ,dt_res = \"$dt_res\"
									WHERE  cd_res = \"$cd_res\" ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		$sqli  = " SELECT * FROM reservas WHERE cd_res = ".$_GET['cd_res'];
        $resi  = db_query($sqli);
		$nome = db_result($res,"nm_res");
		$data = ConverteData(db_result($res,"dt_res"));
		//===============================================e-mail inicio ==================================//
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: $titulo_pagina <$contato_email>\r\n";
		$assunto = "Novo status de reserva $titulo_pagina";
		$mensagem = "A reserva do morador $nm_res, para o dia $datamens est&aacute; com novo status e foi <b>$status_res<\b>.";
		// Envia email para todos os moradores:
			$sql_email = " SELECT * FROM morador ";
			$res_email = db_query($sql_email);
			for($i=0; $i<db_num_rows($res_email); $i++){
				$email = db_result($res_email,"email_morador",$i);
				mail($email,$assunto,$mensagem,$headers);
			}	
		
		//===============================================e-mail fim ==================================//
		
		
		echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=10");
	}else{
		echo AlertDanger("Erro ao alterar o registro!");
	}
}

$sql  = " SELECT * FROM reservas WHERE cd_res = ".$_GET['cd_res'];
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('ds_res', {enterMode: Number(2)} );
};
</script>
<form action="?pg=34&opcao=alterar&cd_res=<?= $_GET['cd_res']; ?>" method="post" name="form1">
          <div>&nbsp;<br />&nbsp;</div>
            <div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Editar Reserva -</h2><br /></div>

            <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>

            <div width="180" height="23" align="left" valign="middle" class="texto">Nome:&nbsp;<font size=1>(Somente Leitura)</font></div>
            <div width="545" align="left" valign="middle" class="texto"><input name="nm_res" type="text" class="form-control" id="nm_res" value="<?= db_result($res,"nm_res"); ?>" size="60" maxlength="60" readonly></div>

            <div height="23" align="left" valign="middle" class="texto">Telefone:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="fone_res" type="text" class="form-control" id="fone_res" onKeyPress="return txtBoxFormat(this, '(99)9999-9999', event);" value="<?= db_result($res,"fone_res"); ?>" size="16" maxlength="13">
</div>

            <div height="23" align="left" valign="middle" class="texto">Celular:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="celular_res" type="text" class="form-control" id="celular_res" onKeyPress="return txtBoxFormat(this, '(99)9999-9999', event);" value="<?= db_result($res,"celular_res"); ?>" size="16" maxlength="13">
</div>

            <div height="23" align="left" valign="middle" class="texto">E-mail:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="email_res" type="text" class="form-control" id="email_res" value="<?= db_result($res,"email_res"); ?>" size="60" maxlength="60"></div>

            <div height="23" align="left" valign="top" class="texto">Produto/Descri&ccedil;&atilde;o:&nbsp; <font size=1>(Somente Leitura)</font></div>
            <div align="left" valign="middle" class="texto"><textarea name="ds_res" cols="60" rows="10" class="form-control" id="ds_res" readonly><?= db_result($res,"ds_res"); ?>
</textarea></div>

            <div height="23" align="left" valign="middle" class="texto">Data:&nbsp;<font size=1>(Somente Leitura)</font></div>
            <div align="left" valign="middle" class="texto"><input name="dt_res" type="text" class="form-control" id="dt_res" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);" value="<?= ConverteData(db_result($res,"dt_res")); ?>" size="12" maxlength="10" readonly></div>
<div>&nbsp;<br />&nbsp;</div>
<div height="19" colspan="2" align="center" valign="middle" class="texto"><font color='blue' class='alert alert-info' role='alert'>O status atual &eacute;: <b><? echo db_result($res,"status_res"); ?> - Clique <a href="?pg=10"><b>aqui</b></a> para voltar.</b></font></div>
<div>Selecione a sua decis&atildeo sobre o evento:</div>
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-success <? if(db_result($res,"status_res") == "Aprovado"){ echo "active";} ?>">
    <input type="radio" value="Aprovado" name="status_res" id="option1" <? if(db_result($res,"status_res") == "Aprovado"){ echo "checked";} ?>> Aprovar
  </label>
  <label class="btn btn-danger <? if(db_result($res,"status_res") == "Reprovado"){ echo "active";} ?>">
    <input type="radio" value="Reprovado" name="status_res" id="option2" <? if(db_result($res,"status_res") == "Reprovado"){ echo "checked";} ?>> Rejeitar
  </label>
</div>


            <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="btn btn-info" id="button" value="  Alterar  "></div>

</form>

