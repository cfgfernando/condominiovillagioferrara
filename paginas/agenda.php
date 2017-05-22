<?php

if ($agenda_perm == 1){
$sql = " SELECT * FROM agenda
			WHERE dt_agenda >= DATE(NOW())
			ORDER BY dt_agenda DESC";
$res = @mysql_query($sql);
$rows = db_num_rows($res);

?>

<div width="100%" border="0" cellpadding="0" cellspacing="0">
  <div width="373" height="30" align="left" valign="middle" class="titulo">
    <h2>Agenda</h2><hr></div>
  </div>
  <div height="50" align="left" valign="middle" class="texto"><a href="?pg=21">Para reservar, entre em contato
    com o s&iacute;ndico</a></div>
  <div height="506" align="left" valign="top" class="texto">
    <?
			  if($rows == 0){
			  	echo AlertInfo("N&atilde;o h&aacute; registros na agenda!");
			  }
			  else{
				  echo "Confira a agenda:<br />";
			  	for($i=0; $i<$rows; $i++){
					$dt_agenda = ConverteData(@mysql_result($res,$i,"dt_agenda"));
					$reserva = @mysql_result($res,$i,"reserva");
					
					echo "&raquo; ".$dt_agenda." - ".$reserva."<br />";
				}
			  }
			  ?>
  </div>
</div>
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>
