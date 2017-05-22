<?php
if ($funcionario_perm == 1){
?>

<div width="373" height="30" align="left" valign="middle" class="titulo">
  <h2>Funcion&aacute;rios</h2>
   <div><hr></div>
</div>
<div height="496" align="left" valign="top" class="texto">
  <?
              $sql = " SELECT * FROM funcionario ORDER BY nm_func ASC ";
			  $res = db_query($sql);
			  if(db_num_rows($res) == 0){
			  	echo AlertInfo("N&atilde;o h&aacute; funcion&aacute;rios cadastrados!");
			  }else{
				for($i=0; $i<db_num_rows($res); $i++){
					$cd_func = db_result($res,"cd_func",$i);?>
                    <div class="animate fadeIn">
  <div class='col-md-4 col-sm-4' style="min-height:190px; min-width:300px;">
    <div class='well' style="min-height:190px; min-width:300px;">
      <div style="float:left">
	  <? 
	  if (db_result($res,"photosmall",$i) != ""){
	  		if (db_result($res,"tbmmorador",$i) == "" || db_result($res,"tbmmorador",$i) == "0"){ ?>
      <a title="Caption Text" href="img/colaboradores/funcionarios/alta/<?=db_result($res,"photobig",$i)?>" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/colaboradores/funcionarios/thumbs/<?=db_result($res,"photosmall",$i)?>" height="120px" class="portfolio-img pretty-box"></a>
	  		<? } else { ?> 
	  	<a title="Caption Text" href="img/colaboradores/moradores/alta/<?=db_result($res,"photobig",$i)?>" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/colaboradores/moradores/thumbs/<?=db_result($res,"photosmall",$i)?>" height="120px" class="portfolio-img pretty-box"></a>
	  <? }
	  } else { ?>
		<img src="paginas/imagens/funcionario_sem_img" height="120px" class="portfolio-img pretty-box">  
	 <? } ?><br />
      </div>
      <div style="padding-left:9em;"> <b>Nome: </b>
        <?=db_result($res,"nm_func",$i)?>
        <br />
        <b>Cargo: </b>
        <?=db_result($res,"cargo_func",$i)?>
        <br />
        <? if (trim(db_result($res,"email_func",$i)) != ""){					
						echo "<b>E-mail: </b>".db_result($res,"email_func",$i)."<br />";
							}
		if (trim(db_result($res,"fone_func",$i)) != ""){					
						echo "<b>Fone: </b>".db_result($res,"fone_func",$i)."<br />";
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
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>