<?
$passo = (isset($_GET['passo'])) ? (int) $_GET['passo'] : null;

$quantetapas = 6;

if (empty($passo) || $passo > $quantetapas){
	header('Location: ./?passo=1');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instala&ccedil;&atilde;o do Portal do Condom&iacute;nio</title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="js/mascaras.js"></script>
<body style="background-image:url(img/bgmain.png);">
<div style="margin:0 0 60px;">
  <div style="width:100%; padding-top:10px; padding-left:20px; height:120px; background-image:url(img/bg.jpg)">
    <div style="height:100; width:236; float:left;"><a href="http://rolly.com.br" target="_new"><img src="img/logo.png" height="100px"/></a></div>
    <div style="padding-left:25%; padding-top:2%; font-size:40px; alignment-adjust:central;"> <font color="#FFFFFF">Instala&ccedil;&atilde;o do Portal do Condom&iacute;nio</font></div>
  </div>
  <div style="alignment-adjust:central; width:100%;" align="center">
  <div style="width:700px; min-height:450px;" align="left">
    <? require_once 'passos/pagina-'.$passo.'.php' ?>
  </div>
  </div>
</div>
<div style="width:100%; height:120px; background-image:url(img/bg.jpg); margin-bottom:0; bottom:0; alignment-adjust:central" align="center"><div style="float:none; width:200px; height:50px; padding-top:20px;"><font color="#FFFFFF"><b>contato@rolly.com.br<br />(19) 98156-0869</b></font></div></div>
</body>
</html>