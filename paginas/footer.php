
<div id="base" style="width:100%;">
  <div class="container bottom-border padding-vert-30" style="width:100%; padding-left:20px; padding-right:20px;">
    <div class="row"> 
      <!-- Disclaimer -->
      <div class="col-md-4">
        <h3 class="margin-bottom-10">Contato</h3>
        <p class="text">
          <b>Telefone:</b></span>&nbsp;
          <?=$contato_fone?>
          <br>
          <b>E-mail:</b><a href="<?=$contato_email?>">&nbsp;
          <?=$contato_email?>
          </a> <br>
        </p>
      </div>
      <!-- End Disclaimer --> 
      <!-- Contact Details -->
      <div class="col-md-4 margin-bottom-20">
        <h3 class="margin-bottom-10">Endereço</h3>
        <p><b> Endereço:</b>
          <?=$endereco_config?>
          <br />
          <b>Bairro:</b>
          <?=$bairro_config?>
          <br />
          <b>Cidade-UF:</b>
          <?=$cidade_config?>
          <br />
          <b>CEP:</b>
          <?=$cep_config?>
        </p>
      </div>
      <!-- End Contact Details --> 
      <!-- Sample Menu -->
      <div class="col-md-4 margin-bottom-20">
        <h3 class="margin-bottom-10">Acessos</h3>
        <ul class="menu">
          <li>
            <? if ($logado == "online"){ ?>
            <a href="?pg=21"><span style="color:#313131; opacity: 0.9;"><b>Fale com o S&iacute;ndico</b><span></a>
            <? } else { ?>
            <a href="?pg=20"><span style="color:#313131; opacity: 0.9;"><b>Solicitar Acesso</b><span></a>
            <? } ?>
          </li>
          <li>
            <? if ($logado == "online"){ ?>
            <a href="?pg=24"><span style="color:#313131; opacity: 0.9;"><b>Sair</b><span></a>
            <? } else { ?>
            <a href="?pg=1"><span style="color:#313131; opacity: 0.9;"><b>Entrar</b><span></a>
            <? } ?>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- End Sample Menu --> 
    </div>
  </div>
</div>
<!-- Footer -->
<div id="footer" class="background-grey">
  <div class="container">
    <div class="row"> 
      <!-- Footer Menu -->
      <div id="footermenu" class="col-md-8"> </div>
      <!-- End Footer Menu --> 
      <!-- Copyright -->
      <div id="copyright" class="">
        <p class="pull-right"><?=$titulo_pagina?>  &copy; <a href="http://condominiovillagioferrara.esy.es" target="_blank"></a> - <a href=""></a>2017</p>
      </div>
      <!-- End Copyright -->
    </div>
  </div>
</div>
<!-- End Footer -->
<!-- JS -->
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 

<script type="text/javascript" src="js/scripts.js"></script> 
<!-- Isotope - Portfolio Sorting --> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<!-- Mobile Menu - Slicknav --> 
<script type="text/javascript" src="js/jquery.slicknav.js"></script> 
<!-- Animate on Scroll--> 
<script type="text/javascript" src="js/jquery.visible.js" charset="utf-8"></script> 
<!-- Sticky Div --> 
<script type="text/javascript" src="js/jquery.sticky.js" charset="utf-8"></script> 
<!-- Slimbox2--> 
<script type="text/javascript" src="js/slimbox2.js" charset="utf-8"></script> 
<!-- Modernizr --> 
<script src="js/modernizr.custom.js" type="text/javascript"></script> 
<!-- End JS --> 
<script src="superuser/assets/js/dataTables/jquery.dataTables.js"></script> 
<script src="superuser/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({
					"language": {
						"url": "superuser/assets/js/dataTables/dataTables.portugues.lang"
					}
				});
            });
</script>
<!-- Bootstrap WYSIHTML5 -->
    <script src="js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- Page Script -->
    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
    </script>