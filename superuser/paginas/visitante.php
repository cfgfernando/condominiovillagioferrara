<? 
include_once "paginas/autenticacao.php";
if($exibir_visitantes == "1"){ 

$sql_cat = " SELECT * FROM morador ORDER BY nm_morador ASC ";
$res_cat = db_query($sql_cat);
	
if($_GET['opcao'] == "excluir"){
	if($_SESSION['CD_MORADOR'] == db_result($resx,'cd_morador',$id_moradorx) || $_SESSION['CD_CAT_USUARIO'] == 4){
	$id_visit = $_GET['id_visit'];
	$sql_del = " DELETE FROM visitantes WHERE id_visit = \"$id_visit\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("Visitante deletado com sucesso!");
	}else
		echo AlertDanger("Erro ao deletar o visitante!");
	}else{
		echo AlertDanger("Este visitante n&atilde;o pertence a sua lista!");
	}
}

if($_GET['opcao'] == "cadastrar"){
	$cd_morador  = $_POST['cd_morador'];
	$nome_visit   = $_POST['nome_visit'];
	$rg_visit = $_POST['rg_visit'];
	$cpf_visit   = $_POST['cpf_visit'];
	$dt_visit  	 = ConverteData(date('d/m/Y'));
	
	$sql_cad = "INSERT INTO visitantes (cd_morador, nome_visit, rg_visit, cpf_visit, data_visit) VALUES (\"$cd_morador\", \"$nome_visit\", \"$rg_visit\", \"$cpf_visit\", \"$dt_visit\") ";
	$res_cad = db_query($sql_cad);
	if($res_cad)
		echo AlertSuccess("Visitante cadastrado com sucesso!");
	else
		echo AlertDanger("Erro ao cadastrar o visitante!");
}

?>
<div>
<form action="?pg=6&op=novo&opcao=cadastrar" method="post" name="form1">
    <div>&nbsp;<br />
    </div>
    <div height="19" colspan="2" align="center" valign="middle" class="titulo">
      <h2>Adicionar Visitante</h2>
      
    <div height="19" colspan="2" align="center" valign="middle" class="texto">
      <?= $msg; ?>
    </div>
    <div width="180" height="23" align="left" valign="middle" class="texto">Nome:
      <input name="nome_visit" type="text" class="form-control" id="nome_visit" size="60" maxlength="90" >
    </div>
    <div height="23" align="left" valign="middle" class="texto">RG:
      <input name="rg_visit" type="text" class="form-control" id="rg_visit" size="16" maxlength="20">
    </div>
    <div height="23" align="left" valign="middle" class="texto">CPF:
      <input name="cpf_visit" type="text" class="form-control" id="cpf_visit" size="16" maxlength="15">
    </div>
    <? if ($_SESSION['CD_CAT_USUARIO'] == 4){ ?>
    <div height="23" align="left" valign="middle" class="texto">Morador:
     <select name="cd_morador" class="form-control" id="cd_morador">
                <option value="">Selecione o Morador</option>
                <?
		
		for($i=0; $i<db_num_rows($res_cat); $i++){
			echo "<option value=\"".db_result($res_cat,"cd_morador",$i)."\">".db_result($res_cat,"nm_morador",$i)."</option> <br />";
		}
		?>
              </select>
    </div>
    <? } ?>
    <div height="40" colspan="2" align="center" valign="middle" class="texto">
      <p><input name="button" type="submit" class="btn btn-default" id="button" value="  Cadastrar  "></p>
    </div>
  </form>
  </div>
<div>
    <div width="373" height="30" align="left" valign="middle" class="titulo">
      <h2>Visitantes de Moradores</h2>
      
    </div>
<form action="?pg=6&op=modera#a01" method="post" enctype="multipart/form-data">
	<select name="selec_morador" class="form-control" id="selec_morador">
                <option value="">Selecione o Morador</option>
                <?
			for($i=0; $i<db_num_rows($res_cat); $i++){
			echo "<option value=\"".db_result($res_cat,"cd_morador",$i)."\">".db_result($res_cat,"nm_morador",$i)."</option> <br />";
		}
		?>
              </select>
              <div>&nbsp;<br />
         <input name="button" type="submit" class="btn btn-default" id="button" value="Visualizar">
         <div><p>&nbsp;</p>

</form>


<a name="a01" href="#"></a>
<?
$id_moradorz = $_POST['selec_morador'];
$sqlz  = " SELECT * FROM visitantes WHERE cd_morador LIKE '$id_moradorz'  ";
$resz  = db_query($sqlz);
$rowsz = db_num_rows($resz);
$sqlm  = " SELECT * FROM morador WHERE cd_morador = $id_moradorz ";
$resm  = db_query($sqlm);

if($rowsz != 0){
?>

<div>

    <div height="450" valign="top"  >
      <div class="panel panel-default">
        <div class="panel-heading"><b>Visitantes do Morador: </b>
          <font color="#0000FF"><?= db_result($resm,"nm_morador"); ?></font>
          </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <!-- TÍTULO DA COLUNA DE CADA TABELA -->
              <thead>
                <tr>
                  <th style="width:40%;">Nome</th>
                  <th style="width:40%;">RG</th>
                  <th style="width:5%;">CPF</th>
                  <th style="width:10%;">Data</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <!-- FIM TÍTULO DA COLUNA DE CADA TABELA --> 
              
              <!-- IMPRESSÃO DA TABELA -->
              <tbody>
                <!-- CORPO DA TABELA -->
                <? for ($i=0; $i<$rowsz; $i++){ ?>
                <tr class="odd gradeX">
                  <td><?=db_result($resz,"nome_visit",$i); ?></td>
                  <td><?= db_result($resz,"rg_visit",$i); ?></td>
                  <td><?= db_result($resz,"cpf_visit",$i); ?></td>
                  <td><?= ConverteData(db_result($resz,"data_visit",$i)); ?></td>
                  <td align="center"><?
				  	echo "<div align='center'><a href='?pg=15&opcao=excluir&id_visit=".db_result($resz,'id_visit',$i)."'><img src='paginas/imagens/excluir.png' alt='Excluir visitante' width='22' height='22' border='0'></a></div>";?></td>
                </tr>
                <? } ?>
                <!-- CORPO DA TABELA -->
              </tbody>
              <!-- IMPRESSÃO DA TABELA -->
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<? 
}else{
	$onome= db_result($resm,"nm_morador");
	if ($id_moradorz!=0){
	echo AlertInfo("N&atilde;o h&aacute; visitantes cadastrados para o morador ".$onome);
	}else{
		echo AlertInfo("Selecione um morador");
	}
}
?>
</div>
<?  } else {
	RedirecionaRapido("?pg=0");
}?>
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