<?php
include_once "paginas/funcoes.php";
$id_onibus = 1;

$sql  = " SELECT * FROM onibus WHERE id_onibus = ".$id_onibus;
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<div>
<div align="left">
	<div width="373" height="30" align="left" valign="middle" class="titulo">
    	<h2>Transportes</h2>
    	<hr></div>
	</div>
</div>
<div height="496" valign="top"><?=db_result($res,"txt_onibus")?></div>
</div>