<? 
include_once "paginas/autenticacao.php";

if($_GET['opcao'] == "alterar"){
	$email_info = $_POST['email_info'];
	$cd_info 	= $_GET['cd_info'];
	
	$sql_cad = " UPDATE informativo SET email_info = \"$email_info\" WHERE cd_info = \"$cd_info\" ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=13");
	}else{
		echo AlertDanger("Erro ao alterar o registro!");
	}
}

$sql  = " SELECT * FROM informativo WHERE cd_info = ".$_GET['cd_info'];
$res  = db_query($sql);
$rows = db_num_rows($res);

?>

<form action="?pg=28&opcao=alterar&cd_info=<?= $_GET['cd_info']; ?>" method="post" name="form1">
  <div width="725" height="19" align="center" valign="middle" class="titulo"><h2>- Informativo -</h2></div>
  <div height="19" align="center" valign="middle" class="texto">
    <?= $msg; ?>
  </div>
  <div width="180" height="20" align="left" valign="middle" class="texto">E-mail:&nbsp;</div>
  <div width="545" align="left" valign="middle" class="texto">
    <input name="email_info" type="text" class="form-control" id="email_info" value="<?= db_result($res,"email_info"); ?>" size="60" maxlength="80">
  </div>
  <div>&nbsp;</div>
  <div height="28" colspan="2" align="center" valign="bottom" class="texto">
    <input name="button" type="submit" class="texto" id="button" value="  Alterar  ">
  </div>
</form>
