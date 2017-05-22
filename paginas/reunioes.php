<?php
if ($reunioes_perm == 1 || $reunioes_admin_perm == 1){
?>

<div>
  <div width="373" height="30" align="left" valign="middle" class="titulo">
    <h2>Reuni&otilde;es</h2><hr></div>
    <br />
  </div>
  <div height="464" align="left" valign="top" class="texto">
    <?


				$sql = "SELECT * FROM  reuniao WHERE cd_cat_reuniao =1";	  
				$res = db_query($sql);
				$rows = db_num_rows($res);
			  
			    echo "<b style='color:#626262'>Reuni&atilde;o de Assembl&eacute;ia</b><br>";
				
				if ($rows>0){
					for($i=0; $i<db_num_rows($res); $i++){
					echo "<blockquote class='blockquote' style='margin: 5px; padding: 5px;'>";
					echo "Data: ".ConverteData(db_result($res,"dt_reuniao",$i))."<br>";
					echo "T&iacute;tulo: ".db_result($res,"titulo_reuniao",$i)."<br>";
					echo "Descri&ccedil;&atilde;o: ".db_result($res,"ds_reuniao",$i)."<br>";
					echo "</div><hr><br>";
					}
				}else{
				  echo AlertInfo("N&atilde;o h&aacute; reuni&otilde;es agendadas.");
				}
			  	if($reunioes_admin_perm == 1){
					$sql2 = "SELECT * FROM  reuniao WHERE cd_cat_reuniao =2";  
					$res2 = db_query($sql2);
					$rows2 = db_num_rows($res2);
					
					echo "<b style='color:#626262'>Reuni&atilde;o de Diretoria</b><br>";
					if ($rows2>0){
						for($i=0; $i<db_num_rows($res); $i++){
						echo "<blockquote class='blockquote' style='margin: 5px; padding: 5px;'>";
						echo "Data: ".ConverteData(db_result($res2,"dt_reuniao",$i))."<br>";
						echo "T&iacute;tulo: ".db_result($res2,"titulo_reuniao",$i)."<br>";
						echo "Descri&ccedil;&atilde;o: ".db_result($res2,"ds_reuniao",$i)."<br>";
						echo "</div><hr><br>";
						}
					}else{
				      echo AlertInfo("N&atilde;o h&aacute; reuni&otilde;es agendadas.");
				    }                
				}
		?>
  </div>
</div>
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>