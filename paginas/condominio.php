<?php
if($condominio_perm==1){

$cod_condominio = 1;

$sql  = " SELECT * FROM condominio WHERE cod_condominio = ".$cod_condominio;
$res  = db_query($sql);
$rows = db_num_rows($res);

?>
<div>
<div align="left">
	<div width="373" height="30" align="left" valign="middle" class="titulo">
    	<h2><?= db_result($res,"tit_condominio"); ?></h2>
    	<hr></div>
	</div>
</div>
<div height="496" valign="top" style="text-align:justify;">
<?= db_result($res,"txt_condominio"); ?></div>
</div>
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>