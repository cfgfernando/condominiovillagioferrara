<?php

if($_GET['opcao'] == "cadastrar"){
	$nm_info = $_POST['nm_info'];
	$email_info = $_POST['email_info'];
	
	$sql_sel = " SELECT * FROM informativo WHERE email_info = \"$email_info\" ";
	$res_sel = db_query($sql_sel);
	echo $sql_sel;
	if(db_num_rows($res_sel) > 0){
		echo AlertDanger("Este e-mail já está cadastrado em nosso informativo...");
	}
	else{
		$sql_cad = " INSERT INTO informativo (nm_info,email_info) VALUES (\"$nm_info\",\"$email_info\") ";
		$res_cad = db_query($sql_cad);
		if($res_cad){
			echo AlertSuccess("Seu e-mail foi cadastrado em nosso informativo com sucesso!");
		}
		else{
			echo AlertDanger("Não foi possível cadastrar seu e-mail em nosso informativo!");
		}
	}	
}

?>

<div>
<form action="?pg=13&opcao=cadastrar" method="post" name="form1">
  <div height="30" colspan="3" align="left" valign="middle" class="titulo">
    <h2>Informativo</h2>
    <hr>
  </div>
  <div height="26" colspan="3" align="left" valign="top" class="texto">Cadastre seu e-mail para receber o informativo:<br />
    <br />
  </div>
  <div height="20" colspan="3" align="center" valign="middle" class="texto">
    <?= $msg; ?>
  </div>
  <div width="75" height="25" align="left" valign="middle">Nome:&nbsp;</div>
  <div colspan="2" align="left" valign="middle" class="texto">
    <input name="nm_info" type="text" class="form-control" id="nm_info" size="45" />
  </div>
  <div height="25" align="left" valign="middle">E-mail:&nbsp;</div>
  <div colspan="2" align="left" valign="middle" class="texto">
    <input name="email_info" type="text" class="form-control" id="email_info" size="45" />
  </div>
  <div>
    <div height="40" colspan="2" align="left" valign="middle" class="texto">
      <p><br />
        <input name="button" type="submit" class="btn btn-primary" id="button" value="  Cadastrar  " />
      </p>
    </div>
    <div width="186" align="left" valign="middle" class="texto"><a href="?pg=25">Descadastrar e-mail</a></div>
  </div>
</form>
</div>