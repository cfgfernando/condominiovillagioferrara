<?php
$sql  = " SELECT * FROM slider ORDER BY cd_slider ASC ";
$res  = db_query($sql);
$rows = db_num_rows($res);
?>

<div id="slideshow" class="bottom-border-shadow" style="width:100%;">
  <div class="container no-padding background-white bottom-border" style="width:100%;">
    <div class="row"> 
      <!-- Carousel Slideshow -->
      <div id="carousel-example" class="carousel slide" data-ride="carousel"> 
        <!-- Carousel Indicators -->
        <ol class="carousel-indicators">
          <? for ($i=0; $i<$rows; $i++){ ?>
          <li data-target="#carousel-example" data-slide-to="0" class="<? if ($i ==$rows-1){echo "active";}?>"></li>
          <? } ?>
          
        </ol>
        <div class="clearfix"></div>
        <!-- End Carousel Indicators --> 
        <!-- Carousel Images -->
        <div class="carousel-inner">
          <? for ($i=0; $i<$rows; $i++){ ?>
          <div class="item <? if ($i ==$rows-1){echo "active";}?>"><div class="imagemslider" style="background-image:url(img/slider/alta/<?=db_result($res,"photobig",$i)?>);"><div align="right" style="max-width:600px; float:left"><font style=" text-decoration:underline;"><?=db_result($res,"tit_slider",$i)?></font><br/><?=db_result($res,"txt_slider",$i)?></div></div></div>
          <? } ?>
        </div>
        <!-- End Carousel Images --> 
        <!-- Carousel Controls --> 
        <a class="left carousel-control" href="#carousel-example" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> 
        <!-- End Carousel Controls --> 
      </div>
      <!-- End Carousel Slideshow --> 
    </div>
  </div>
</div>
