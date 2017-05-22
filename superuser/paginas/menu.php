<? $foto  = db_result($res5,"photosmall"); ?>
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
    <li class="text-center"><div align="center"><img alt="" src="<? 
			  if(file_exists("../img/colaboradores/funcionarios/thumbs/{$foto}")){
				  echo "../img/colaboradores/funcionarios/thumbs/{$foto}";
				  }elseif(file_exists("../img/colaboradores/moradores/thumbs/{$foto}")){
					  echo "../img/colaboradores/moradores/thumbs/{$foto}";
					  }else{
						  echo "../paginas/imagens/funcionario_sem_img.jpg";
						  }?>" class="img-circle img-responsive" width="200px" /></div></li>
      <li class="active-link"> <a href="?pg=1"><i class="fa fa-desktop "></i><span class="iconic home"></span> Home</a> </li>
      <li class="active-link"> <a href="#"><i class="fa fa-table "></i><span class="iconic plus-alt"></span> Sobre</a>
        <ul>
          <li class="active-link"><a href="?pg=2"></i>Condom&iacute;nio</a></li>
          <li class="active-link"><a href="?pg=3">Funcion&aacute;rios</a></li>
          <!-- ok -->
          <li class="active-link"><a href="?pg=4">Estatuto do Condom&iacute;nio</a></li>
          <li class="active-link"><a href="?pg=5">Corpo Diretivo</a></li>
          <!-- ok -->
        </ul>
      </li>
      <li class="active-link"><a href="#"><i class="fa fa-edit "></i></span> Servi&ccedil;os</a>
        <ul>
          <li class="active-link"><a href="?pg=7">Classificados</a></li>
          <!-- ok -->
          <li class="active-link"><a href="?pg=10">Reservas</a></li>
          <li class="active-link"><a href="?pg=11">Enquete</a></li>
          <!-- ok -->
          <li class="active-link"><a href="?pg=12">Agenda</a></li>
          <!-- ok -->
          <li class="active-link"><a href="?pg=13">Informativo</a></li>
          <!-- ok -->
          <li class="active-link"><a href="?pg=14">Livro de Ocorr&ecirc;ncias</a></li>
          <!-- ok -->
          <li class="active-link"><a href="?pg=37">Transportes</a></li>
          <!-- ok -->
          <li class="active-link"><a href="?pg=16">Reuni&otilde;es</a></li>
          <li class="active-link"><a href="?pg=35">Slider</a></li>
          <!-- ok -->
        </ul>
      </li>
      <li class="active-link"><a href="#"><i class="fa fa-user-o "></i></span> Usu&aacute;rio</a>
        <ul>
          <li class="active-link"> <a href="?pg=31">Morador</a></li>
          <li class="active-link"><a href="?pg=6">Visitantes</a></li>
          <li class="active-link"><a href="?pg=19">Presta&ccedil;&atilde;o de Contas</a></li>
          <!-- ok -->
        </ul>
      </li>
      <li class="active-link"><a href="#"><i class="fa fa-user-o "></i></span> Configura&ccedil;&otilde;es</a>
      	   <ul>
          <li class="active-link"> <a href="?pg=22">Configurar</a></li>
          </ul>
      </li> 
    </ul>
  </div>
</nav>
