<?php
if ($prestacontas_perm == 1){
?>

<div>
  <div width="373" height="30" align="left" valign="middle" class="titulo">
    <h2>Presta&ccedil;&atilde;o de Contas</h2><hr></div>
    <br />
  </div>
  <div height="496" align="left" valign="top" class="texto">
    <?
              $sql = " SELECT * FROM prestacao_contas ORDER BY dt_mesano DESC ";
			  $res = db_query($sql);
                if(db_num_rows($res) == 0){
			  	echo AlertInfo("N&atilde;o h&aacute; presta&ccedil;&otilde;es de contas cadastradas!");
			  }
			  else{

			  	for($i=0; $i<db_num_rows($res); $i++){
					$arquivo = db_result($res,"arquivo",$i);

					if($arquivo != ""){
						echo db_result($res,"ds_contas",$i)."<br /><a href=\"paginas/arquivos/prestacontas/$arquivo\" target=\"_blank\">Ver Arquivo</a><br /><hr><br />";
					}
				}
			  }


			  ?>













  </div>
</div>
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>
