<? 
include_once "paginas/autenticacao.php";


if($_GET['opcao'] == "alterar"){
	$cd_agenda = $_GET['cd_agenda'];
	$reserva = $_POST['reserva'];
	$dt_agenda = ConverteData($_POST['dt_agenda']);
	$sql_cad = " UPDATE agenda SET reserva = \"$reserva\"
								  ,dt_agenda = \"$dt_agenda\"
							 WHERE cd_agenda = \"$cd_agenda\" ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=12");
	}
	else{
		echo AlertDanger("Erro ao alterar o registro!");
	}
}

$sql  = " SELECT * FROM agenda WHERE cd_agenda = \"".$_GET['cd_agenda']."\" ORDER BY dt_agenda DESC ";
$res  = db_query($sql);
$rows = db_num_rows($res);

?>

<form action="?pg=26&opcao=alterar&cd_agenda=<?= $_GET['cd_agenda']; ?>" method="post" name="form1">
<div>&nbsp;<br />&nbsp;</div>
            <div height="19" colspan="2" align="center" valign="middle" class="titulo"><h2>- Agenda -</h2></div>

            <div height="19" colspan="2" align="center" valign="middle" class="texto"><?= $msg; ?></div>

            <div width="170" height="23" align="left" valign="middle" class="texto">Reserva:&nbsp;</div>
            <div width="555" align="left" valign="middle" class="texto"><input name="reserva" type="text" class="form-control" id="reserva" value="<?= db_result($res,"reserva"); ?>" size="70"></div>

            <div height="23" align="left" valign="middle" class="texto">Data:&nbsp;</div>
            <div align="left" valign="middle" class="texto"><input name="dt_agenda" type="text" class="form-control" id="dt_agenda" value="<?= ConverteData(db_result($res,"dt_agenda")); ?>" size="12" maxlength="10" onKeyPress="return txtBoxFormat(this, '99/99/9999', event);">
              00/00/0000</div>

            <div height="40" colspan="2" align="center" valign="middle" class="texto"><input name="button" type="submit" class="texto" id="button" value="  Alterar  "></div>
</form>
