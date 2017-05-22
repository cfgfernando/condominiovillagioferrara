<?
if($_GET['opcao'] == "email"){	  
	$assunto = $_POST['assunto'];
	$mensagem = nl2br($_POST['mensagem']);
	$conta_ok = 0;
	$conta_erro = 0;
		
	$arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;

	if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){
	
		$fp = fopen($_FILES["arquivo"]["tmp_name"],"rb");
		$anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"]));          
		$anexo = base64_encode($anexo); 
		fclose($fp);
		
		$anexo = chunk_split($anexo); 
		
		$boundary = "XYZ-" . date("dmYis") . "-ZYX"; 
	
		$mens = "--$boundary\n";
		$mens .= "Content-Transfer-Encoding: 8bits\n";
		$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n"; //plain
		$mens .= "$mensagem\n";
		$mens .= "--$boundary\n";
		$mens .= "Content-Type: ".$arquivo["type"]."\n"; 
		$mens .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n"; 
		$mens .= "Content-Transfer-Encoding: base64\n\n"; 
		$mens .= "$anexo\n"; 
		$mens .= "--$boundary--\r\n"; 
		
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: $nome <$email>\r\n"; 
		$headers .= "$boundary\n";
		
		$sql  = " SELECT * FROM morador";
		$res  = db_query($sql);
		for($i=0; $i<db_num_rows($res); $i++){
			$email_destino = db_result($res,"email_morador",$i);
			if(mail($email_destino,$assunto,$mens,$headers)){
				$conta_ok += 1;
			}
			else{
				$conta_erro += 1;
			}
		}
		
		$sql_s = " SELECT * FROM informativo ";
		$res_s = db_query($sql_s);
		for($i=0; $i<db_num_rows($res_s); $i++){
			$email_destino = db_result($res_s,"email_info",$i);
			if(mail($email_destino,$assunto,$mens,$headers)){
				$conta_ok += 1;
			}
			else{
				$conta_erro += 1;
			}
		}
		$total_emails = db_num_rows($res_s)+db_num_rows($res);
		echo AlertWarning("Foram enviados $conta_ok de $total_emails e-mails dos inscritos. -  Ocorreram erros em $conta_erro de $total_emails e-mails dos inscritos");
	}
		
	else{
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: $nome <$email>\r\n";
		
		$sql  = " SELECT * FROM morador";
		$res  = db_query($sql);
		for($i=0; $i<db_num_rows($res); $i++){
			$email_destino = db_result($res,"email_morador",$i);
			if(mail($email_destino,$assunto,$mens,$headers)){
				$conta_ok += 1;
			}
			else{
				$conta_erro += 1;
			}
		} 
			
		$sql_s = " SELECT * FROM informativo ";
		$res_s = db_query($sql_s);
		for($i=0; $i<db_num_rows($res_s); $i++){
			$email_destino = db_result($res_s,"email_info",$i);
			if(mail($email_destino,$assunto,$mensagem,$headers)){
				$conta_ok += 1;
			}else{
				$conta_erro += 1;
				}
			}
		$total_emails = db_num_rows($res_s)+db_num_rows($res);
		echo AlertWarning("Foram enviados $conta_ok de $total_emails e-mails dos inscritos. -  Ocorreram erros em $conta_erro de $total_emails e-mails dos inscritos");
	}
}
?>
<script type="text/javascript">
window.onload = function(){
	CKEDITOR.replace('mensagem', {enterMode: Number(2)} );
};
</script>
<div>
	<div height="25" colspan="2" align="center" valign="middle" class="titulo"><p>
		<h2>- Informativo -</h2>
	</p></div>
	<form action="?pg=27&opcao=email" method="post" name="form_email">
		<div width="142" height="25" align="left" valign="middle" class="texto"><strong>Assunto:&nbsp;</strong>
		<input name="assunto" type="text" class="form-control" id="assunto" value="Informativo" size="50" maxlength="70"></div>
		<div height="25" align="left" valign="middle" class="texto"><strong>Anexo:</strong>
		<input name="arquivo" type="file" class="form-control" id="arquivo" size="40"></div>
		<div height="25" align="left" valign="middle" class="texto"><stong>Mensagem:&nbsp;</strong>
		<textarea name="mensagem" cols="80" rows="12" class="form-control" id="mensagem"></textarea></div>
		<div>&nbsp;</div>
		<div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button2" type="submit" class="btn btn-default" id="button2" value="Enviar E-mail"></div>

	</form>
</div>