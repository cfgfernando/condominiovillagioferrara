<? include_once "paginas/autenticacao.php"; ?>

<div id="page-inner">
  <div class="row">
    <div class="col-lg-12"> </div>
  </div>
  <div class="row text-center pad-top" style="padding-bottom:10px; padding-top:10px;">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=2" > <i class="fa fa-building fa-5x"></i>
        <h4>Condom&iacute;nio</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=5" > <i class="fa fa-briefcase fa-5x"></i>
        <h4>Corpo Diretivo</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=4" > <i class="fa fa-legal fa-5x"></i>
        <h4>Estatuto do Condom&iacute;nio</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=3" > <i class="fa fa-users fa-5x"></i>
        <h4>Funcion&aacute;rios</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=7" > <i class="fa fa-clipboard fa-5x"></i>
        <h4>Classificados </h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=19" > <i class="fa fa-leanpub fa-5x"></i>
        <h4>Prestação de Contas</h4>
        </a> </div>
    </div>
  </div>
  
  <!-- /. ROW  -->
  <div class="row text-center pad-top" style="padding-bottom:10px; padding-top:10px;"">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=10" > <i class="fa fa-clipboard fa-5x"></i>
        <h4>Reservas</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=11" > <i class="fa fa-check-square-o fa-5x"></i>
        <h4>Enquete</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=12" > <i class="fa fa-book fa-5x"></i>
        <h4>Agenda</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=13" > <i class="fa fa-envelope-o fa-5x"></i>
        <h4>Informativo</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=14" > <i class="fa fa-edit fa-5x"></i>
        <h4>Livro de Ocorrências</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=16" > <i class="fa fa-calendar fa-5x"></i>
        <h4>Reuniões</h4>
        </a> </div>
    </div>
  </div>
  <!-- /. ROW  -->
  <div class="row text-center pad-top" style="padding-bottom:10px; padding-top:10px;"">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=31" > <i class="fa fa-user-circle-o fa-5x"></i>
        <h4>Moradores</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=33" > <i class="fa fa-key fa-5x"></i>
        <h4>Alteração de Senha</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=35" > <i class="fa fa-film fa-5x"></i>
        <h4>Slider</h4>
        </a> </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=37" > <i class="fa fa-bus fa-5x"></i>
        <h4>Transportes</h4>
        </a> </div>
    </div>
    <? if($exibir_visitantes == "1"){ ?>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=6" > <i class="fa fa-address-book-o fa-5x"></i>
        <h4>Visitantes</h4>
        </a> </div>
    </div>
    <?  } ?>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=15" > <i class="fa fa-cog fa-5x"></i>
        <h4>Permiss&otilde;es</h4>
        </a> </div>
    </div>
  </div>
  <!-- /. ROW  -->
  <div class="row text-center pad-top" style="padding-bottom:10px; padding-top:10px;"">
   <? if($exibir_boletos == "1"){ ?>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=39" > <i class="fa fa-calculator fa-5x"></i>
        <h4>Lançar Boletos</h4>
        </a> </div>
    </div>
    <?  } ?>
    
    <? if($exibir_boletos == "1"){ ?>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=38" > <i class="fa fa-barcode fa-5x"></i>
        <h4>Configurar Boletos</h4>
        </a> </div>
    </div>
    <?  } ?>
    
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
      <div class="div-square"> <a href="?pg=22" > <i class="fa fa-cogs fa-5x"></i>
        <h4>Configura&ccedil;&otilde;es</h4>
        </a> </div>
    </div>
  </div>
 
</div>