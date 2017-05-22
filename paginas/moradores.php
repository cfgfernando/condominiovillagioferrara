<?
$cd_morador= db_result($res5, "cd_morador");
$cd_cat_usuario= db_result($res5, "cd_cat_usuario");


$sql_cat = " SELECT * FROM morador ORDER BY nm_morador ASC ";
$res_cat = db_query($sql_cat);
if($_GET['opcao'] == "add"){
	$nome_mora= $_POST['nome_mora'];
	$parentesco_mora= $_POST['parentesco_mora'];
	$cpf_mora= $_POST['cpf_mora'];
	$rg_mora= $_POST['rg_mora'];
	$res_cad = db_query("INSERT INTO moramnoap (cd_morador
												,nome_mora
												,parentesco_mora
												,cpf_mora
												, rg_mora)
												VALUES (
												'$cd_morador',
												'$nome_mora',
												'$parentesco_mora',
												'$cpf_mora',
												'$rg_mora')")or die(db_error());
	if ($res_cad){
		echo AlertSuccess("<b>Registro cadastrado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=28");
	}else{
		AlertDanger("Erro ao cadastrar o registro!");
	}

}
if($_GET['op'] == "atualiza"){
	$nome_mora= $_POST['nome_mora'];
	$parentesco_mora= $_POST['parentesco_mora'];
	$cpf_mora= $_POST['cpf_mora'];
	$rg_mora= $_POST['rg_mora'];
	$idm = $_GET['idm'];
	$res_atual = db_query("UPDATE moramnoap SET  nome_mora = \"$nome_mora\"
												,parentesco_mora = \"$parentesco_mora\"
												,cpf_mora = \"$cpf_mora\"
												,rg_mora = \"$rg_mora\"
												WHERE id_mora = \"$idm\"") or die(db_error());
	if ($res_atual){
		echo AlertSuccess("<b>Registro atualizado com sucesso!</b> Aguarde enquanto a p&aacute;gina &eacute; atualizada.");
				Redireciona("?pg=28");
	}else{
		AlertDanger("Erro ao alterar o registro!");
	}

}
if ( $moradores_inserir_perm == 1){
$sql_mora  = " SELECT * FROM moramnoap WHERE cd_morador = $cd_morador ORDER BY nome_mora ASC ";
$res_mora  = db_query($sql_mora);
$rows_mora = db_num_rows($res_mora);

?>

<div>
  <div height="19" colspan="6" align="left" valign="middle" class="titulo">
    <h2>Moradores</h2>
  </div>
  <hr />
  <div>
    <form action="?pg=28&opcao=add" method="post" name="form1">
      <div>Nome:
        <input name="nome_mora" type="text" class="form-control" id="nome_mora" size="200" maxlength="90" required="required">
      </div>
      <div style="width:34%; float:left; min-width:150px;"> Parentesco:
        <select name="parentesco_mora" class="form-control" id="parentesco_mora" required="required">
          <option value="Esposo(a)">Esposo(a)</option>
          <option value="Filho(a)">Filho(a)</option>
          <option value="Mãe">Mãe</option>
          <option value="Pai">Pai</option>
          <option value="Irmão(ã)">Irmão(ã)</option>
          <option value="Sobrinho(a)">Sobrinho(a)</option>
          <option value="Tio(a)">Tio(a)</option>
          <option value="Primo(a)">Primo(a)</option>
          <option value="Inquilino">Inquilino</option>
        </select>
      </div>
      <div style="width:33%; float:left; min-width:150px;">CPF:
        <input name="cpf_mora" type="text" class="form-control" id="cpf_mora" size="200"  onkeypress="return txtBoxFormat(this, '999.999.999-99', event);" maxlength="14" required="required">
      </div>
      <div style="width:33%; float:left; min-width:150px;">RG:
        <input name="rg_mora" type="text" class="form-control" id="rg_mora" size="200" maxlength="90">
      </div>
      <?=LimpaFloat();?>
      <br />
      <input name="button" type="submit" class="btn btn-primary" id="button" value="  Cadastrar  ">
    </form>
    <br />
  </div>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th width="50%">Nome</th>
              <th width="20%">Parentesco</th>
              <th width="10%">CPF</th>
              <th width="10%">RG</th>
              <th width="10%" align="center">Editar</th>
            </tr>
          </thead>
          <tbody>
            <? for ($i=0; $i<$rows_mora; $i++){ ?>
            <tr>
              <td><?=db_result($res_mora,"nome_mora", $i); ?></td>
              <td><?=db_result($res_mora,"parentesco_mora", $i); ?></td>
              <td><?=db_result($res_mora,"cpf_mora", $i); ?></td>
              <td><?=db_result($res_mora,"rg_mora", $i); ?></td>
              <td><a href='?pg=28&op=altera&idm=<?=db_result($res_mora,"id_mora", $i)?>#a02'> <img src='paginas/imagens/editar.png' alt='Alterar esta enquete' width='25' height='25' border='0'></a></td>
            </tr>
            <? } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<? if($_GET['op'] == "altera"){
	$idm = $_GET['idm'];
	$res_mora = db_query(" SELECT * FROM moramnoap WHERE id_mora = $idm");
	$parentesco = db_result($res_mora,"parentesco_mora");
	?>
<a name="a02" href="#"></a>
<hr />
<div height="19" colspan="6" align="left" valign="middle" class="titulo">
  <h2>Editar Moradores</h2>
</div>
<hr />
<div>
  <form action="?pg=28&op=atualiza&idm=<?=db_result($res_mora,"id_mora");?>" method="post" name="form1">
    <div>Nome:
      <input name="nome_mora" type="text" class="form-control" id="nome_mora" size="200" maxlength="90" value="<?=db_result($res_mora,"nome_mora");?>" required="required">
    </div>
    <div style="width:34%; float:left; min-width:150px;"> Parentesco:
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
    <input name="button" type="submit" class="btn btn-primary" id="button" value="  Alterar  ">
  </form>
  <br />
</div>
<? } ?>
<? } if ($moradores_admin_perm == 1){
$id_morador = $_POST['idmora'];	

$sql_mora  = " SELECT * FROM moramnoap WHERE cd_morador = $id_morador ORDER BY nome_mora ASC ";
$res_mora  = db_query($sql_mora);
$rows_mora = db_num_rows($res_mora);
?>
<hr />
<div height="19" colspan="6" align="left" valign="middle" class="titulo">
  <h2>Ver outros moradores</h2>
</div>
<hr />
<div height="23" align="left" valign="middle" class="texto">Morador:
  <form action="?pg=28#a01" method="post" name="form1">
    <select name="idmora" class="form-control" id="idmora" required="required">
      <option value="">Selecione o Morador</option>
      <?
	for($i=0; $i<db_num_rows($res_cat); $i++){
		echo "<option value=\"".db_result($res_cat,"cd_morador",$i)."\">".db_result($res_cat,"nm_morador",$i)."</option> <br />";
		}
		?>
    </select>
    <div><br />
      <input name="button" type="submit" class="btn btn-primary" id="button" value="Visualizar">
    </div>
    <br />
  </form>
  <a name="a01" href="#"></a>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th width="50%">Nome</th>
              <th width="20%">Parentesco</th>
              <th width="10%">CPF</th>
              <th width="10%">RG</th>
            </tr>
          </thead>
          <tbody>
            <? for ($i=0; $i<$rows_mora; $i++){ ?>
            <tr>
              <td><?=db_result($res_mora,"nome_mora", $i); ?></td>
              <td><?=db_result($res_mora,"parentesco_mora", $i); ?></td>
              <td><?=db_result($res_mora,"cpf_mora", $i); ?></td>
              <td><?=db_result($res_mora,"rg_mora", $i); ?></td>
            </tr>
            <? } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<? } ?>
