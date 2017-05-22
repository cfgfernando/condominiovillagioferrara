<? if($_GET['op'] == "altera"){
	$idm = $_POST['idm'];

	$res_mora = db_query(" SELECT * FROM moramnoap WHERE id_mora = $idm");
	$parentesco = db_result($res_mora,"parentesco_mora");
	?>
	
    <hr />
  <div height="19" colspan="6" align="left" valign="middle" class="titulo">
  <h2>Editar Moradores</h2>
  </div>
  <hr />
	<div>
    <form action="?pg=28&op=altera&idm=<?=db_result($res_mora,"id_mora");?>" method="post" name="form1">
      <div>Nome:
        <input name="nome_mora" type="text" class="form-control" id="nome_mora" size="200" maxlength="90" value="<?=db_result($res_mora,"nome_mora");?>" required="required">
      </div>
      <div style="width:34%; float:left; min-width:150px;">
      Parentesco:
      <select name="parentesco_mora" class="form-control" id="parentesco_mora" required="required">
        <option value="Esposo(a)" <? if ($parentesco == "Esposo(a)"){ echo "selected"; } ?>>Esposo(a)</option>
        <option value="Filho(a)" <? if ($parentesco == "Filho(a)"){ echo "selected"; } ?>>Filho(a)</option>
        <option value="Mãe" <? if ($parentesco == "Mãe"){ echo "selected"; } ?>>Mãe</option>
        <option value="Pai" <? if ($parentesco == "Pai"){ echo "selected"; } ?>>Pai</option>
        <option value="Irmão(ã)" <? if ($parentesco == "Irmão(ã)"){ echo "selected"; } ?>>Irmão(ã)</option>
        <option value="Sobrinho(a)" <? if ($parentesco == "Sobrinho(a)"){ echo "selected"; } ?>>Sobrinho(a)</option>
        <option value="Tio(a)" <? if ($parentesco == "Tia(a)"){ echo "selected"; } ?>>Tio(a)</option>
        <option value="Primo(a)" <? if ($parentesco == "Primo(a)"){ echo "selected"; } ?>>Primo(a)</option>
        <option value="Inquilino" <? if ($parentesco == "Inquilino"){ echo "selected"; } ?>>Inquilino</option>
      </select>
      </div>
      <div style="width:33%; float:left; min-width:150px;">CPF:
        <input name="cpf_mora" type="text" class="form-control" id="cpf_mora" size="200"  onkeypress="return txtBoxFormat(this, '999.999.999-99', event);" value="<?=db_result($res_mora,"cpf_mora");?>" maxlength="14" required="required">
      </div>
      <div style="width:33%; float:left; min-width:150px;">RG:
        <input name="rg_mora" type="text" class="form-control" id="rg_mora" value="<?=db_result($res_mora,"rg_mora");?>" size="200" maxlength="90">
      </div>
      <?=LimpaFloat();?>
      <br />
      <input name="button" type="submit" class="btn btn-primary" id="button" value="  Cadastrar  ">
    </form>
    <br />
  </div>
<? } ?>