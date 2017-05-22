<?
if ($forum_perm == 1 || $forum_admin_perm == 1){
if($exibir_forum == "1"){ 

$idf = $_GET['idf'];
$id_forum = $idf;
if ($_GET['idf']==0){
	RedirecionaRapido("?pg=26");
	
}

if($_SESSION['CD_MORADOR']){
$sql1  = " SELECT * FROM morador WHERE cd_morador = ".$_SESSION['CD_MORADOR'];
$res1  = db_query($sql1);
$nome = db_result($res1,"nm_morador");
$email = db_result($res1,"email_morador");
$photosmall= db_result($res1,"photosmall");
if ($photosmall == ""){
	$photosmall=0;
	}

} elseif($_SESSION['CD_FUNC']){
$sql1  = " SELECT * FROM funcionario WHERE cd_func = ".$_SESSION['CD_FUNC'];
$res1  = db_query($sql1);
$nome = db_result($res1,"nm_func");
$email = db_result($res1,"email_func");
$photosmall= db_result($res1,"photosmall");
if ($photosmall == ""){
	$photosmall=0;
	}
}else{

}
if($_GET['op'] == "excluir"){
	$idc = $_GET['idc'];
	$sql_del = " DELETE FROM forum_comentarios WHERE id_coment = \"$idc\" ";
	$res_del = db_query($sql_del);
	if($res_del){
		echo AlertSuccess("Coment&aacute;rio deletado com sucesso!");
	}else
		echo AlertDanger("Erro ao deletar o coment&aacute;rio!");
}

if ($_GET['btn'] == "enviar"){
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];
$photosmall2 = $photosmall;
$sqlt = "INSERT INTO forum_comentarios 
								 (nome
								, email
								, mensagem
								, id_forum
								, photosmall
								, data
								, hora)
									VALUES
										('$nome'
										,'$email'
										,'$mensagem'
										,'$id_forum'
										,'$photosmall2'
										,now()
										,now())";
$rest  = db_query($sqlt);
if ($rest){
	echo AlertSuccess("Coment&aacute;rio enviado com sucesso!");
	unset($_POST["nome"]);
	unset($_POST["email"]);
	unset($_POST["mensagem"]);
}else {
	echo AlertDanger("Erro ao comentar!");
}
}
$sqlz = "SELECT * FROM forum_comentarios WHERE id_forum = $id_forum ORDER BY id_coment ASC";
$result = db_query($sqlz);

$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;


    $cmd = "SELECT * FROM forum_comentarios WHERE id_forum = $id_forum";
    $linhas = db_query($cmd);
    $total = db_num_rows($linhas);
	if ($total == 0){
		echo AlertInfo("Ainda n&atilde;o h&aacute; dados sobre este f&oacute;rum!");
		RedirecionaRapido("?pg=26");	
	}
    $registros = 10;
    $numPaginas = ceil($total/$registros);
	if($pagina>$numPaginas){
		$pagina=1;
	}
    $inicio = ($registros*$pagina)-$registros;
    $cmd = "SELECT * FROM forum_comentarios WHERE id_forum = $id_forum ORDER BY data asc, hora asc LIMIT $inicio, $registros";
    $res = db_query($cmd);
    $total = db_num_rows($res);
?>
<script language="javascript">
function limparForm(){
	setTimeout('document.form1.reset()', 1000);
	return true;
}
</script>
<div width="373" height="30" align="left" valign="middle" class="titulo">
  <h2>T&oacute;pico: <font style="font-size:24px;">
    <?=db_result($result,"mensagem")?>
    </font></h2>
  <div>
    <hr>
  </div>
</div>
<?

?>
<div>

  <div align='center' style='max-height:500px'>
    <div class='dataTables_paginate paging_simple_numbers' id='dataTables-example_paginate'>
      <ul class='pagination'>
        <? for($i = 1; $i < $numPaginas + 1; $i++) { 
			if ($pagina==0){ $pagina=1;}?>
        <li class="paginate_button <? if($pagina==$i){ echo "active";}?>" aria-controls="dataTables-example" tabindex="0"><a href='?pg=27&idf=<?=$idf?>&pagina=<?=$i?>'>
          <?=$i?>
          </a></li>
        <? } ?>
      </ul>
    </div>
  </div>






  <?
	
    for($i=0; $i < $total; $i++){
   $foto  = db_result($res,"photosmall", $i); ?>
  <div class="carousel slide testimonials animate slideInLeft" id="testimonials4">
    <div class="carousel-inner" >
      <div class="item active">
        <div class="testimonials-bg-dark col-md-12" >
          <p style="min-height:100px;">
            <?=db_result($res,"mensagem", $i)?>
          </p>
          <div style="width:160px; float:right;" align="right">
            <? if(db_result($res,"nome", $i) == $nome || $forum_admin_perm == 1 ){ ?>
            <a href='?pg=27&idf=<?=$idf?>&op=excluir&idc=<?=db_result($res,"id_coment", $i)?>'><img src='paginas/imagens/excluir.gif' alt='Excluir' width='22' height='22' border='0'></a>
            <? } ?>
          </div>
          <div class="testimonial-info"><a href="mailto:<?=db_result($res,"email", $i)?>"><img alt="" src="<? 
			  if(file_exists("img/colaboradores/funcionarios/thumbs/{$foto}")){
				  echo "img/colaboradores/funcionarios/thumbs/{$foto}";
				  }elseif(file_exists("img/colaboradores/moradores/thumbs/{$foto}")){
					  echo "img/colaboradores/moradores/thumbs/{$foto}";
					  }else{
						  echo "paginas/imagens/funcionario_sem_img.jpg";
						  }?>" class="img-circle img-responsive" /></a><span class="testimonial-author"><a href="mailto:<?=db_result($res,"email", $i)?>">
            <?=db_result($res,"nome", $i)?>
            </a><em>
            <?=ConverteData(db_result($res,"data", $i))?>
            -
            <?=db_result($res,"hora", $i)?>
            </em> </span> </div>
        </div>
      </div>
    </div>
  </div>
  <p>
  <div class="margin-bottom-30">
    <hr>
  </div>
  </p>
  <? } ?>
  <div align='center' style='max-height:500px'>
    <div class='dataTables_paginate paging_simple_numbers' id='dataTables-example_paginate'>
      <ul class='pagination'>
        <? for($i = 1; $i < $numPaginas + 1; $i++) { 
			if ($pagina==0){ $pagina=1;}?>
        <li class="paginate_button <? if($pagina==$i){ echo "active";}?>" aria-controls="dataTables-example" tabindex="0"><a href='?pg=27&idf=<?=$idf?>&pagina=<?=$i?>'>
          <?=$i?>
          </a></li>
        <? } ?>
      </ul>
    </div>
  </div>
  <? if ($total == 0){
		
	}else{ ?>
  <div>
    <p><strong>Deixe seu comentario?</strong><strong><br />
      </strong></p>
  </div>
  <form name="form1" id="form1" onsubmit="return limparForm();" method="post" novalidate="novalidate" action="?pg=27&pagina=<?=$numPaginas?>&idf=<?=$idf?>&btn=enviar">
    <!--<div ><strong>Nome:</strong></div>-->
    <div >
      <input class="form-control" value="<?=$nome ?>" name="nome" type="hidden" id="nome" size="40" />
    </div>
    <!--<div ><strong>E-mail:</strong></div>-->
    <div>
      <input class="form-control" name="email" value="<?=$email ?>" type="hidden" id="email" size="40" />
    </div>
    <!--<div><strong>Mensagem:</strong></div>-->
    <div>
      <textarea class="form-control" name="mensagem" cols="35" rows="5" id="mensagem"></textarea>
    </div>
    <div>
      <p>&nbsp;</p>
    </div>
    <div>
      <p>
        <input class="btn btn-primary" type="submit" name="Submit" value="   Comentar   " />
      </p>
    </div>
  </form>
  <? } ?>
</div>
<? } else {
	RedirecionaRapido("?pg=0");	
} ?>
<? } else {
	 RedirecionaRapido("index.php");
	 exit();
} ?>