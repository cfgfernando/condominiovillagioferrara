<?php
if ($estatuto_perm == 1){

$cod_estatuto = 1;

$sql  = " SELECT * FROM estatuto WHERE cod_estatuto = ".$cod_estatuto;
$res  = db_query($sql);
$rows = db_num_rows($res);

?>

<div align="left">
  
    <div width="373" height="30" align="left" valign="middle" class="titulo"><h2><?= db_result($res,"tit_estatuto"); ?></h2></div>
  </div>
  <hr />
  <div>
    <div height="100%" valign="top" style="text-align:justify;"><p><?= db_result($res,"txt_estatuto"); ?></p>
      <br /></div>
  </div>
</div>
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>