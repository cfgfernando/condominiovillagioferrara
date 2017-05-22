<?php
$categoria_user = $_SESSION['CD_CAT_USUARIO'];

?>
<? if($logado=="online"){?>
<li><a href="?pg=0"><span class="iconic home"></span> Home</a></li>
<li><a href="#"><span class="iconic plus-alt"></span> Sobre</a>
  <ul>

    <? if($condominio_perm==1){?>
    <li><a href="?pg=2">Condom&iacute;nio</a></li>
    <? } ?>
    <? if($corpodiret_perm==1){?>
    <li><a href="?pg=5">Corpo Diretivo</a></li>
    <? } ?>
    <? if($estatuto_perm==1){?>
    <li><a href="?pg=4">Estatuto do Condom&iacute;nio</a></li>
    <? } ?>
    <? if($funcionario_perm==1){?>
    <li><a href="?pg=3">Funcion&aacute;rios</a></li>
    <? } ?>

  </ul>
</li>
<? } ?>
<? if($logado=="online"){?>
<li><a href="#"><span class="iconic magnifying-glass"></span> Servi&ccedil;os</a>
  <ul>
    <? if($agenda_perm==1){?>
    <li><a href="?pg=12">Agenda</a></li>
    <? } ?>
    <? if($anunciar_perm==1){?>
    <li><a href="?pg=9">Anunciar</a></li>
    <? } ?>
    <? if($classificados_perm==1){?>
    <li><a href="?pg=7">Classificados</a></li>
    <? } ?>
    <? if($enquete_perm==1){?>
    <li><a href="?pg=11">Enquete</a></li>
    <? } ?>
    <? if($info_perm==1){?>
    <li><a href="?pg=13">Informativo</a></li>
    <? } ?>
    <? if($livrooco_perm==1){?>
    <li><a href="?pg=14">Livro de Ocorr&ecirc;ncias</a></li>
    <? } ?>
    <? if($reservas_perm==1){?>
    <li><a href="?pg=10">Reservas</a></li>
    <? } ?>
    <? if($reunioes_perm==1){?>
    <li><a href="?pg=16">Reuni&otilde;es</a></li>
    <? } ?>
    <? if($visitantes_perm==1){?>
    <li><a href="?pg=15">Visitantes</a></li>
    <? } ?>
  </ul>
</li>
<? } ?>
<? if($logado=="online"){?>
<li><a href="#"><span class="iconic user"></span> Usu&aacute;rio</a>
  <ul>
    <? if($alteradados_perm==1){?>
    <li><a href="?pg=18">Altera&ccedil;&atilde;o de Dados</a></li>
    <? } ?>
    <? if($alterasenha_perm==1){?>
    <li><a href="?pg=17">Altera&ccedil;&atilde;o de Senha</a></li>
    <? } ?>
    <? if($prestacontas_perm==1){?>
    <li><a href="?pg=19">Presta&ccedil;&atilde;o de Contas</a></li>
    <? } ?>
    <? if($moradores_perm==1){?>
    <li><a href="?pg=28">Moradores</a></li>
    <? } ?>
    <? if($boletos_perm==1){?>
    <li><a href="?pg=31">Boletos</a></li>
    <? } ?>
  </ul>
</li>
<? } ?>
<? if($logado=="online"){?>
<li><a href="#"><span class="iconic mail"></span> Contato</a>
  <ul>
    <? if($logado=="online"){?>
    <li><a href="?pg=21">Fale com o S&iacute;ndico</a></li>
    <? } else { ?>
    <li><a href="?pg=21">Fale com o S&iacute;ndico</a></li>
    <li><a href="?pg=20">Solicitar Acesso</a></li>
    <? } ?>
  </ul>
</li>
<? } ?>
<? if($logado=="online"){?>
<li><a href="#"><span class="iconic magnifying-glass"></span> Local</a>
  <ul>
    <li><a href="?pg=23">Como chegar</a> </li>
    <li><a href="?pg=22">Transportes</a></li>
  </ul>
</li>
<? } ?>
<? if($forum_perm==1){?>
<li><a href="?pg=26" id="sair"><span class="iconic key"></span> F&oacute;rum</a> </li>
<? } ?>
<? if($categoria_user == 4){ echo "<li><a href='superuser/?pg=1' target='_blank'><span class='iconic map-pin'></span> Administrar</a> </li>";
	  } ?>
<? if($logado=="online"){?>
<li><a href="?pg=24" id="sair"><span class="iconic key"></span> Sair</a> </li>
<? } ?>
<? if($logado!="online"){?>
<li><a href="?pg=1"><span class="iconic unlocked"></span> Entrar</a> </li>
<? } ?>
