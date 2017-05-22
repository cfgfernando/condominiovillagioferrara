<?php
	$sql_status  = " SELECT * FROM classificados WHERE status_clas LIKE 'Aprovado' ";
	$res_status  = db_query($sql_status);
	$rows_status = db_num_rows($res_status);


    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
    $cmd = "select * from classificados";
    $classificados = db_query($cmd);
    $total = db_num_rows($classificados);
    $registros = 10;
    $numPaginas = ceil($total/$registros);
    $inicio = ($registros*$pagina)-$registros;
    $cmd = "select * from classificados limit $inicio,$registros";
    $classificados = db_query($cmd);
    $total = db_num_rows($classificados); 	
	?>

    <div>
  <div width="373" height="30" align="left" valign="middle" class="titulo">
    <h2>Classificados</h2><div height='20' align='center' valign='middle'><img src='paginas/imagens/linha_pontilhada_19.gif' width='100%' height='3' /></div>
  </div>
  <div height="39" valign="top">Quer publicar algum classificado? <a href="?pg=9" style="text-decoration:underline; font-size:18px;">Clique aqui</a> e preencha o formulario informando o produto a colocar em nosso classificados. &Eacute; gr&aacute;tis e um direito seu!</div>
  <div height="26" valign="top">Os produtos aqui cadastrados s&atilde;o de total responsabilidade do propriet&aacute;rio</div>
  <div height="20" align="center" valign="middle"><img src="paginas/imagens/linha_pontilhada_19.gif" width="100%" height="3" /></div>
    
    <?
	if($total == 0){
			  	echo AlertInfo("N&atilde;o h&aacute; classificados");
			}else{
    while ($classificado = db_fetch_array($classificados)) {
		if($classificado['status_clas'] == "Aprovado" ){
		echo "<div class='panel panel-default' style='max-height:500px;'>
                        <div class='panel-heading'>
                            <font size='+1'><b> Nome: </b>".$classificado['nm_clas']."</font>
                        </div>
                        <div class='panel-body'>";
						if ($classificado['fone_clas'] != ""){
					echo "<b>Telefone:</b> ".$classificado['fone_clas']."<br />";
						}
						if ($classificado['celular_clas'] != ""){
					echo "<b>Celular:</b> ".$classificado['celular_clas']."<br />";
						}
					echo "<b>E-mail:</b> ".$classificado['email_clas']."<br />
					<b>Descri&ccedil;&atilde;o:<br /></b> ".$classificado['ds_clas']."<br />
			  </div><div height='20' align='center' valign='middle'></div>
			</div>";
		}
    }
	echo "<div align='center' style='max-height:500px'>
          <div class='dataTables_paginate paging_simple_numbers' id='dataTables-example_paginate'>
            <ul class='pagination'>";
    for($i = 1; $i < $numPaginas + 1; $i++) { 
	if ($rows_status != 0){?>
		<li class="paginate_button <? if($_GET['pagina']==$i || $_GET['pagina']==0){ echo "active";}?>" aria-controls="dataTables-example" tabindex="0"><a href='?pg=15&pagina=<?=$i?>'>
                <?=$i?>
                </a></li>
    <? } else {echo AlertInfo("N&atilde;o h&aacute; classificados");} }
	echo "</ul></div></div>";
			}
?>