<?php
if(!file_exists('paginas/config.inc.php') || !file_exists('superuser/paginas/config.inc.php')){
	echo "Clique <a href='instalar/index.php'>aqui<a> para iniciar a instala&ccedil;&atilde;o";
	exit;
}
elseif (file_exists('instalar/')){
	echo "Por favor, delete a pasta <font color='#FF0000'><b>instalar</b></font>";
	exit;
} else { }
session_start();

include_once "mostra_erros.php";
include_once "paginas/config.php";
include_once "paginas/autenticamenu.php";
date_default_timezone_set("America/Sao_Paulo");
$sql5  = " SELECT *
		    FROM morador
		   WHERE cd_morador = ".$_SESSION['CD_MORADOR'];
$res5  = db_query($sql5);
$rows5 = db_num_rows($res5);

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="pt-br" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="pt-br" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
    <!--<![endif]-->

<head>
<title><?=$titulo_pagina?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link href="img/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/nexus.css" rel="stylesheet">

<script src="superuser/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="css/responsive.css" rel="stylesheet">
<link rel="stylesheet" href="css/table-responsive.css" rel="stylesheet">
<script src="js/funcoes.js"></script>
<script src="js/mascaras.js"></script>
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">

<link href="js/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
</head>
    <body>
        <div id="body-bg">
        <div id="pre-header" class="background-gray-lighter">
          <div class="container no-padding">
            <div class="row hidden-xs">
              <div class="col-sm-6 padding-vert-5"> <strong>Condominio Villágio Ferrara</strong>&nbsp;

              </div>
              <div class="col-sm-6 text-right padding-vert-5"> <strong></strong>&nbsp;

              </div>
            </div>
          </div>
        </div>
        <div id="header">
          <div class="container">
            <div class="row">
              <div class="logo"> <a href="index.php" title=""> <img src="img/logo.png" alt="Logo" /> </a> </div>
            </div>
          </div>
        </div>
        <div id="hornav" class="bottom-border-shadow">
          <div class="container no-padding border-bottom" style="width:100%;">
            <div class="row">
              <div class="col-md-8 no-padding">
                <div class="visible-lg">
                  <ul id="hornavmenu" class="nav navbar-nav">
                    <? include_once "paginas/menu.php"; ?>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 no-padding">
                <ul class="social-icons pull-right">
                  <li class="social-rss">
                    <? if($rss != ""){ echo " <a href='http://twitter.com/".$twitter."' target='_blank' title='RSS'></a>";} ?>
                  </li>
                  <li class="social-twitter">
                    <? if($twitter != ""){ echo " <a href='http://twitter.com/".$twitter."' target='_blank' title='Twitter'></a>";} ?>
                  </li>
                  <li class="social-facebook">
                    <? if($facebook != ""){ echo " <a href='http://facebook.com/".$facebook."' target='_blank' title='Facebook'></a>";} ?>
                  </li>
                  <li class="social-googleplus">
                    <? if($googleplus != ""){ echo " <a href='https://plus.google.com/+".$googleplus."' target='_blank' title='Google'></a>";} ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <? if($_GET['pg']==0){ include_once "paginas/slider.php"; }else{ }?>
        <div id="content" class="bottom-border-shadow" style="width:100%;">
          <div class="container bottom-border" style="min-height:400px; width:100%;">
            <div class="opinclude">

                <? include_once "paginas/opcaoinclude.php"; ?>


            </div>
          </div>
        </div>

        <? include_once "paginas/footer.php"; ?>

    </body>
</html>