<?php
session_start();
include_once "mostra_erros.php";
include_once "paginas/config.php";
date_default_timezone_set("America/Sao_Paulo");

$sql5  = " SELECT *
		    FROM morador
		   WHERE cd_morador = ".$_SESSION['CD_MORADOR'];
$res5  = db_query($sql5);
$rows5 = db_num_rows($res5);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>
<? echo $titulo_pagina_adm; ?>
</title>
<link href="assets/img/favicon.ico" rel="shortcut icon">
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/bootstrap-3.3.2.min.css" type="text/css">
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
<link href="assets/css/custom.css" rel="stylesheet" />
<link href="assets/css/datepicker.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="assets/css/bootstrap-multiselect.css" type="text/css">
<!-- MEUS SCRIPTS -->
<script type="text/javascript" src="assets/js/bootstrap-3.3.2.min.js"></script>
<script src="js/dadosPreenchidos.js"></script>
<script src="js/funcoes.js"></script>
<script src="js/mascaras.js"></script>
<script src="js/script_base.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="js/scrolltop/scrolltopcontrol.js"></script>
<script type="text/javascript" src="bootstrap-switch.js"></script>
<!-- FIM MEUS SCRIPTS -->
</head>
<?
if ($logado == "online"){
?>
<body>
<div id="wrapper">
  <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php">Administra&ccedil;&atilde;o</a> </div>
    <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> <a href="<? echo $contatos_sites ?>" class="btn btn-success" target="_new">Ver Site<a> &nbsp;&nbsp; <a href="?pg=24" class="btn btn-danger square-btn-adjust">SAIR</a> </div>
  </nav>
  <!-- /. NAV TOP  -->
  <? include_once "paginas/menu.php"; ?>
  <!-- /. NAV SIDE  -->
  <div id="page-wrapper" >
    <div id="page-inner">
      <div class="row">
        <div class="col-md-12">
          <h2>PAINEL ADMINISTRATIVO</h2>
          <h5>Seja bem vindo, <? echo db_result($res5,"nm_morador")?>!</h5>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-md-12">
          <? include_once "paginas/opcaoinclude.php"; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<? } else { ?>
<script type="text/javascript">
	function checaCampos(){
		with(document.form_login){
			if(login_usuario.value == ""){
				alert('Favor inserir o login!');
				login_usuario.focus();
				return false;
			}
			if(senha_usuario.value == ""){
				alert('Favor inserir a senha!');
				senha_usuario.focus();
				return false;
			}
		}
	}
</script>
<body style="background:#284d89">
<form action="?opcao=logar" method="post" name="form_login" onsubmit="return checaCampos();" >
  <div align="center" style="margin-top:10em">
  <div id="login-box-1" style="width:485px; height: 410px; padding: 58px 76px 0 76px; color: #ebebeb; font: 12px Arial, Helvetica, sans-serif; alignment-adjust:central; background:url(assets/img/login-box-backg.png) no-repeat left top;">
  <H2>&nbsp;</H2>
  <?= $msg; ?>
  <br />
  <br />
  <div style="width:200">
    <div class="form-group input-group"> <span class="input-group-addon">Login&nbsp;</span>
      <input name="login" id="login_usuario" type="text" class="form-control" onkeypress="return txtBoxFormat(this, '999.999.999-99', event);" maxlength="14">
    </div>
    <div class="form-group input-group"> <span class="input-group-addon">Senha</span>
      <input name="senha" id="senha_usuario" type="password" class="form-control">
    </div>
  </div>
  <br />
  <span class="login-box-options"></span> <br />
  <br />
  <div style="width:103; height:42;">
    <input name="btlogar" type="submit" class="btn btn-default" id="btlogar" value="&nbsp;" style="width:103;	height:42; padding:12px 51px; margin:0; border:0; background:transparent url(assets/img/login-btn.png) no-repeat center top; overflow:hidden; cursor:pointer;	cursor:hand;"/>
  </div></div></div>
</form>
<? }?>
<script src="assets/js/jquery-1.10.2.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/jquery.metisMenu.js"></script> 
<script src="assets/js/dataTables/jquery.dataTables.js"></script> 
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script> 
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({
					"language": {
						"url": "assets/js/dataTables/dataTables.portugues.lang"
					}
				});
            });
</script> 
<script src="assets/js/custom.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
      $(document).ready(function () {
        $('#calendario').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR"
        });
      });
    </script>
</body>
</html>