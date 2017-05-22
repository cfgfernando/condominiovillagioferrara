<?php
if ($livrooco_perm == 1){
?>

<div>
  <div width="373" height="30" align="left" valign="middle" class="titulo">
    <h2> Livro de Ocorr&ecirc;ncias </h2><hr></div>
  </div>
  <div>
    <div height="496" align="left" valign="top" class="texto">
      <?
              $sql = " SELECT * FROM livro_ocorrencia ORDER BY dt_ocorrencia DESC ";
			  $res = db_query($sql);
			  if(db_num_rows($res) == 0){
			  	echo AlertInfo("N&atilde;o h&aacute; ocorr&ecirc;ncias cadastradas!");
			  }
			  else{
			  	echo "<br />";
			  	for($i=0; $i<db_num_rows($res); $i++){
			  		echo "<b>".ConverteData(db_result($res,"dt_ocorrencia",$i))."</b> - ".db_result($res,"ocorrencia",$i)."<br /><br />";
				}
			  }			  
			  ?>
    </div>
  </div>
</div>
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>