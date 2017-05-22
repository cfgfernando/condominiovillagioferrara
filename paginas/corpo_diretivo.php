<?php
if ($corpodiret_perm == 1){
?>

<div>
  <div>
    <div>
      <h2>Corpo Diretivo</h2>
      <hr>
    </div>
    <div>
      <div height="235" align="left" valign="top" class="texto"><br />
        <?
			  $sql = " SELECT * FROM corpo_diretivo WHERE categoria = 'Corpo Diretivo' ORDER BY nm_corpo ASC";
					 
			  $res = db_query($sql);
			  if(db_num_rows($res) == 0){
			  	echo AlertInfo("Não há Corpo Diretivo cadastrado!");
			  }else{
				for($i=0; $i<db_num_rows($res); $i++){
					$cd_func = db_result($res,"cd_corpo",$i);?>
        <div class="animate fadeIn">
          <div class='col-md-4 col-sm-4' style="min-height:300px;">
            <div class='well' style="min-height:190px; min-width:300px;">
              <div style="float:left"><img src="img/colaboradores/corpo_diretivo/thumbs/<?=db_result($res,"photosmall",$i)?>" height="150px"> <br />
              </div>
              <div style="padding-left:9em;"> <b>Nome: </b>
                <?=db_result($res,"nm_corpo",$i)?>
                <br />
                <b>Cargo: </b>
                <?=db_result($res,"cargo_corpo",$i)?>
                <br />
                <? if (trim(db_result($res,"email_corpo",$i)) != ""){					
						echo "<b>E-mail: </b>".db_result($res,"email_corpo",$i)."<br />";
							}?>
                <? if (trim(db_result($res,"fone_corpo",$i)) != ""){					
						echo "<b>Fone: </b>".db_result($res,"fone_corpo",$i)."<br />";
							}?>
              </div>
            </div>
          </div>
        </div>
        <? } } ?>
      </div>
    </div>
  </div>

  <div class="clearfix"> </div>

  <div>
    <div>
      <h2>Conselho Fiscal</h2>
      <hr>
    </div>
    <div height="235" align="left" valign="top" class="texto"><br />
      <?
			  $sql = " SELECT * FROM corpo_diretivo WHERE categoria = 'Conselho Fiscal' ORDER BY nm_corpo ASC";
					 
	$res = db_query($sql);
	if(db_num_rows($res) == 0){
	echo AlertInfo("Não há Conselho Fiscal cadastrado!");
	}else{
	for($i=0; $i<db_num_rows($res); $i++){
	$cd_func = db_result($res,"cd_corpo",$i);?>
      <div class="animate fadeIn">
        <div class='col-md-4 col-sm-4' style="min-height:100px;">
          <div class='well' style="min-height:190px;">
            <div style="float:left; border-color:#000000; border:inherit;"><img src="img/colaboradores/corpo_diretivo/thumbs/<?=db_result($res,"photosmall",$i)?>" height="150px"> <br />
            </div>
            <div style="padding-left:9em;"> <b>Nome: </b>
              <?=db_result($res,"nm_corpo",$i)?>
              <br />
              <b>Cargo: </b>
              <?=db_result($res,"cargo_corpo",$i)?>
              <br />
              <? if (trim(db_result($res,"email_corpo",$i)) != ""){					
						echo "<b>E-mail: </b>".db_result($res,"email_corpo",$i)."<br />";
							}
		if (trim(db_result($res,"fone_corpo",$i)) != ""){					
						echo "<b>Fone: </b>".db_result($res,"fone_corpo",$i)."<br />";
							}?>
            </div>
          </div>
        </div>
      </div>
      <?
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