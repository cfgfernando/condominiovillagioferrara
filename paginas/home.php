
<div>
  <div>
  <? if($_SESSION['CD_CAT_USUARIO'] == 3 ){?>
  <div align="left" style="font-size:18px;"><p><b>Bem vindo! Você est&aacute; logado como Funcion&aacute;rio, seus acessos s&atilde;o restritos.</b></p></div>

  <? } ?>
    <div height="19" colspan="2" align="center" valign="middle" class="titulo">
      <h2>
        <?=$tit_home?>
      </h2>
      <hr></div>
    </div>
    <? 

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');

for ($i=0; $i<$QuantidadeExibir; $i++) {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  
  ?>
    <div style="width:100%;">
      <div><a href="<?=$item_link?>"  target="_blank">
        <?=$item_title?>
        </a></div>
      <div style="float:left;">
        <?=$item_desc?>
      </div>
      <div><hr></div>
    </div>
    <?
}
 ?>
  </div>
</div>
