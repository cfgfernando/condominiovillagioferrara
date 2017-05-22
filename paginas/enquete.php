<?
if($_GET['op']== "votar"){
$resultado = $_POST['enquete'];
$login_usuario = db_result($res5, "login_usuario");
$cod_enquete = $_POST['cod_enquete'];

	if($resultado==""){
	echo alertDanger("nenhuma op&ccedil;&atilde;o foi selecionada.");
	exit;
    }else {
		
		$data_envio     = date('Y-m-d');
		$hora_envio     = strftime("%H:%M:%S");
		$res_sel = db_query("SELECT * FROM enquete_opcoes WHERE nr_opcao = \"$resultado\" AND cd_enquete = \"$cod_enquete\"");
		
		$valor = db_result($res_sel,"qt_voto")+1;
		
		$sql_consultavoto = " SELECT * FROM  enquete_logs WHERE cd_enquete = \"$cod_enquete\" AND login_usuario = \"$login_usuario\" ";
		$res_enq_consultavoto = db_query($sql_consultavoto);

		if(db_num_rows($res_enq_consultavoto) == 0){
		
		$atualizaOps = db_query("UPDATE  enquete_opcoes SET  QT_VOTO = $valor WHERE  NR_OPCAO = $resultado") or die (db_error());
		if ($atualizaOps){
			$insereLog = db_query("INSERT INTO  enquete_logs (CD_ENQUETE, NR_OPCAO, DT_ENVIO, login_usuario) VALUES ('$cod_enquete', '$resultado', CURRENT_TIMESTAMP ,  '$login_usuario');") or die (db_error());
		}

		echo alertInfo("Obrigado pelo voto!");
		}else{
			echo alertDanger("Este usu&aacute;rio j&aacute; votou nesta enquete! Permitido apenas um voto por usu&aacute;rio");
		} 
	}
}

$data = date('Y-m-d');
$sql_enq = "SELECT * FROM enquete_perguntas WHERE dt_inicio <= '$data' AND dt_fim >= '$data' AND ie_situacao = 'A'";
$res_enq = db_query($sql_enq) or die (db_error());
$rows_enq = db_num_rows($res_enq);
?>

<div width="373" height="30" align="left" valign="middle" class="titulo">
  <h2>Enquete</h2>
  <hr>
</div>
<div>
  <? if ($rows_enq == 0){
	  echo alertInfo("Nenhuma enquete dispon&iacute;vel no momento");
} 

for($i=0; $i<$rows_enq; $i++){

?>
  <div class="panel panel-default">
    <div class="panel-heading">
		<div style="float:left; width:50%; min-width:120px;"><font size="+1"><b> <?=ucfirst(db_result($res_enq,"DS_PERGUNTA", $i))?></b></font></div>
		<div align="right" style="float:right; width:50%; min-width:120px;"><? echo 'Fim da enquete: '.ConverteData(db_result($res_enq,"DT_FIM", $i)).'<br />Faltam: '.ContaDias(ConverteData(db_result($res_enq,"DT_FIM", $i))).' dias';?></div>
        <?=LimpaFloat()?>
    </div>
    <div class="panel-body">
      <div class="row" style="margin-left:20px;">
        <form name="form" method="post" action="?pg=11&op=votar">
          <?
				$cod_enquete = db_result($res_enq,"CD_ENQUETE", $i);
				
				$res_op= db_query("SELECT * FROM  enquete_opcoes WHERE  CD_ENQUETE = ".$cod_enquete);
				$rows_op= db_num_rows($res_op);
				
				for($j=0; $j<$rows_op; $j++){
					$NR_SEQUENCIA = db_result($res_op,"NR_OPCAO", $j);
					$DS_OPCAO = db_result($res_op,"DS_OPCAO", $j);
					echo 1+$j.". ";
					echo "<input type='radio' name='enquete' id='enquete' value=".$NR_SEQUENCIA."> ".ucfirst($DS_OPCAO)." <br>";
				} ?>
          <a name="a0<?=$i?>" href="#"></a>
          <p>&nbsp;</p>
          <input type="hidden" class="btn btn-primary" name="cod_enquete" id="cod_enquete" value="<?=$cod_enquete?>">
          <input class="btn btn-primary" type="submit" name="votar" id="votar" value="Votar">
          <a href="?pg=11&cod=<?=$cod_enquete?>&op=ver<?=$i?>#a0<?=$i?>" class="btn btn-primary">Resultado parcial</a>
        </form>
      </div>
      <!--    -->
      <? if($_GET['op'] == "ver".$i){ ?>
      <p>&nbsp;</p>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading"> Resultado Parcial da Enquete </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Op&ccedil;&atilde;o</th>
                    <th>Votos</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <? for($k=0; $k<$rows_op; $k++){ ?>
                    <td><?=1+$k?></td>
                    <td><?=$DS_OPCAO = db_result($res_op,"DS_OPCAO", $k)?></td>
                    <td><?=db_result($res_op,"qt_voto", $k)?></td>
                  </tr>
                  <? } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <? } ?>
    </div>
  </div>
<? } ?>
</div>
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