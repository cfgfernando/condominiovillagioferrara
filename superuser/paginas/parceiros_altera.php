<?
include_once "paginas/autenticacao.php";

    $id_parc = $_GET['id_parc'];

if($_GET['op'] == "alterar"){
	$nm_parc= $_POST['nm_parc'];
	$link_parc= $_POST['link_parc'];

	
	$sql_cad = " UPDATE parceiros SET nm_parc= \"$nm_parc\",link_parc= \"$link_parc\" WHERE id_parc = \"$id_parc\" ";
	$res_cad = db_query($sql_cad);
	if($res_cad){
		echo AlertSuccess("<b>Registro alterado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=36");

	}
	else{
		echo AlertDanger("Erro ao alterar o registro!");
	}
}



if($_GET['op'] != "alterar"){
        $sql  = " SELECT * FROM parceiros WHERE id_parc = ".$id_parc;
        $res  = db_query($sql);
        $rows = db_num_rows($res);

	$nm_parc= db_result($res,"nm_parc");
	$link_parc= db_result($res,"link_parc");
}

?>
<div align="center"><? echo $msg; ?></div>
<form action="?pg=36&id_parc=<? echo $id_parc; ?>&op=alterar" method="POST" enctype="multipart/form-data">
	<label for="Nome">Nome:</label>
	<input class="form-control" type="text" name="nm_parc" value="<?= $nm_parc; ?>">
	<label for="link">Link:</label>
	<input class="form-control" type="text" name="link_parc" value="<?= $link_parc; ?>">
	<input type="submit" class="btn btn-outline-success" value="Enviar"/>
</form>