<? 
if ($forum_perm == 1 || $forum_admin_perm == 1){
if($exibir_forum == "1"){ ?>

<div>
  <div width="373" height="30" align="left" valign="middle" class="titulo">
    <h2>F&oacute;rum</h2>
    <div>
      <hr>
    </div>
  </div>
  <?


if($_GET['op'] == "excluir"){
	$idf = $_GET['idf'];
	$sql_del = " DELETE FROM forum WHERE id_forum = \"$idf\" ";
	$res_del = db_query($sql_del);
	if($res_del)
		echo AlertSuccess("T&oacute;pico deletado com sucesso!");
	else
		echo AlertDanger("Erro ao deletar o t&oacute;pico!");
}


if ($_GET['btn'] == "enviar"){
$titulo_forum = $_POST["titulo_forum"];
$desc_forum = $_POST["desc_forum"];
if ($titulo_forum == "" || $desc_forum== ""){
	echo AlertDanger("Campos em branco!");
}else{
$sql = "INSERT INTO forum (titulo_forum
								, desc_forum
								, data_forum
								, hora_forum)
									VALUES
										('$titulo_forum'
										,'$desc_forum'
										,now()
										,now())";
$res  = db_query($sql);

$sqlcons = " SELECT * FROM forum ORDER BY id_forum DESC";
$rescons = db_query($sqlcons);
$rowscons = db_num_rows($rescons);
$pegaId= db_result($rescons,"id_forum");

$sql2 = "INSERT INTO forum_comentarios (nome
								, email
								, mensagem
								, id_forum
								, photosmall
								, data
								, hora)
									VALUES
										('Administração'
										,'$email_sindico'
										,'$desc_forum'
										,'$pegaId'
										,'0'
										,now()
										,now())";
$res2  = db_query($sql2);
if($res2 && $res){
	echo AlertSuccess("T&oacute;pico criado com sucesso!");
}else{
	echo AlertDanger("Erro ao criar t&oacute;pico!");
}
}
}
?>
  <div id="accordion2" class="panel-group alternative">
    <?
	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
	$cmd = "SELECT * FROM forum ";
    $linhas = db_query($cmd);
    $total = db_num_rows($linhas);
	if ($total == 0){
		echo AlertInfo("Ainda n&atilde;o h&aacute; f&oacute;rum aberto!");
	}
    $registros = 10;
    $numPaginas = ceil($total/$registros);

    $inicio = ($registros*$pagina)-$registros;
    $cmd = "SELECT * FROM forum ORDER BY data_forum asc, hora_forum asc LIMIT $inicio, $registros";
    $res = db_query($cmd);
    $total = db_num_rows($res);
	$menorvalor = db_result($linhas, "id_forum");
	
	
	$sql_com = "SELECT * FROM forum_comentarios";
    $res_com = db_query($sql_com);
    $rows_com = db_num_rows($res_com);
	
	
	$sql_com = "SELECT * FROM forum_comentarios";
    $res_com = db_query($sql_com);
    $rows_com = db_num_rows($res_com);
	for($i=0; $i < $total; $i++){?>
    <div class="panel panel-default">
      <div style="width:160px; float:right; margin:0.5em;" align="right">
        <? if($forum_admin_perm == 1 ){ ?>
        <a href='?pg=26&op=excluir&idf=<?=db_result($res,"id_forum",$i)?>'><img src='paginas/imagens/excluir.gif' alt='Excluir' width='22' height='22' border='0'></a>
        <? } ?>
      </div>
      <div class="panel-heading">
        <h4 class="panel-title"> <a class="accordion-toggle" href="#collapse2-<?=db_result($res,"id_forum",$i)?>" data-parent="#accordion2" data-toggle="collapse">
          <?=db_result($res,"titulo_forum",$i)?>
          </a> </h4>
      </div>
      <div id="collapse2-<?=db_result($res,"id_forum",$i)?>" class="accordion-body collapse">
        <div class="panel-body">
          <h3 class="no-margin no-padding">
            <?=db_result($res,"desc_forum",$i)?>
          </h3>
          <p>Cria&ccedil;&atilde;o:
            <?=ConverteData(db_result($res,"data_forum",$i))?>
            -
            <?=db_result($res,"hora_forum",$i)?>
            
          <div>
            <input type="submit" value="Acessar..." onclick="location.href='?pg=27&idf=<?=db_result($res,"id_forum",$i)?>&pagina=1'" class="btn btn-primary">
          </div>
          </p>
        </div>
      </div>
    </div>
    <? } ?>
  </div>
  <div align='center' style='max-height:500px'>
    <div class='dataTables_paginate paging_simple_numbers' id='dataTables-example_paginate'>
      <ul class='pagination'>
        <? for($i = 1; $i < $numPaginas + 1; $i++) { 
			if ($pagina==0){ $pagina=1;}?>
        <li class="paginate_button <? if($pagina==$i){ echo "active";}?>" aria-controls="dataTables-example" tabindex="0"><a href='?pg=26&pagina=<?=$i?>'>
          <?=$i?>
          </a></li>
        <? } ?>
      </ul>
    </div>
  </div>
  <? if ($forum_admin_perm == 1){?>
  <div width="373" height="30" align="left" valign="middle" class="titulo">
    <h2>Criar novo T&oacute;pico</h2>
    <div>
      <hr>
    </div>
  </div>
  <form name="form1" id="form1" method="post" action="?pg=26&idf=<?=$idf?>&btn=enviar">
    <div ><strong>T&iacute;tulo:</strong></div>
    <div>
      <input class="form-control" name="titulo_forum" value="<?=$email ?>" type="text" id="titulo_forum" size="40" />
    </div>
    <div><strong>Descri&ccedil;&atilde;o:</strong></div>
    <div>
      <textarea class="form-control" name="desc_forum" cols="35" rows="5" id="desc_forum"></textarea>
    </div>
    <div>
      <p>&nbsp;</p>
    </div>
    <div>
      <p>
        <input class="btn btn-primary" type="submit" name="Submit" value="   Criar   " />
      </p>
    </div>
  </form>
  <? } ?>
</div>
<? } else {
	RedirecionaRapido("?pg=0");	
}?>
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>