<script type="text/javascript">
			jQuery.fn.smoothScroll = function(){
				$(this).each(function(){
					var node = $(this);
					$(node).click(function(e){
						var anchor = $(this).attr('href');
						anchor = anchor.split("#");
						anchor = anchor[1];
						var t = 0;
						var found = false;
						var tName = 'a[name='+anchor+']';
						var tId = '#'+anchor;
						if (!!$(tName).length){
							t = $(tName).offset().top;
							if ($(tName).text() == ""){
								t = $(tName).parent().offset().top;
							}
							found = true;
						} else if(!!$(tId).length){
							t = $(tId).offset().top;
							found = true;
						}
						if (found){
							$("body, html").animate({scrollTop: t}, 500);
						}
						//e.preventDefault();
					});
				});
				var lAnchor = location.hash;
				if (lAnchor.length > 0){
					lAnchor = lAnchor.split("#");
					lAnchor = lAnchor[1];
					if (lAnchor.length > 0){
						$("body, html").scrollTop(0);
						var lt = 0;
						var lfound = false;
						var ltName = 'a[name='+lAnchor+']';
						var ltId = '#'+lAnchor;
						if (!!$(ltName).length){
							lt = $(ltName).offset().top;
							if ($(ltName).text() == ""){
								lt = $(ltName).parent().offset().top;
							}
							lfound = true;
						} else if(!!$(ltId).length){
							lt = $(ltId).offset().top;
							lfound = true;
						}
						if (lfound){
							$("body, html").animate({scrollTop: lt}, 500);
						}
					}
				}
			}
			$('.anchorList a').smoothScroll();
		</script>